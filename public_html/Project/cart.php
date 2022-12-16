<?php
require(__DIR__ . "/../../partials/nav.php");

is_logged_in(true);

if(isset($_GET['productPriceErrorName'])) {
    // flash message if there was a price error in checkout.php that prints names of all products with price updates
    flash("Product " . $_GET['productPriceErrorName'] . " price has been updated. Please review cart before ordering again.", "warning");
}

$action = strtolower(trim(se($_POST, "action","", false)));
if (!empty($action)) {
    $db = getDB();
    if(isset($_POST["desired_quantity"]) && $_POST["desired_quantity"] == 0) {
        $action = "delete";
    }
    switch ($action) {
        case "add":
            $query = "SELECT cart.id, item.stock, item.name, cart.unit_price, cart.product_id, (cart.unit_price * cart.desired_quantity) as subtotal, cart.desired_quantity
            FROM Products as item JOIN Cart as cart on item.id = cart.product_id
            WHERE cart.user_id = :uid";
            $db = getDB();
            $stmt = $db->prepare($query);
            $cart = [];
            try {
                $stmt->execute([":uid" => get_user_id()]);
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if ($results) {
                    $cart = $results;
                }
            } catch (PDOException $e) {
                error_log(var_export($e, true));
                flash("Error fetching cart", "danger");
            }
            if(isset($cart)) {
                $breakVar = false;
                foreach ($cart as $c) {
                    if($c["product_id"] == $_POST["item_id"]) {
                        if($c["desired_quantity"] == $_POST["stock"] || $c["desired_quantity"] + $_POST["desired_quantity"] > $_POST["stock"]) {
                            flash("Desired quantity exceeds stock", "danger");
                            $breakVar = true;
                        }
                    }
                }
                if($breakVar) {
                    break;
                }
            }
            

            $query = "INSERT INTO Cart (product_id, user_id, desired_quantity, unit_price)
            VALUES (:iid, :uid, :dq, (SELECT unit_price FROM Products where id = :iid)) ON DUPLICATE KEY UPDATE
            desired_quantity = desired_quantity + :dq";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":iid", se($_POST, "item_id", 0, false), PDO::PARAM_INT);
            $stmt->bindValue(":dq", se($_POST, "desired_quantity", 0, false), PDO::PARAM_INT);
            $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
            try {
                $stmt->execute();
                flash("Added item to cart", "success");
            } catch (PDOException $e) {
                error_log(var_export($e, true));
                flash("Error adding item to cart", "danger");
            }
            break;
        case "update":
            $query = "UPDATE Cart set desired_quantity = :dq WHERE id = :cid AND user_id = :uid";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":dq", se($_POST, "desired_quantity", 0, false), PDO::PARAM_INT);
            //cart id specifies a specific cart item
            $stmt->bindValue(":cid", se($_POST, "cart_id", 0, false), PDO::PARAM_INT);
            //user id ensures we can only edit our cart
            $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
            try {
                $stmt->execute();
                flash("Updated item quantity", "success");
            } catch (PDOException $e) {
                error_log(var_export($e, true));
                flash("Error updating item quantity", "danger");
            }
            break;
        case "delete":
            $query = "DELETE FROM Cart WHERE id = :cid AND user_id = :uid";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":cid", se($_POST, "cart_id", 0, false), PDO::PARAM_INT);
            $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
            try {
                $stmt->execute();
                flash("Removed item from cart", "success");
            } catch (PDOException $e) {
                error_log(var_export($e, true));
                flash("Error removing item", "danger");
            }
            //TODO you do this part
            break;
        case "clear":
            $query = "DELETE FROM Cart WHERE user_id = :uid";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
            try {
                $stmt->execute();
                flash("Cleared cart", "success");
            } catch (PDOException $e) {
                error_log(var_export($e, true));
                flash("Failed to clear cart", "danger");
            }
        break;
    }
}
$query = "SELECT cart.id, item.stock, item.name, cart.unit_price, cart.product_id, (cart.unit_price * cart.desired_quantity) as subtotal, cart.desired_quantity
FROM Products as item JOIN Cart as cart on item.id = cart.product_id
 WHERE cart.user_id = :uid";
$db = getDB();
$stmt = $db->prepare($query);
$cart = [];
try {
    $stmt->execute([":uid" => get_user_id()]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $cart = $results;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching cart", "danger");
}
?>

<div class="container-fluid">
    <h1>Cart</h1>
    <table class="table table-striped">
        <?php $total = 0; ?>
        <thead>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($cart as $c) : ?>
            <tr>
                <?php $c["unit_price"]/=100?>
                <td><a href="product_details.php?id=<?php se($c, "product_id"); ?>"><?php se($c, "name");?></a></td>
                <td>$<?php se($c, "unit_price"); ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="cart_id" value="<?php se($c, "id"); ?>" />
                        <input type="hidden" name="action" value="update" />
                        <input type="number" name="desired_quantity" value="<?php se($c, "desired_quantity"); ?>" min="0" max="<?php se($c, "stock"); ?>" />
                        <input type="submit" class="btn btn-primary" value="Update Quantity" />
                    </form>
                </td>
                <?php $total += (int)se($c, "subtotal", 0, false); ?>
                <?php $c["subtotal"]/=100?>
                <td>$<?php se($c, "subtotal"); ?></td>
                <td colspan="100%">
                    <form method="POST">
                        <input type="hidden" name="cart_id" value="<?php se($c, "id"); ?>" />
                        <input type="hidden" name="action" value="delete" />
                        <input type="submit" class="btn btn-danger" value="x" />
                    </form>
                </td>
            </tr>
            <tr>
        <?php endforeach; ?>
        <?php if (count($cart) == 0) : ?>
            <tr>
                <td colspan="100%">No items in cart</td>
            </tr>
        <?php endif; ?>
        <tr>
            <td>Total: $<?php se($total/100, null, 0); ?></td>
            <td><button class="btn btn-success" onclick="location.href = '/Project/checkout.php';">Place order</button></td>
            <td colspan="100%">
                <form method="POST">
                    <input type="hidden" name="action" value="clear" />
                    <input type="submit" class="btn btn-danger" value="Clear Cart" />
                </form>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>