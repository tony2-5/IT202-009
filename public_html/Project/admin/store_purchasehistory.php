<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    //die(header("Location: $BASE_PATH/home.php"));
    redirect("home.php");
}

// first query to select order table data and the Users id from users table, which gets the most recent orders using sort by DESC and limit 10
$query = "SELECT Orders.id, Orders.money_recieved, Orders.address, Users.username
FROM Users JOIN Orders on Users.id = Orders.user_id
ORDER BY Orders.created DESC LIMIT 10;";
$db = getDB();
$stmt = $db->prepare($query);
$order = [];
try {
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $order = $results;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching order", "danger");
}

?>
<div class="container-fluid">
    <table class="table table-striped">
        <h1> Order history </h1>
        <thead>
            <tr>
                <th>Username</th>
                <th>Shipping Address</th>
                <th>Quantity Of Items</th>
                <th>Total Paid</th>
                <th>View More details</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($order as $o) : ?>
            <?php $totalQuantity = 0; ?>
            <?php
                // query to select quantity of items for each order
                $query = "SELECT quantity
                FROM OrderItems 
                WHERE order_id = :oid";
                $db = getDB();
                $stmt = $db->prepare($query);
                $orderItems = [];
                try {
                    $stmt->execute([":oid" => $o["id"]]);
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($results) {
                        $orderItems = $results;
                    }
                } catch (PDOException $e) {
                    error_log(var_export($e, true));
                    flash("Error fetching order", "danger");
                }
                // summing quantities of ordered items for a order
                foreach($orderItems as $oi) {
                    $totalQuantity += $oi["quantity"];
                }
            ?>
            <tr>
                <td><?php se($o, "username"); ?></td>
                <td><?php se($o, "address"); ?></td>
                <td><?php se($totalQuantity); ?></td>
                <td>$<?php se(se($o, "money_recieved","",false)/100); ?></td>
                <td><a href="../orderconfirmation.php?id=<?php se($o, "id"); ?>">Click to view more details</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require(__DIR__ . "/../../../partials/flash.php");
?>