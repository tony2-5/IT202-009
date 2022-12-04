<?php
require(__DIR__ . "/../../partials/nav.php");

$TABLE_NAME = "Products";

 // retrieving database info for sort by category
 $catResults = [];
 $db2 = getDB();
 $stmt2 = $db->prepare("SELECT DISTINCT category FROM $TABLE_NAME WHERE stock > 0 AND visibility=1 LIMIT 10");
 try {
     $stmt2->execute();
     $r2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
     if ($r2) {
         $catResults = $r2;
     }
 } catch (PDOException $e) {
     error_log(var_export($e, true));
     flash("Error fetching items", "danger");
 }

//UCID:ajd99
//12/03/2022
$results = [];
// if form submitted for name and category filter alternative select statement
if (isset($_POST["itemName"])) {
    $db = getDB();
    // for sorting
    if(isset($_POST["sort"]) && $_POST["sort"] === "asc") {
        // for additive filter, if someone does not want to use category filter
        if($_POST["category"] === "noFilter") {
            $stmt = $db->prepare("SELECT id, name, description, category, stock, unit_price, visibility FROM $TABLE_NAME 
            WHERE name like :name AND visibility=1 AND stock > 0 ORDER BY unit_price ASC LIMIT 10");
        } else {
            $stmt = $db->prepare("SELECT id, name, description, category, stock, unit_price, visibility FROM $TABLE_NAME 
            WHERE name like :name AND category like :category AND visibility=1 AND stock > 0 ORDER BY unit_price ASC LIMIT 10");
        }
    } else if(isset($_POST["sort"]) && $_POST["sort"] === "desc") {
        if($_POST["category"] === "noFilter") {
            $stmt = $db->prepare("SELECT id, name, description, category, stock, unit_price, visibility FROM $TABLE_NAME 
            WHERE name like :name AND visibility=1 AND stock > 0 ORDER BY unit_price DESC LIMIT 10");
        } else {
            $stmt = $db->prepare("SELECT id, name, description, category, stock, unit_price, visibility FROM $TABLE_NAME 
            WHERE name like :name AND category like :category AND visibility=1 AND stock > 0 ORDER BY unit_price DESC LIMIT 10");
        }
    }
    else {
        if($_POST["category"] === "noFilter") {
            $stmt = $db->prepare("SELECT id, name, description, category, stock, unit_price, visibility FROM $TABLE_NAME 
            WHERE name like :name AND visibility=1 AND stock > 0 LIMIT 10");
        } else {
            $stmt = $db->prepare("SELECT id, name, description, category, stock, unit_price, visibility FROM $TABLE_NAME 
            WHERE name like :name AND category like :category AND visibility=1 AND stock > 0 LIMIT 10");
        }
    }
    //UCID:ajd99
    //12/03/2022
    try {
        // for additive filter, if someone does not want to use category filter
        if($_POST["category"] === "noFilter") {
            $stmt->execute([":name" => "%" . $_POST["itemName"] . "%"]);
        } else {
            $stmt->execute([":name" => "%" . $_POST["itemName"] . "%",":category" => $_POST["category"]]);
        }
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results = $r;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching records", "danger");
    }
}
else {
    // default database info
    $results = [];
    $db = getDB();
    $stmt = $db->prepare("SELECT id, name, description, category, stock, unit_price, visibility FROM $TABLE_NAME WHERE stock > 0 AND visibility=1 LIMIT 10");
    try {
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results = $r;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching items", "danger");
    }
}
?>

<div class="container-fluid">
<?php /* Filter by name*/?>
    <h4 class="mt-2">Filter</h4>
    <form method="POST" class="row row-cols-lg-auto g-3 align-items-center">
        <div class="input-group">
            <input class="form-control" type="search" name="itemName" placeholder="Item Filter" />
            <?php /* Filter by category*/?>
            <select class="form-select" name="category" id="category">
                <option value="noFilter">Select category</option>
                <?php foreach ($catResults as $item) : ?>
                    <option value="<?php se($item, "category"); ?>"><?php se($item, "category"); ?></option>
                <?php endforeach; ?>
            </select>
            <?php /* Sort price*/?>
            <select class="form-select" name="sort" id="sort">
                <option value="default">Sort price</option>
                <option value="asc">Ascending Price</option>
                <option value="desc">Descending Price</option>
            </select>
            <input class="btn btn-primary" type="submit" value="Search" />
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
                            <p class="card-text"> Cost: $<?php se($item, "unit_price"); ?> </p>
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
    <?php endif; ?>
</div>
<?php
require_once(__DIR__ . "/../../partials/flash.php");