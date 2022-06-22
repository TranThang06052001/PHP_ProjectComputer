<?php

require "evConfig.php";
// var_dump($data);
?>

<div class="popup_add d-none">
    <?php include __DIR__ . "/FormProduct.php"; ?>
</div>
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
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </li>
                                <li class="breadcrumb-item pr-2">
                                    <a class="btn-add-p btn btn-primary d-flex align-items-center" href="#">
                                        <i class="mdi mdi-plus" style="font-size:18px"></i>
                                        Add
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a class="btn btn-danger d-flex align-items-center" href="#">
                                        <i class="mdi mdi-delete-forever" style="font-size:20px"></i>
                                        Delete
                                    </a>
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
                                                <input type="checkbox" class="form-check-input">
                                            </label>
                                        </div>
                                    </th>
                                    <th> ID</th>
                                    <th> Image </th>
                                    <th> Name </th>
                                    <th> Price </th>
                                    <th> Quantity </th>
                                    <th> Producing country</th>
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
                                                    <input type="checkbox" class="form-check-input">
                                                </label>
                                            </div>
                                        </td>
                                        <td> <?php echo ($Product->id_product) ?></td>
                                        <td>
                                            <img class="img-p" src="<?php echo ($Product->imageURL) ?>" />
                                        </td>

                                        <td><?php echo ($Product->name_product) ?> </td>
                                        <td> <?php echo ($Product->price) ?> </td>
                                        <td> <?php echo ($Product->quantity) ?> </td>
                                        <td><?php echo ($Product->Producing_country) ?> </td>
                                        <td><?php echo ($Product->Production_company) ?> </td>
                                        <td><?php echo ($Product->sold) ?> </td>
                                        <td><?php echo ($Product->id_category) ?> </td>

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
</script>