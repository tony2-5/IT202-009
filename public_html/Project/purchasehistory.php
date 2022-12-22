<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

//process filters/sorting
//Sort and Filters
$col = se($_GET, "col", "created", false);
//allowed list
if (!in_array($col, ["created","money_recieved"])) {
    $col = "created"; //default value, prevent sql injection
}
$orderSort = se($_GET, "order", "desc", false);
//allowed list
if (!in_array($orderSort, ["desc", "asc"])) {
    $orderSort = "desc"; //default value, prevent sql injection
}

$startDate = se($_GET, "startDate", "", false);
$endDate = se($_GET, "endDate", "", false);

//split query into data and total
$base_query = "SELECT id, created, money_recieved, address
FROM Orders WHERE user_id = :uid";
$total_query = "SELECT count(1) as total FROM Orders WHERE user_id = :uid";
//dynamic query
$query = " AND 1=1"; //1=1 shortcut to conditionally build AND clauses
$params = []; //define default params, add keys as needed and pass to execute

$params[":uid"] = get_user_id();

// apply date filter
if (!empty($startDate) && !empty($endDate)) {
    $query .= " AND created BETWEEN :startDate AND :endDate";
    // making endDate inclusive for filter
    $endDate = $endDate." 23:58:00.000";
    $params[":startDate"] = $startDate;
    $params[":endDate"] = $endDate;
}
//apply column and order sort
if (!empty($col) && !empty($orderSort)) {
    $query .= " ORDER BY $col $orderSort"; //be sure you trust these values, I validate via the in_array checks above
}

$per_page = 10;
paginate($total_query . $query, $params, $per_page);

$query .= " LIMIT :offset, :count";
$params[":offset"] = $offset;
$params[":count"] = $per_page;
//get the records
$stmt = $db->prepare($base_query . $query); //dynamically generated query
//we'll want to convert this to use bindValue so ensure they're integers so lets map our array
foreach ($params as $key => $value) {
    $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
    $stmt->bindValue($key, $value, $type);
}
$params = null; //set it to null to avoid issues

$order = [];
try {
    $stmt->execute($params); //dynamically populated params to bind
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $order = $results;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching orders", "danger");
}

?>
<div class="container-fluid">
<h1> Order history </h1>
<?php /* Filter by dates*/?>
    <form class="row row-cols-auto g-3 align-items-center">
        <div class="col mb-3">
            <div class="input-group d-flex flex-column align-items-center" data="i">
                <div>Filter between dates</div>
                <div class="d-flex">
                    <div class="d-flex flex-column align-items-center">
                        <label for="startDate">Start date</label>
                        <input class="form-control" type="date" id="startDate" name="startDate">
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <label for="endDate">End date</label>
                        <input class="form-control" type="date" id="endDate" name="endDate">
                    </div>
                </div>  
            </div>
        </div>
        <div class="col">
            <div class="input-group">
                <div class="input-group-text">Sort</div>
                <!-- make sure these match the in_array filter above-->
                <select class="form-control bg-info" style="width: auto;" name="col" value="<?php se($col); ?>" data="took">
                    <option value="created">Date purchased</option>
                    <option value="money_recieved">Total paid</option>
                </select>
                <script>
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].col.value = "<?php se($col); ?>";
                </script>
                <select class="form-control" style="width: auto;" name="order" value="<?php se($orderSort); ?>">
                    <option class="bg-white" value="desc">Descending</option>
                    <option class="bg-white" value="asc">Ascending</option>
                </select>
                <script data="this">
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].order.value = "<?php se($orderSort); ?>";
                    if (document.forms[0].order.value === "asc") {
                        document.forms[0].order.className = "form-control bg-success";
                    } else {
                        document.forms[0].order.className = "form-control bg-danger";
                    }
                </script>
            </div>
        </div>
        <div class="col">
            <div class="input-group">
                <input type="submit" class="btn btn-primary" value="Apply" />
            </div>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
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
                <td><?php se($o, "created"); ?></td>
                <td><?php se($o, "address"); ?></td>
                <td><?php se($totalQuantity); ?></td>
                <td>$<?php se(se($o, "money_recieved","",false)/100); ?></td>
                <td><a href="orderconfirmation.php?id=<?php se($o, "id"); ?>">Click to view more details</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="mt-3">
        <?php /* added pagination */ ?>
        <?php require(__DIR__ . "/../../partials/pagination.php"); ?>
    </div>
</div>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>