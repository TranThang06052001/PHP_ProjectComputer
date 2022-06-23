<?php

require "evConfig.php";

?>



<!-- <span class="btn btn-danger  position-absolute" style="width:50px;height:40px;right:20px;top:20px;font-size:24px">
    <i class="mdi mdi-close"></i>
</span> -->
<div class="form_add-d col-md-10  grid-margin">
    <div class="card" style="background-color:#16244a">
        <div class="card-body">
            <h4 class="card-title">Add Product</h4>
            <form class="form-sample f-add-product" method="post" action="/Shop_Computer/admin/AddProduct">
                <div class="row mr-md-4 ml-md-4">
                    <div class="input_form col-md-8">
                        <div class="row mt-5">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input required  type="text" id="NameProduct" autofocus required name="NameProduct" spellcheck=false class="form-control form-control_custom">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Category</label>
                                    <div class="col-sm-8 categoryList">
                                        <select name="category" id="category" class="form-control form-control_custom">
                                            <?php foreach ($_SESSION["categorys"] as $category) { ?>
                                                <option value="<?php echo $category->id_category?>"><?php echo $category->name_category?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Quantity</label>
                                    <div class="col-sm-8">
                                        <input required type="number" id="Quantity" required name="Quantity" spellcheck=false class="form-control form-control_custom">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Producing country</label>
                                    <div class="col-sm-8">
                                        <input required type="text" id="ProducingCountry" required name="ProducingCountry" spellcheck=false class="form-control form-control_custom">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Price</label>
                                    <div class="col-sm-8">
                                        <input required type="number" id="Price" required name="Price" spellcheck=false class="form-control form-control_custom">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Production company</label>
                                    <div class="col-sm-8">
                                        <input required type="text" id="ProductionCompany" required name="ProductionCompany" spellcheck=false class="form-control form-control_custom">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="image_form mt-5 col-md-4">
                        <div class="image_wrapp">
                            <img class="image_p" width="100%" src="<?= $host ?>/public/images/defaulft_image.png" href="" />
                            <label class="lable_image label_upload btn btn-primary" for="upload_image"><i class="mdi mdi-upload"></i></label>
                            <span class="lable_image label_delete btn btn-danger"><i class="mdi mdi-delete"></i></span>
                            <input required type="file" id="upload_image" accept="image/*" name="Image_product">
                        </div>
                        <label class="mt-4 w-100 text-center" style="cursor: pointer;" for="upload_image">
                            Choose image product
                        </label>
                        <button class="btn btn-primary w-25" id="add" style="margin-top:70px">Done</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
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
            readURL(this)
        })
        $(".label_delete").on('click', function() {
            $('.image_p').attr('src', "<?= $host ?>/public/images/defaulft_image.png")
            $("#upload_image").val("")
        })
        $("#add").on('click', function(e) {
            // e.preventDefault();
            let NameProduct = $("#NameProduct").val()
            let Price = $("#Price").val()
            let Quantity = $("#Quantity").val()
            let sold = 2
            let category = $("#category").val()
            let ProducingCountry = $("#ProducingCountry").val()
            let ProductionCompany = $("#ProductionCompany").val()
            $.ajax({
                url: "/Shop_Computer/admin/AddProduct",
                type: "POST",
                data: {
                    NameProduct,
                    Price,
                    Quantity,
                    // sold,
                    // NameProduct,
                    category,
                    ProducingCountry,
                    ProductionCompany
                },
            }).done((re) => {
                // location.reload(true);
                console.log(re)
            })
        })


    })
</script>