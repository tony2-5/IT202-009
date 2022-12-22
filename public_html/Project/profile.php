<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
$user_id = (int)se($_GET, "id", get_user_id(), false);
$isMe = $user_id == get_user_id();
$isEdit = isset($_GET["edit"]);

$db = getDB();    
?>
<?php
if (isset($_POST["save"]) && $isMe && $isEdit) {
    $email = se($_POST, "email", null, false);
    $username = se($_POST, "username", null, false);
    $vis = isset($_POST["vis"]) ? 1 : 0;
    $params = [":email" => $email, ":username" => $username, ":id" => get_user_id(), ":vis" => $vis];

    $stmt = $db->prepare("UPDATE Users set email = :email, username = :username, visibility = :vis where id = :id");
    try {
        $stmt->execute($params);
        flash("Profile saved", "success");
    } catch (Exception $e) {
        users_check_duplicate($e->errorInfo);
    }
    //check/update password
    $current_password = se($_POST, "currentPassword", null, false);
    $new_password = se($_POST, "newPassword", null, false);
    $confirm_password = se($_POST, "confirmPassword", null, false);
    if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
        if ($new_password === $confirm_password) {
            //TODO validate current
            $stmt = $db->prepare("SELECT password from Users where id = :id");
            try {
                $stmt->execute([":id" => get_user_id()]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if (isset($result["password"])) {
                    if (password_verify($current_password, $result["password"])) {
                        $query = "UPDATE Users set password = :password where id = :id";
                        $stmt = $db->prepare($query);
                        $stmt->execute([
                            ":id" => get_user_id(),
                            ":password" => password_hash($new_password, PASSWORD_BCRYPT)
                        ]);

                        flash("Password reset", "success");
                    } else {
                        flash("Current password is invalid", "warning");
                    }
                }
            } catch (Exception $e) {
                echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
            }
        } else {
            flash("New passwords don't match", "warning");
        }
    }
}
//select fresh data from table
$stmt = $db->prepare("SELECT id, email, username,visibility, created from Users where id = :id LIMIT 1");
$isVisible = false;
try {
    $stmt->execute([":id" => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        if ($isMe) {
            $_SESSION["user"]["email"] = $user["email"];
            $_SESSION["user"]["username"] = $user["username"];
        }
        if (se($user, "visibility", 0, false) > 0) {

            $isVisible = true;
        }
        $email = se($user, "email", "", false);
        $username = se($user, "username", "", false);
        $joined = se($user, "created", "", false);
    } else {
        flash("User doesn't exist", "danger");
    }
} catch (Exception $e) {
    flash("An unexpected error occurred, please try again", "danger");
    //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
}

//select users rating data from table
$ratings = [];
$db = getDB();
// selecting ratings from Ratings table
$stmt = $db->prepare("SELECT Ratings.rating, Ratings.comment, Ratings.created, Users.username FROM Users JOIN Ratings ON Users.id = Ratings.user_id WHERE Ratings.user_id = :uid ORDER BY Ratings.created DESC LIMIT 10;");
try {
    $stmt->execute([":uid" => $user_id]);
    $ra = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($ra) {
        $ratings = $ra;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error getting ratings", "danger");
}
?>

<?php
$email = get_user_email();
$username = get_username();
?>
<div class="container-fluid">
    <h1>Profile</h1>

    <?php if ($isMe && $isEdit) : ?>
        <?php if ($isMe) : ?>
            <a href="<?php echo get_url("profile.php"); ?>">View</a>
        <?php endif; ?>
        <form method="POST" onsubmit="return validate(this);">
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" value="<?php se($email); ?>" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" type="text" name="username" id="username" value="<?php se($username); ?>" />
            </div>
            <div class="mb-3">
                <div class="form-check form-switch">
                    <input <?php if ($isVisible) {
                                echo "checked";
                            } ?> class="form-check-input" type="checkbox" role="switch" id="vis" name="vis">
                    <label class="form-check-label" for="vis">Toggle Visibility</label>
                </div>
            </div>
            <!-- DO NOT PRELOAD PASSWORD -->
            <div class="mb-3">Password Reset</div>
            <div class="mb-3">
                <label class="form-label" for="cp">Current Password</label>
                <input class="form-control" type="password" name="currentPassword" id="cp" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="np">New Password</label>
                <input class="form-control" type="password" name="newPassword" id="np" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="conp">Confirm Password</label>
                <input class="form-control" type="password" name="confirmPassword" id="conp" />
            </div>
            <input type="submit" class="mt-3 btn btn-primary" value="Update Profile" name="save" />
        </form>
    <?php else : ?>
        <?php if ($isMe) : ?>
            <a href="?edit">Edit</a>
        <?php endif; ?>
        <?php if ($isVisible || $isMe) : ?>
            <div class="container-fluid d-flex align-items-center flex-column">
                <table class="table table-striped"> 
                    <h1> Review History</h1>
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
                            <td><?php se($rating,"username") ?></td>
                            <td><?php se($rating,"rating") ?></td>
                            <td><?php se($rating,"comment") ?></td>
                            <td><?php se($rating,"created") ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            Profile is private
            <?php
            flash("Profile is private", "warning");
            redirect("home.php");
            ?>
        <?php endif; ?>
</div>
<?php endif; ?>

<script>
    function validate(form) {

        // added to remove previous error messages on screen if trying to submit form again
        while(document.getElementById("flash").firstChild) {
            document.getElementById("flash").removeChild(document.getElementById("flash").firstChild);
        }

        let cp = form.currentPassword.value;
        let pw = form.newPassword.value;
        let con = form.confirmPassword.value;
        let isValid = true;
        //TODO add other client side validation....
        let user = document.getElementById("username");
        let email = document.getElementById("email");
        let newPassword = document.getElementById("np");
        let userNameRegex = /^[a-z0-9_-]{3,16}$/;
        // allows any number of characters greater than one until @ then until . then after .
        let emailRegex = /^.+\@.+\..+$/;
        let hasError = false;
        if(userNameRegex.test(user.value)) {
            hasError = false;
        }
        else {
            flash("Invalid username","warning");
            hasError = true;
        }
        if(emailRegex.test(email.value) && hasError==false) {
            hasError = false;
        }
        if(!emailRegex.test(email.value)) {
            flash("Invalid email","warning");
            hasError = true;
        }
        // cp.length>0 to check if user is attempting to change password
        if(cp.length>0 && newPassword.value.length<8) {
            flash("New password length less than 8 characters","warning");
            hasError = true;
        }
        //example of using flash via javascript
        //find the flash container, create a new element, appendChild
        if (pw !== con) {
            //find the container
            let flash = document.getElementById("flash");
            //create a div (or whatever wrapper we want)
            let outerDiv = document.createElement("div");
            outerDiv.className = "row justify-content-center";
            let innerDiv = document.createElement("div");

            //apply the CSS (these are bootstrap classes which we'll learn later)
            innerDiv.className = "alert alert-warning";
            //set the content
            innerDiv.innerText = "Password and Confirm password must match";

            outerDiv.appendChild(innerDiv);
            //add the element to the DOM (if we don't it merely exists in memory)
            flash.appendChild(outerDiv);
            hasError = true;
        }
        return (!hasError);
    }
</script>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>