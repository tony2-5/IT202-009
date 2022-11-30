<?php
require(__DIR__ . "/../../partials/nav.php");
$TABLE_NAME = "Products";


$result = [];
$columns = get_columns($TABLE_NAME);

$ignore = ["id", "modified", "created", "visibility"];
$db = getDB();
//get the item
$id = se($_GET, "id", -1, false);
$stmt = $db->prepare("SELECT * FROM $TABLE_NAME where id =:id");
try {
    $stmt->execute([":id" => $id]);
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($r) {
        $result = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error looking up record", "danger");
}
?>
<div class="container-fluid d-flex align-items-center flex-column">
    <h1><u>Product details</u></h1>
        <?php foreach ($result as $column => $value) : ?>
            <?php /* Lazily ignoring fields via hardcoded array*/ ?>
            <?php if (!in_array($column, $ignore)) : ?>
                <div class="mb-4 d-flex align-items-center flex-column">
                    <h3><?php se($column . ":"); ?></h3>
                    <?php if ($column === "unit_price") : ?>
                        <p> $<?php se($value/100); ?> </p>
                    <?php else : ?>
                        <p> <?php se($value); ?> </p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <a href="shop.php">Return to shop</a>
</div>
<?php
require_once(__DIR__ . "/../../partials/flash.php");