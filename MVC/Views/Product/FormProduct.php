<?php

require "evConfig.php";
$Category = "";
$Name = "";
$Quantity = "";
$Price = "";
$Sale = "";
$Company = "";
$Description = "";
$image = "";
if (!empty($data)) {
    foreach ($_SESSION["categorys"] as $category) {
        if ($category->id_category = $data[0]->id_category) {
            $Category = $category->name_category;
        }
    }
    $Name = $data[0]->name_product;
    $image = $data[0]->imageURL;
    $Quantity = $data[0]->quantity;
    $Price = $data[0]->price;
    // $Sale = $data[0]->Sale;
    $Company = $data[0]->Production_company;
    // $Description = $data[0]->$Description;
}
?>



<div class="content-wrapper">
    <div class="col-md-12  grid-margin">
        <div class="card">
            <div class="card-body">
                <form class="form-sample f-add-product" enctype="multipart/form-data" method="post" action="/Shop_Computer/admin/AddProduct">
                    <div class="row">
                        <div class="input_form col-md-7">

                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input required value="<?php echo $Name ?>" type="text" id="NameProduct" autofocus required name="NameProduct" spellcheck=false class="form-control form-control_custom">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Category</label>
                                    <div class="col-sm-8 ">
                                        <select class="categoryList form-control form-control_custom">
                                            <?php foreach ($_SESSION["categorys"] as $category) {
                                                if ($Category == $category->name_category) {
                                            ?>
                                                    <option value="<?php echo $category->id_category; ?>" checked>
                                                        <?php echo $category->name_category; ?>*</option>
                                            <?php } else {
                                                    echo `<option class="form-control form-control_custom">$category->name_category</option>`;
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Quantity</label>
                                    <div class="col-sm-8">
                                        <input required type="number" id="Quantity" required name="Quantity" spellcheck=false class="form-control form-control_custom">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Price ($)</label>
                                    <div class="col-sm-8">
                                        <input required type="text" id="Price" required name="Price" spellcheck=false class="form-control money form-control_custom">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Sale (%)</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="Sale" required name="sale" spellcheck=false class="form-control form-control_custom">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Company</label>
                                    <div class="col-sm-8">
                                        <input required type="text" id="ProductionCompany" required name="ProductionCompany" spellcheck=false class="form-control form-control_custom">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="image_form col-md-5 text-center">
                            <div class="image_wrapp">
                                <img class="image_p" width="100%" src="<?= $host ?>/public/images/defaulft_image.png" href="" />
                                <label class="lable_image label_upload btn btn-primary" for="upload_image"><i class="mdi mdi-upload"></i></label>
                                <span class="lable_image label_delete btn btn-danger"><i class="mdi mdi-delete"></i></span>
                                <input type="file" id="upload_image" accept="image/*" name="Image_product">
                            </div>
                            <label class="mt-4" style="cursor: pointer;" for="upload_image">
                                Choose image product
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control form-control_custom" name="description" id="description" style="min-height:130px"></textarea>
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
    $(document).ready(() => {
        $('.money').simpleMoneyFormat();
        CKEDITOR.replace('description');

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
            readURL(this)
        })
        $(".label_delete").on('click', function() {
            $('.image_p').attr('src', "<?= $host ?>/public/images/defaulft_image.png")
            $("#upload_image").val("")
        })

        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode != 46 && charCode > 31 &&
                (charCode < 48 || charCode > 57)) {
                return false;
            }

            return true;
        }
        // $("#Price").on("change", function () {
        //     if(isNumberKey($(this).val())){
        //         alert("Please enter number type !");
        //         $(this).val('');
        //         $(this).focus();
        //     }
        // })
    })
</script>