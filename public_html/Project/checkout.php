<?php
require(__DIR__ . "/../../partials/nav.php");

is_logged_in(true);

$query = "SELECT cart.id, item.stock, item.name, item.unit_price as item_unit_price, cart.unit_price, cart.product_id, (cart.unit_price * cart.desired_quantity) as subtotal, cart.desired_quantity
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
/*
UCID: ajd99
DATE: 12/16/2022
*/
// if order button is pressed
if (isset($_POST["purchase"])) {
    $hasError=false;
    // for calculating total of cart
    $total = 0;
    // variable to concatenate multiple product names if multiple products have price error
    $productPriceErrorNames = "";
    // looping through products in cart
    foreach($cart as $c) {
        // if our unit price in cart is different from the product unit price
        if(se($c, "unit_price","",false) != se($c, "item_unit_price","",false)) {
            $hasError=true;
            // update cart data for product with innacurate price
            $query = "UPDATE Cart set unit_price = :up WHERE id = :cid AND user_id = :uid";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":up", se($c, "item_unit_price", 0, false), PDO::PARAM_INT);
            $stmt->bindValue(":cid", se($c, "id", 0, false), PDO::PARAM_INT);
            $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
            try {
                $stmt->execute();
                // concatenate product names with price errors together
                $productPriceErrorNames = $productPriceErrorNames . $c["name"] . ", ";
            } catch (PDOException $e) {
                error_log(var_export($e, true));
                flash("Error updating product cost", "danger");
            }
        }
        /*
        UCID: ajd99
        DATE: 12/16/2022
        */
        // if hasError already true, means there was a price error
        if($hasError && se($c, "unit_price","",false) != se($c, "item_unit_price","",false))  {
            // redirect to cart to see updated cart
            die(header("Location: cart.php?productPriceErrorName=".$productPriceErrorNames));
        }
        // if desired quantity of product in cart is greater than flash error message and set hasError true
        if(se($c, "desired_quantity","",false) > se($c, "stock","",false)) {
            $hasError = true;
            if($c["stock"]<=0) {
                flash("Product " . $c["name"] . " unavailable, please remove from cart.", "warning");
            } else {
                flash("Product " . $c["name"] . " desired quantity exceeds stock of " . $c["stock"] . ". " 
                . "Please update cart to have desired quantity less than or equal to " . $c["stock"] . ".", "warning");
            }
        }

        // adding subtotal for each cart product to total cost
        $total+=$c["subtotal"];
    }
    // validation to make sure amount paying is equal to cart cost
    if($total>se($_POST, "moneyRecieved", 0, false)*100) {
        $hasError = true;
        flash("Amount you are paying of $" . $_POST["moneyRecieved"] . " does not fully pay cart cost of $" . $total/100, "danger");
    } else if ($total<se($_POST, "moneyRecieved", 0, false)*100){
        $hasError = true;
        flash("Amount you are paying of $" . $_POST["moneyRecieved"] . " exceeds current cart cost of $" . $total/100, "danger");
    } else if($total==0) {
        $hasError = true;
        flash("Checkout is empty, no items to purchase");
    }

    $address = se($_POST, "address", "", false);
    $apartment = se($_POST, "apartment", "", false);
    $city = se($_POST, "city", "", false);
    $stateOrProv = se($_POST, "state", "", false);
    $country = se($_POST, "country", "", false);
    $zip = se($_POST, "zip", "", false);
    // concatenating address info for insert into database
    $addressConcat = $address ." ". $apartment ." ". $city ." ". $stateOrProv ." ". $country ." ". $zip;

    // if error prevents database query
    if (!$hasError) {
        // query to insert into order table
        $query = "INSERT INTO Orders (user_id, total_price, address, payment_method, money_recieved, first_name, last_name)
            VALUES (:uid, :tp, :address, :pm, :mr, :fn, :ln)";
        $db = getDB();
        $stmt = $db->prepare($query);
        // binding values to query
        $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
        $stmt->bindValue(":tp", se($total,null, 0, false), PDO::PARAM_INT);
        $stmt->bindValue(":address", se($addressConcat,null, "", false), PDO::PARAM_STR);
        $stmt->bindValue(":pm", se($_POST, "paymentMethod", "", false), PDO::PARAM_STR);
        $stmt->bindValue(":mr", se($_POST, "moneyRecieved", 0, false)*100, PDO::PARAM_INT);
        $stmt->bindValue(":fn", se($_POST, "firstName", "", false), PDO::PARAM_STR);
        $stmt->bindValue(":ln", se($_POST, "lastName", "", false), PDO::PARAM_STR);
        try {
            $stmt->execute();
            // getting id from last Order table entry
            $lastInsertId = $db->lastInsertId();
            /* for each product in our cart we are inserting data about that product into 
            the OrderItems table with the last id from Orders table*/
                // insert query
            $query = "INSERT INTO OrderItems (order_id, product_id, quantity, unit_price)
            VALUES (:oid, :pid, :quantity, :up)";
            $db = getDB();
            $stmt = $db->prepare($query);
            // binding values for query for each cart product
            foreach($cart as $c) {
                // order id is id from last order in Orders table
                $stmt->bindValue(":oid", se($lastInsertId, null, 0, false), PDO::PARAM_INT);
                $stmt->bindValue(":pid", se($c, "product_id", 0, false), PDO::PARAM_INT);
                $stmt->bindValue(":quantity", se($c,"desired_quantity", 0, false), PDO::PARAM_INT);
                $stmt->bindValue(":up", se($c, "unit_price", 0, false), PDO::PARAM_INT);
                // executing query
                try{
                $stmt->execute();
                }catch(PDOException $e) {
                    error_log(var_export($e, true));
                    flash("Error inserting into orderitems", "danger");
                }
            }

            // query for updating Product table stock
            $query = "UPDATE Products set stock = :stock WHERE id = :product_id";
            $stmt = $db->prepare($query);
            // binding values for query for each cart product
            foreach($cart as $c) {
                $stmt->bindValue(":stock", se($c, "stock", 0, false) - se($c, "desired_quantity", 0, false), PDO::PARAM_INT);
                $stmt->bindValue(":product_id", se($c, "product_id", 0, false), PDO::PARAM_INT);
                try{
                    $stmt->execute();
                }
                catch(PDOException $e) {
                    error_log(var_export($e, true));
                    flash("Error updating product stock", "danger");
                }  
            }
            
            // query for clearing cart
            $query = "DELETE FROM Cart WHERE user_id = :uid";
            $stmt = $db->prepare($query);
            // binding values for query
            $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
            try{
                $stmt->execute();
            }catch(PDOException $e) {
                error_log(var_export($e, true));
                flash("Error ordering item", "danger");
            }

            
            header("Location: orderconfirmation.php");
        } catch (PDOException $e) {
            error_log(var_export($e, true));
            flash("Error ordering item", "danger");
        }
    }
}
?>

<div class="container-fluid">
    <h1>Checkout</h1>
    <table class="table table-striped">
        <?php $total = 0; ?>
        <thead>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Percent off</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($cart as $c) : ?>
            <tr>
                <?php $percentDiffCalc =($c["item_unit_price"]-$c["unit_price"])/$c["item_unit_price"]?>
                <td><a href="product_details.php?id=<?php se($c, "product_id"); ?>"><?php se($c, "name");?></a></td>
                <td>$<?php se(se($c, "unit_price","",false)/100); ?></td>
                <td><?php se($c, "desired_quantity"); ?></td>
                <?php $total += (int)se($c, "subtotal", 0, false); ?>
                <td>$<?php se(se($c, "subtotal","",false)/100); ?></td>
                <td><?php se(se($percentDiffCalc,null,"",false)*100);?>%</td>
            </tr>
            <tr>
        <?php endforeach; ?>
        <?php if (count($cart) == 0) : ?>
            <tr>
                <td colspan="100%">No items to checkout</td>
            </tr>
        <?php endif; ?>
        <tr>
            <td>Total: $<?php se($total/100, null, 0); ?></td>
            <td colspan="100%"><button class="btn btn-danger" onclick="location.href = '/Project/cart.php';">Return to cart</button></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="container-fluid d-flex flex-column flex-fill align-items-center">
    <form onsubmit="return validate(this)" class="w-50" method="POST">
        <div class="d-flex justify-content-center mb-2">
            <!--UCID: ajd99 DATE: 12/16/2022-->
            <div class="d-flex flex-column flex-fill">
                <label class="form-label" for="paymentMethod">Chose payment method</label>
                <select name="paymentMethod" id="paymentMethod" class="form-select" required>
                    <option disabled selected value>Select an option</option>
                    <option value="visa">Visa</option>
                    <option value="mastercard">Mastercard</option>
                    <option value="amex">Amex</option>
                    <option value="paypal">Paypal</option>
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-2">
            <div class="d-flex flex-column flex-fill">
                <label class="form-label" for="moneyRecieved">Enter amount paying</label>
                <input class="form-control" type="number" min="0" step=".01" name="moneyRecieved" id="moneyRecieved" required/>
            </div>
        </div>
        <div class="d-flex justify-content-center gap-4 mb-2">
            <div class="d-flex flex-column flex-fill">
                <label class="form-label" for="firstName">First name</label>
                <input class="form-control" type="text" name="firstName" maxlength="20" id="firstName" required/>
            </div>
            <div class="d-flex flex-column flex-fill">
                <label class="form-label" for="lastName">Last Name</label>
                <input class="form-control" type="text" name="lastName" maxlength="20" id="lastName" required/>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-2">
            <div class="d-flex flex-column flex-fill">
                <label class="form-label" for="address">Address</label>
                <input class="form-control" type="text" name="address" id="address" maxlength="40" required/>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-2">
            <div class="d-flex flex-column flex-fill">
                <label class="form-label" for="apartment">Apartment, suite, ect.</label>
                <input class="form-control" type="text" name="apartment" maxlength="30" id="apartment"/>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-2">
            <div class="d-flex flex-column flex-fill">
                <label class="form-label" for="city">City</label>
                <input class="form-control" type="text" name="city" maxlength="58" id="city" required/>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-2">
            <div class="d-flex flex-column flex-fill">
                <label class="form-label" for="state">State/province</label>
                <input class="form-control" type="text" name="state" maxlength="58" id="state" required/>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-2">
            <div class="d-flex flex-column flex-fill">
                <label class="form-label" for="country">Country</label>
                <input class="form-control" type="text" name="country" maxlength="58" id="country" required/>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-2">
            <div class="d-flex flex-column flex-fill">
                <label class="form-label" for="zip">ZIP/postal code</label>
                <!--Type text form postal code as different countries can have letters in postal code -->
                <input class="form-control" type="text" name="zip" id="zip" maxlength="10" required/>
            </div>
        </div>
        <input type="submit" class="mt-3 btn btn-primary" value="Place order" name="purchase" />
    </form>
</div>
<script>
    function validate(form) {
        /*
        UCID: ajd99
        DATE: 12/16/2022
        */

        // added to remove previous error messages on screen if trying to submit form again
        while(document.getElementById("flash").firstChild) {
            document.getElementById("flash").removeChild(document.getElementById("flash").firstChild);
        }
        
        // getting form values
        let country = form.country.value;
        let state = form.state.value;
        let city = form.city.value;
        let lastName = form.lastName.value;
        let firstName = form.firstName.value;

        // name regex matches only strings with max length 20
        let nameRegex = /^[a-zA-Z]+$/;
        // same as name regex just for code readability
        let countryStateCityRegex = /^[a-zA-Z]+$/;

        let hasError = false;
        if(!nameRegex.test(firstName) && !nameRegex.test(lastName)) {
            flash("Name input fields can only contain characters.", "warning");
            hasError = true;
        }
        if(!countryStateCityRegex.test(country) && !countryStateCityRegex.test(city) && !countryStateCityRegex.test(state)) {
            flash("Country, city, and state field must only contain characters.", "warning");
            hasError = true;
        }
        return (!hasError);
    }
</script>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>