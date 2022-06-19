<?php require "evConfig.php";

if (isset($_COOKIE["user"])) {
    $user = json_decode($_COOKIE["user"]);
    $username = $user[0];
    $password = $user[1];
};
?>

<div class="wrapForm col-md-4 offset-md-4 ">
    <div class="card" style="background-color:#2f3850">
        <div class="card-body">
            <div class="logo mb-4 text-center">
                <img width="80%" src="<?php echo $host ?>/public/images/Logo.png" alt="logo">
            </div>
            <form class="forms-sample" action="" method="post">
                <div class="form-group">
                    <label for="exampleInputUsername1">Username</label>
                    <input type="text" name="username" value="<?php echo (isset($user) ? "$username" : "") ?>" required class="form-control" id="exampleInputUsername1" placeholder="Username">
                </div>
                <div class="form-group mt-5">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" value="<?php if (isset($user) && !isset($_SESSION['message'])) echo  "$password" ?>" name="password" required class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label w-50">
                        <input <?php echo (isset($user) ? "checked" : "") ?> name="Remember" type="checkbox" class="form-check-input"> Remember me </label>
                </div>
                <button type="submit" class="btn btn-primary d-block w-50 mt-5  p-2" style="font-size:1.2rem;margin-left:auto;margin-right:auto;">Login</button>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        <?php
        if (isset($_SESSION['message'])) {

            echo "alert('$_SESSION[message]');";
            echo "$('#exampleInputPassword1').focus();";
            /**lỗi không  */
            // unset($_SESSION['message']);
        } else {
        }
        ?>
    })
</script>