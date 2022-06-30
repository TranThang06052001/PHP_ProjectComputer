<?php

require "evConfig.php";
// $Category = "";
// $Name = "";
// $Quantity = "";
// $Price = "";
// $Sale = "";
// $Company = "";
// $Description = "";
// $image = "";
// $Description = "";
// $method = "/Shop_Computer/admin/AddProduct";
// if (isset($_GET['id'])) {
//     $method = "/Shop_Computer/admin/UpdateProduct&id=$_GET[id]";
// }
// if (!empty($data)) {
//     $Category = $data[0]->id_category;
//     $Name = $data[0]->name_product;
//     $image = $host . "/MVC/Upload/" . ($data[0]->imageURL);
//     $Quantity = $data[0]->quantity;
//     $Price = $data[0]->price;
//     $Sale = $data[0]->Sale;
//     $Company = $data[0]->Production_company;
//     $Description = $data[0]->Description;
// }
?>



<div class="content-wrapper">
    <div class="col-md-12  grid-margin">
        <div class="card">
            <div class="card-body">
                <form class="form-sample f-add-product" enctype="multipart/form-data" method="post" action="<?php echo $method ?>">
                    <div class="row">
                        <div class="input_form col-md-7">

                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label for="FullName" class="col-sm-4 col-form-label">Full Name</label>
                                    <div class="col-sm-8">
                                        <input required type="text" id="FullName" autofocus required name="FullName" spellcheck=false class="form-control form-control_custom">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label for="Address" class="col-sm-4 col-form-label">Address</label>
                                    <div class="col-sm-8">
                                        <input required type="text" id="Address" autofocus required name="Address" spellcheck=false class="form-control form-control_custom">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label for="ID_card" class="col-sm-4 col-form-label">Code ID</label>
                                    <div class="col-sm-8">
                                        <input required type="text" id="ID_card" autofocus required name="ID_card" spellcheck=false class="form-control form-control_custom">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label for="gmail" class="col-sm-4 col-form-label">Gmail</label>
                                    <div class="col-sm-8">
                                        <input required type="text" id="gmail" autofocus required name="gmail" spellcheck=false class="form-control form-control_custom">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label for="Username" class="col-sm-4 col-form-label">Username</label>
                                    <div class="col-sm-8">
                                        <input required type="text" id="Username" autofocus required name="Username" spellcheck=false class="form-control form-control_custom">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label for="Password" class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input required type="password" id="Password" autofocus required name="Password" spellcheck=false class="form-control form-control_custom">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="image_form col-md-5 text-center">
                            <div class="image_wrapp">
                                <img class="image_p" width="100%" src="<?php echo  $image ?>" href="" />
                                <label class="lable_image label_upload btn btn-primary" for="upload_image"><i class="mdi mdi-upload"></i></label>
                                <span class="lable_image label_delete btn btn-danger"><i class="mdi mdi-delete"></i></span>
                                <input type="file" id="upload_image" accept="image/*" name="Image_product">
                            </div>
                            <label class="mt-4" style="cursor: pointer;" for="upload_image">
                                Choose image staff
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Permission</label>
                            <div class="col-sm-8 row">
                                <?php
                                foreach ($data as $rul) {
                                    $nameRul = $string = str_replace(' ', '', $rul);
                                ?>
                                    <div class="form-check mr-5 mb-4">
                                        <label class="form-check-label" style="min-width:120px">
                                            <input name="<?php echo  $nameRul ?>" type="checkbox" class="form-check-input"><?php echo  $rul ?><i class="input-helper"></i></label>
                                    </div>
                                <?php  } ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mt-5">
                        <button type="submit" style="padding: 14px;" class="btn btn-primary" id="add">Done</button>
                        <a class="btn btn-danger ml-4" href="/Shop_Computer/admin/ProductManagement" style="padding: 14px;">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("img").on("error", function() {
        $(this).attr("src", "<?= $host ?>/public/images/defaulft_image.png")
    })
    $(document).ready(() => {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.image_p').attr('src', e.target.result)
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#upload_image").on('change', function() {
            console.log( $("#upload_image").files)
            readURL(this)
        })

        $(".label_delete").on('click', function() {
            $('.image_p').attr('src', "<?= $host ?>/public/images/defaulft_image.png")
            $("#upload_image").val("")
        })
    })
</script>