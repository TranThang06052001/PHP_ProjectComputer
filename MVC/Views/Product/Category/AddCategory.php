<?php
if (isset($_SESSION['messages'])) {
    echo "<script>  $(document).ready(() => {alert('$_SESSION[messages]');})</script>";
} ?>
<div class="col-md-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="" class="forms-sample text-center">
                <div class="form-group row">
                    <label for="NameCategory" class="col-sm-3 col-form-label">Name category</label>
                    <div class="col-sm-9">
                        <input type="text" autofocus required name="NameCategory" class="form-control" id="NameCategory" placeholder="Name category">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2 mt-4">Add</button>
                <a class="btn btn-dark mt-4" href="/Shop_Computer/admin/Category">Cancel</a>
            </form>
        </div>
    </div>
</div>

<style>
    .footer {
        display: none;
    }
</style>
<script>
    $(document).ready(() => {
        $.ajax({
            url: "/Shop_Computer/admin/AddCategory",
            type: "POST",
            data: {
                cancel: true,
            },
        }).done((a) => {
            console.log(a);
        })
    })
</script>