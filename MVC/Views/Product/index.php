<?php

require "evConfig.php";
?>

<div class="content-wrapper">

    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="page-header">
                        <h3 class="page-title"> List Products </h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item pr-5">
                                    <select class="form-control form-control_custom" style="min-width:200px">
                                        <option checked value="all">All*</option>
                                        <?php foreach ($_SESSION["categorys"] as $category) { ?>
                                            <option value="<?php echo $category->id_category ?>"><?php echo $category->name_category ?></option>
                                        <?php } ?>
                                    </select>
                                </li>
                                <li class="breadcrumb-item pr-2">
                                    <a class="btn-add-p btn btn-primary d-flex align-items-center" href="/Shop_Computer/admin/form">
                                        <i class="mdi mdi-plus" style="font-size:18px"></i>
                                        Add
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <button class="btn delete_product btn-danger d-flex align-items-center">
                                        <i class="mdi mdi-delete-forever" style="font-size:20px"></i>
                                        Delete
                                    </button>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check form-check-muted m-0">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input checkALL">
                                            </label>
                                        </div>
                                    </th>
                                    <th> ID</th>
                                    <th> Image </th>
                                    <th> Name </th>
                                    <th> Price </th>
                                    <th> Quantity </th>
                                    <th> Production company </th>
                                    <th> Sold </th>
                                    <th> Category </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($data as $Product) { ?>

                                    <tr>
                                        <td>
                                            <div class="form-check form-check-muted m-0">
                                                <label class="form-check-label">
                                                    <input id_product="<?php echo ($Product->id_product) ?>" type="checkbox" class="form-check-input form_check">
                                                </label>
                                            </div>
                                        </td>
                                        <td> <?php echo ($Product->id_product) ?></td>
                                        <td>
                                            <a href="/Shop_Computer/admin/form&id=<?php echo ($Product->id_product) ?>">
                                                <img class="img-p" src="<?php echo $host . "/MVC/Upload/" . ($Product->imageURL) ?>" />
                                            </a>
                                        </td>

                                        <td><?php echo ($Product->name_product) ?> </td>
                                        <td> <?php echo ($Product->price) ?> </td>
                                        <td> <?php echo ($Product->quantity) ?> </td>
                                        <td><?php echo ($Product->Production_company) ?> </td>
                                        <td><?php echo ($Product->sold) ?> </td>
                                        <td><?php
                                            foreach ($_SESSION["categorys"] as $category) {
                                                if ($category->id_category == $Product->id_category) {
                                                    echo ($category->name_category);
                                                }
                                            }
                                            ?> </td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    $("img").on("error", function() {
        $(this).attr("src", "<?= $host ?>/public/images/defaulft_imagep.png")
    })
    $(".checkALL").on("change", function() {
        if (this.checked) {
            $('.form_check').each(function() {
                this.checked = true;
            })
        } else {
            $('.form_check').each(function() {
                this.checked = false;
            })
        }
    })
    /**?form_check/delete_product */
    let check = 0;
    $(".delete_product").on("click", function() {
        $('.form_check').each(function() {
            if (this.checked) {
                check = 1;
                $.ajax({
                    url: "/Shop_Computer/admin/DeleteProduct",
                    type: "POST",
                    data: {
                        id: ($(this).attr('id_product')),
                    },
                }).done((re) => {
                    location.reload(true);
                })
            }
        })
        if (check == 0) {
            alert('Please select the product you want to delete!')
        }
    })
</script>