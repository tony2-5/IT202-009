<?php
require(__DIR__ . "/../../partials/nav.php");

$results = [];
//process filters/sorting
//Sort and Filters
$col = se($_GET, "col", "unit_price", false);
//allowed list
if (!in_array($col, ["unit_price", "stock", "name", "created","averageratings"])) {
    $col = "unit_price"; //default value, prevent sql injection
}
$order = se($_GET, "order", "asc", false);
//allowed list
if (!in_array($order, ["asc", "desc"])) {
    $order = "asc"; //default value, prevent sql injection
}
//get name partial search
$name = se($_GET, "name", "", false);

//split query into data and total
$base_query = "SELECT id, name, description, unit_price, stock, averageratings FROM Products items";
$total_query = "SELECT count(1) as total FROM Products items";
//dynamic query
$query = " WHERE 1=1 and stock > 0"; //1=1 shortcut to conditionally build AND clauses
$params = []; //define default params, add keys as needed and pass to execute
//apply name filter
if (!empty($name)) {
    $query .= " AND name like :name";
    $params[":name"] = "%$name%";
}
//apply column and order sort
if (!empty($col) && !empty($order)) {
    $query .= " ORDER BY $col $order"; //be sure you trust these values, I validate via the in_array checks above
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

try {
    $stmt->execute($params); //dynamically populated params to bind
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching items", "danger");
}

?>

<div class="container-fluid">
<?php /* Filter by name*/?>
    <h4 class="mt-2">Filter</h4>
    <form class="row row-cols-auto g-3 align-items-center">
        <div class="col">
            <div class="input-group" data="i">
                <div class="input-group-text">Name</div>
                <input class="form-control" name="name" value="<?php se($name); ?>" />
            </div>
        </div>
        <div class="col">
            <div class="input-group">
                <div class="input-group-text">Sort</div>
                <!-- make sure these match the in_array filter above-->
                <select class="form-control bg-info" style="width: auto;" name="col" value="<?php se($col); ?>" data="took">
                    <option value="unit_price">Cost</option>
                    <option value="stock">Stock</option>
                    <option value="name">Name</option>
                    <option value="created">Created</option>
                    <option value="averageratings">Ratings</option>
                </select>
                <script>
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].col.value = "<?php se($col); ?>";
                </script>
                <select class="form-control" style="width: auto;" name="order" value="<?php se($order); ?>">
                    <option class="bg-white" value="asc">Ascending</option>
                    <option class="bg-white" value="desc">Descending</option>
                </select>
                <script data="this">
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].order.value = "<?php se($order); ?>";
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
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>
    <?php else : ?>
        <h1>Shop Items</h1>
        <div class="row row-cols-sm-2 row-cols-xs-1 row-cols-md-3 row-cols-lg-6 g-4">
            <?php foreach ($results as $item) : ?>
                <div class="col">
                    <div class="card bg-light">
                        <div class="card-header">
                            <h5 class="card-title">Name: <?php se($item, "name"); ?></h5>
                        </div>
                        <div class="card-body">
                            <?php $item["unit_price"]/=100?>
                            <p style="margin:0"> Cost: $<?php se($item, "unit_price"); ?> </p>
                            <p style="margin:0">Stock: <?php se($item, "stock"); ?> </p>
                            <p style="margin-bottom:1">Rating: <?php se($item, "averageratings"); ?> </p>
                            <?php /*redirect to product details*/?>
                            <a href="product_details.php?id=<?php se($item, "id"); ?>">Product Details</a>
                            <?php if (has_role("Admin")) : ?>
                                <a href="admin/edit_item.php?id=<?php se($item, "id"); ?>"><br>Edit</a>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer">
                            <form method="POST" action="cart.php">
                                <input type="hidden" name="item_id" value="<?php se($item, "id");?>"/>
                                <input type="hidden" name="stock" value="<?php se($item, "stock");?>"/>
                                <input type="hidden" name="action" value="add"/>
                                <input type="number" name="desired_quantity" value="1" min="1" max="<?php se($item, "stock");?>"/>
                                <input type="submit" class="btn btn-primary" value="Add to Cart"/>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="mt-3">
            <?php /* added pagination */ ?>
            <?php require(__DIR__ . "/../../partials/pagination.php"); ?>
        </div>
    <?php endif; ?>
</div>
<?php
require_once(__DIR__ . "/../../partials/flash.php");