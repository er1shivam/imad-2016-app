<?php 
$page_title = "Edit Profile";
require_once("patches/header.php");
require_once("patches/profileBody.php"); 
?>

<div class="container">
    <section class="col col-lg-7">
    <h2>Edit Profile</h2><hr>
    <div>
    <?php if(isset($result)) echo $result; ?>
    <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
    </div>
    <?php if(!isset($_SESSION['username'])): ?>
    <p> You are not authorized to view this page<a href="login.php">Login</a>
    Not yet a member? <a href="signup.php">Signup</a></p>

    <?php else: ?>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label for="emailField">Email</label>
        <input type="text" name="email" class="form-control" id="emailField" value="<?php if(isset($email)) echo $email; ?>">
        </div>

        <div class="form-group">
            <label for="usernameField">Username</label>
            <input type="text" name="username" value="<?php if(isset($username)) echo $username; ?>" class="form-control" id="usernameField">
        </div>
        <div class="form-group">
            <label for="fileField">Avatar</label>
            <input type="file" name="avatar" id="fileField">
        </div>
        <input type="hidden" name="hidden_id" value="<?php if(isset($id)) echo $id; ?>">
        <button type="submit" name="updateProfileBtn" class="btn btn-primary pull-right">Update profile</button>
        </form>    
        <?php endif ?>
    </section>
        <p>
            <a href="index.php">Click to go back</a>
        </p>
</div>

<?php include_once("patches/footer.php"); ?>