<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");
$TABLE_NAME = "Products";
if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    //die(header("Location: $BASE_PATH/home.php"));
    redirect("home.php");
}

$stockFilter = se($_GET, "stockFilter", "all", false);
//allowed list
if (!in_array($stockFilter, ["all", "inStock", "outStock"])) {
    $stockFilter = "all"; //default value, prevent sql injection
}
//get name partial search
$name = se($_GET, "name", "", false);

//split query into data and total
$base_query = "SELECT * FROM $TABLE_NAME";
$total_query = "SELECT count(1) as total FROM $TABLE_NAME";
//dynamic query
$query = " WHERE 1=1"; //1=1 shortcut to conditionally build AND clauses
$params = []; //define default params, add keys as needed and pass to execute
//apply name filter
if (!empty($name)) {
    $query .= " AND name like :name";
    $params[":name"] = "%$name%";
}
if (!empty($stockFilter)) {
    if($stockFilter == "inStock") {
        $query .= " AND stock > 0";
    } elseif($stockFilter == "outStock") {
        $query .= " AND stock = 0";
    }
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
$results = [];
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
    <h1>List Items</h1>
    <?php /* Filter by name*/?>
    <h4 class="mt-2">Filter</h4>
    <form class="row row-cols-auto g-3 align-items-center">
        <div class="col">
            <div class="input-group" data="i">
                <div class="input-group-text">Filter By Name</div>
                <input class="form-control" name="name" value="<?php se($name); ?>" />
            </div>
        </div>
        <div class="col">
            <div class="input-group">
                <div class="input-group-text">Filter By Stock</div>
                <!-- make sure these match the in_array filter above-->
                <select class="form-control bg-info" style="width: auto;" name="stockFilter" value="<?php se($col); ?>" data="took">
                    <option value="all">All</option>
                    <option value="inStock">In Stock</option>
                    <option value="outStock">Out Of Stock</option>
                </select>
                <script>
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].col.value = "<?php se($col); ?>";
                </script>
        </div>
        <div class="col mt-2">
            <div class="input-group">
                <input type="submit" class="btn btn-primary" value="Apply" />
            </div>
        </div>
    </form>
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>
    <?php else : ?>
        <table class="table">
            <?php foreach ($results as $index => $record) : ?>
                <?php if ($index == 0) : ?>
                    <thead>
                        <?php foreach ($record as $column => $value) : ?>
                            <th><?php se($column); ?></th>
                        <?php endforeach; ?>
                        <th>Actions</th>
                    </thead>
                <?php endif; ?>
                <tr>
                    <?php foreach ($record as $column => $value) : ?>
                        <?php if($column === "unit_price") : ?>
                            <td>$<?php se(($value/100), null, "N/A"); ?></td>
                        <?php elseif($column === "visibility") : ?>
                            <?php if($value==1) : ?>
                                <td>True</td>
                            <?php else : ?>
                                <td>False</td>
                            <?php endif; ?>
                        <?php else : ?>
                            <td><?php se($value, null, "N/A"); ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <td>
                        <a href="edit_item.php?id=<?php se($record, "id"); ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
<div class="mt-3">
    <?php /* added pagination */ ?>
    <?php require(__DIR__ . "/../../../partials/pagination.php"); ?>
</div>
<?php
require_once(__DIR__ . "/../../../partials/flash.php");