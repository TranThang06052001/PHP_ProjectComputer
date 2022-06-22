<div class="col-md-6 offset-md-2 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-5">Change the password</h4>
            <form id="changePassword" class="forms-sample" action="" method="post">
                <div class="form-group row">
                    <label for="Password" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="Password" name="Password" required placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="NewPassword" class="col-sm-4 col-form-label">New Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="NewPassword" name="NewPassword" required placeholder="New Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ConfirmPassword" class="col-sm-4 col-form-label">Confirm Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="ConfirmPassword" name="ConfirmPassword" required placeholder="Confirm Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2 mt-5">Change</button>
                <a href="/Shop_Computer/admin" class="Cancel btn btn-danger mr-2 mt-5 ">Cancel</a>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        // let pasValidate;
        // $("#NewPassword").on("change",()=>{
        //     pasValidate=$("#NewPassword").val();
        // })
        $("#changePassword").on("submit", () => {
            if ($("#NewPassword").val() === $("#ConfirmPassword").val()) {
                return true;
            } else {
                alert("Please confirm password again !")
                $("#ConfirmPassword").val("");
                $("#ConfirmPassword").focus();
                return false;
            }
        })
        $(".Cancel").on('click', ()=>{
            if(confirm("Are you sure you want to cancel ?") ){
                return true
            }else return  false;
        })
    })
</script>