<?php require "evConfig.php"; ?>
<!-- <h1>trang Login</h1> -->


<div class="wrapForm col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="logo">
                <img src="<?php echo $host ?>/public/images/Logo.png" alt="logo">
            </div>
            <form class="forms-sample" action="" method="post">
                <div class="form-group">
                    <label for="exampleInputUsername1">Username</label>
                    <input type="text" name="username" required class="form-control" id="exampleInputUsername1" placeholder="Username">
                </div>
                <div class="form-group mt-5">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" required class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label w-50">
                        <input name="checkbox" type="checkbox" class="form-check-input"> Remember me </label>
                </div>
                <button type="submit" class="btn btn-primary d-block w-50 mt-5  p-2" style="font-size:1.2rem;margin-left:auto;margin-right:auto;">Login</button>
            </form>
        </div>
    </div>
</div>