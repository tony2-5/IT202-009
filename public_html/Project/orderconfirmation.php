<?php
require(__DIR__ . "/../../partials/nav.php");

is_logged_in(true);
if(isset($_GET["id"])) {
    // first query to select order table data, which gets the most recent order by a specific user using sort by DESC and limit 1
    // Where user_id to make sure only getting data for correct logged in user
    $query = "SELECT total_price, address, payment_method, money_recieved, first_name, last_name
    FROM Orders WHERE id = :id AND user_id = :uid;";
    $db = getDB();
    $stmt = $db->prepare($query);
    $order = [];
    try {
        $stmt->execute([":uid" => get_user_id(),":id" => $_GET["id"]]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $order = $results;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching order", "danger");
    }
    // if previous query array empty means inccorect user attempting to view order confirmation data
    if(count($order)>0) {
        // second query selects product info about ordereditems from the OrderItems table where the order id matches the id from Order table
        $query = "SELECT item.name, orderitem.quantity, orderitem.unit_price, (orderitem.unit_price * orderitem.quantity) as subtotal
        FROM Products as item JOIN OrderItems as orderitem on item.id = orderitem.product_id 
        WHERE order_id = :oid";
        $db = getDB();
        $stmt = $db->prepare($query);
        $orderItems = [];
        try {
            $stmt->execute([":oid" => $_GET["id"]]);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($results) {
                $orderItems = $results;
            }
        } catch (PDOException $e) {
            error_log(var_export($e, true));
            flash("Error fetching order", "danger");
        }
    }  
    else {
        // so page will display nothing
        $orderItems = [];
    }
} else {
    // first query to select order table data, which gets the most recent order by a specific user using sort by DESC and limit 1
    $query = "SELECT id, total_price, address, payment_method, money_recieved, first_name, last_name
    FROM Orders WHERE user_id = :uid ORDER BY created DESC LIMIT 1;";
    $db = getDB();
    $stmt = $db->prepare($query);
    $order = [];
    try {
        $stmt->execute([":uid" => get_user_id()]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $order = $results;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching order", "danger");
    }

    // second query selects product info about ordereditems from the OrderItems table where the order id matches the id from Order table
    $query = "SELECT item.name, orderitem.quantity, orderitem.unit_price, (orderitem.unit_price * orderitem.quantity) as subtotal
    FROM Products as item JOIN OrderItems as orderitem on item.id = orderitem.product_id 
    WHERE order_id = :oid";
    $db = getDB();
    $stmt = $db->prepare($query);
    $orderItems = [];
    try {
        $stmt->execute([":oid" => $order[0]["id"]]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $orderItems = $results;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching order", "danger");
    }
}
?>
<?php if(!isset($_GET["id"])) :?>
    <div class="d-flex justify-content-center m-3">
        <h1 class="border rounded-3 p-2" style="background-color:rgb(54, 207, 82);">Order successful, thank you for your purchase!</h1>
    </div>
<?php endif; ?>
<div class="container-fluid">
    <table class="table table-striped">
        <h3 class="mt-2"> Ordered Items </h3>
        <?php $total = 0; ?>
        <thead>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($orderItems as $oi) : ?>
            <tr>
                <td><?php se($oi, "name");?></td>
                <td>$<?php se(se($oi, "unit_price","",false)/100); ?></td>
                <td><?php se($oi, "quantity"); ?></td>
                <?php $total += (int)se($oi, "subtotal", 0, false); ?>
                <td>$<?php se(se($oi, "subtotal","",false)/100); ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td>Total: $<?php se($total/100, null, 0); ?></td>
        </tr>
        </tbody>
    </table>
    <table class="table table-striped">
        <h3> Order details </h3>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Payment Method</th>
                <th>Cost Due</th>
                <th>Total Paid</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($order as $o) : ?>
            <tr>
                <td><?php se($o, "first_name");?></td>
                <td><?php se($o, "last_name");?></td>
                <td><?php se($o, "address"); ?></td>
                <td><?php se($o, "payment_method"); ?></td>
                <td>$<?php se(se($o, "total_price","",false)/100); ?></td>
                <td>$<?php se(se($o, "money_recieved","",false)/100); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>