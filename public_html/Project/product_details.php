<?php
require(__DIR__ . "/../../partials/nav.php");
$TABLE_NAME = "Products";

// insert data into Ratings table after user submits rating
if(isset($_POST["submitRating"]) && $_POST["didNotPurchase"]==0) {
    // to prevent user spam refreshing page to submit reviews
    $db = getDB();
    $product_id = se($_GET, "id", -1, false);
    $stmt = $db->prepare("INSERT INTO Ratings (product_id, user_id, rating, comment) VALUES (:pid, :uid, :rating, :comment)");
    try{
        $stmt->execute([":pid" => $product_id,":uid" => get_user_id(),":rating" => $_POST["rating"],":comment" => $_POST["ratingDescription"]]);
        flash("Success in posting review!", "success");
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error submitting rating", "danger");
    }

    // update average rating in products table
    $db = getDB();
    $stmt = $db->prepare("UPDATE Products SET averageratings = (SELECT AVG(rating) FROM Ratings GROUP BY product_id HAVING product_id=:pid) WHERE id=:pid");
    try{
        $stmt->execute([":pid" => $product_id]);
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error updating average ratings", "danger");
    }

    // prevent user from refreshing to submit form again
    redirect("product_details.php?id=".$product_id);
}
else if(isset($_POST["submitRating"]) && $_POST["didNotPurchase"]==1) {
    // if did not purchase is 1 then means user has not purchased product before
    flash("Must purchase item to leave rating!","warning");
}

$result = [];
$columns = get_columns($TABLE_NAME);

$ignore = ["id", "modified", "created", "visibility"];
$db = getDB();
//get the item
$product_id = se($_GET, "id", -1, false);
$stmt = $db->prepare("SELECT * FROM $TABLE_NAME where id =:id");
try {
    $stmt->execute([":id" => $product_id]);
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($r) {
        $result = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error looking up record", "danger");
}

$userPurchased = [];
$db = getDB();
// select user_id from Orders table if Order table user id equals the current users id and the OrderItems table product_id matches the product we are viewing
$stmt = $db->prepare("SELECT Orders.user_id FROM Orders JOIN OrderItems ON Orders.id = OrderItems.order_id WHERE Orders.user_id = :uid AND OrderItems.product_id = :pid");
try {
    $stmt->execute([":pid" => $product_id,":uid" => get_user_id()]);
    $u = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($u) {
        $userPurchased = $u;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error looking up record", "danger");
}



$ratings = [];
$db = getDB();
// selecting ratings from Ratings table paginated
$params = [];
$per_page = 10;
// get total Ratings
$total_query = "SELECT count(1) as total FROM Ratings rating";
// get actual records
$query = "SELECT Ratings.rating, Ratings.comment, Ratings.created, Ratings.user_id, Users.username FROM Users JOIN Ratings ON Users.id = Ratings.user_id WHERE Ratings.product_id = :pid ORDER BY Ratings.created DESC";
paginate($total_query, $params, $per_page);


$query .= " LIMIT :offset, :count";
$params[":pid"] = $product_id;
$params[":offset"] = $offset;
$params[":count"] = $per_page;
//get the records
$stmt = $db->prepare($query); //dynamically generated query
//we'll want to convert this to use bindValue so ensure they're integers so lets map our array
foreach ($params as $key => $value) {
    $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
    $stmt->bindValue($key, $value, $type);
}
$params = null; //set it to null to avoid issues

try {
    $stmt->execute($params);
    $ra = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($ra) {
        $ratings = $ra;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error getting ratings", "danger");
}
?>
<div class="container-fluid d-flex align-items-center flex-column">
    <h1><u>Product details</u></h1>
        <?php foreach ($result as $column => $value) : ?>
            <?php /* Lazily ignoring fields via hardcoded array*/ ?>
            <?php if (!in_array($column, $ignore)) : ?>
                <div class="mb-2 d-flex align-items-center flex-column">
                    <?php if ($column === "averageratings") : ?>
                        <h3><?php se("Average Rating" . ":"); ?></h3>
                        <p> <?php se($value); ?> </p>
                    <?php else : ?>
                        <h3><?php se($column . ":"); ?></h3>
                        <?php if ($column === "unit_price") : ?>
                            <p> $<?php se($value/100); ?> </p>
                        <?php else : ?>
                            <p> <?php se($value); ?> </p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php if (has_role("Admin")) : ?>
            <a href="admin/edit_item.php?id=<?php se($_GET, "id", -1) ?>">Edit</a>
        <?php endif; ?>
        <a href="shop.php">Return to shop</a>
</div>
<div class="container-fluid">
<form method="POST">
<?php /*If this array is empty means user never purchased the item before*/ ?>
    <?php if (count($userPurchased)==0) : ?>
        <h3>Must purchase item to leave a rating</h3>
        <input type="hidden" name="didNotPurchase" value="1">
    <?php else: ?>
        <h3>Leave a rating</h3>
        <input type="hidden" name="didNotPurchase" value="0">
    <?php endif; ?>
    <div class="mb-2">
        <label for="rating">Rate 1-5</label>
        <input class="form-control" type="number" name="rating" id="rating" min="1" max="5"/>
    </div>
    <div>
        <label for="ratingDescription">Rating Description</label>
        <textarea class="form-control" name="ratingDescription" id="ratingDescription" rows="4"></textarea>
    </div>
    <input type="submit" class="mt-3 btn btn-primary" value="Submit Rating" name="submitRating" />
</form>
</div>
<div class="container-fluid d-flex align-items-center flex-column">
    <table class="table table-striped"> 
        <h1> Reviews</h1>
        <thead>
            <tr>
                <th>Username</th>
                <th>Rating</th>
                <th>Comments</th>
                <th>Review date</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($ratings as $rating) : ?>
            <tr>
                <td>
                    <?php $user_id = se($rating, "user_id", 0, false);
                        $username = se($rating, "username", "", false);
                        include(__DIR__ . "/../../partials/profile_link.php");
                    ?>
                </td>
                <td><?php se($rating,"rating") ?></td>
                <td><?php se($rating,"comment") ?></td>
                <td><?php se($rating,"created") ?></td>
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
require_once(__DIR__ . "/../../partials/flash.php");