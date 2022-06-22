<?php
require "evConfig.php";
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
}
if (isset($_COOKIE["user"])) {
    $user = json_decode($_COOKIE["user"]);
    $username = $user[0];
    $password = $user[1];
};
if (isset($_SESSION['message'])) {
    echo "<script>  $(document).ready(() => {alert('$_SESSION[message]');})</script>";
}
?>

<div class="wrapForm col-md-4 offset-md-2 ">
    <div class="card" style="background-color:#2f3850">
        <div class="card-body">
            <div class="logo mb-4 text-center">
                <img width="80%" src="<?php echo $host ?>/public/images/Logo.png" alt="logo">
            </div>
            <form class="forms-sample" id="formlogin" action="" method="post">
                <div class="form-group">
                    <label for="Username">Username</label>
                    <input type="text" name="username" value="<?php if (isset($username)) {
                                                                    echo "$username";
                                                                } ?>" required class="form-control" id="Username" placeholder="Username">
                </div>
                <div class="form-group mt-5">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" value="<?php if (isset($user) && !isset($_SESSION['message'])) echo  "$password" ?>" name="password" required class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-check form-check-flat d-flex justify-content-between  form-check-primary">
                    <label class="form-check-label w-50">
                        <input <?php echo (isset($password) ? "checked" : "") ?> name="Remember" type="checkbox" class="form-check-input"> Remember me </label>
                    <a href="#" class="pr-2" style="font-size:14px;color:#999db1">Forgot Password ?</a>
                </div>
                <button type="submit" id="submit" class="btn btn-primary d-block w-50 mt-5  p-2" style="font-size:1.2rem;margin-left:auto;margin-right:auto;">Login</button>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        input = $('#Username');
        input.focus();
        tmpStr = input.val();
        input.val('');
        input.val(tmpStr);
        $.ajax({
            url: "/Shop_Computer/admin/login",
            type: "POST",
            data: {
                cancel: true,
            },
        }).done(() => {
            console.log("done");
        })
    })
</script>