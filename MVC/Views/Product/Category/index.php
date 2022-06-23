<?php

require "evConfig.php";
?>
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="align-items-center justify-content-between d-flex mb-4">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Categorys :</h4>
                        <p class="card-description ml-2"><?php echo count($data); ?> / <?php echo $_SESSION['numCategories'] ?></p>
                    </div>

                    <a class="btn-add-p btn btn-primary d-flex align-items-center" href="/Shop_Computer/admin/AddCategory">
                        <i class="mdi mdi-plus" style="font-size:18px"></i>
                        Add
                    </a>
                </div>

                <div class="table-responsive">
                    <?php if (count($data) > 0) { ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Number product</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // if (isset($_SESSION['start'])) {
                                $i = $_SESSION['start'];
                                $end = $_SESSION['end'];
                                // }
                                for ($index = 0; $index < count($data); $index++) {
                                    if ($i - 1 <= $index && $index < $end) {
                                        $category = $data[$index];
                                        // var_dump($data[$index]);
                                        // // die();
                                ?>
                                        <tr>
                                            <td>
                                                <?php echo  $index + 1 ?>
                                            </td>
                                            <td>
                                                <?php echo  $category->id_category ?>
                                            </td>
                                            <td>
                                                <input spellcheck="false" required id_category="<?php echo  $category->id_category ?>" class="NameCategory p-2" style="background-color: inherit;height:40px;width:200px; border: 1px solid #333;;outline:none;color: inherit" type="text" value=" <?php echo  $category->name_category ?>">
                                            </td>
                                            <td>12 May 2017</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="/Shop_Computer/admin/DeleteCategory&id=<?php echo  $category->id_category ?>" class="btn btn-danger d-flex align-items-center">
                                                        <i class="mdi mdi-delete-forever" style="font-size:20px"></i>
                                                        Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                <?php };
                                };
                                ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo "<h1 Class='text-center p-4'>There are no categories ! </h1>";
                    } ?>
                </div>
                <?php if ($_SESSION['numCategories'] > count($data)) { ?>
                    <div class="text-center mt-4">
                        <a href="<?php echo "/Shop_Computer/$path" ?>" class="view_all btn btn-success">View all</a>
                    </div>
                <?php } ?>
                <nav aria-label="Page navigation " style="border-top: 1px solid #333;z-index: 200;
                                position: fixed;
                                right: 0px;
                                left: 0px;
                                border-top: 1px solid #333;
                                bottom: 0px;
                                background-color: #191c24;
                                ">
                    <?php if (count($data) > 5) {
                        $numbers = ceil(count($data) / 5);

                    ?>
                        <ul class="pagination justify-content-center pt-3">
                            <li class="page-item">
                                <a class="page-link" href="/Shop_Computer/admin/Category&page=<?php echo isset($_GET['page']) && $_GET['page'] > 0 ? ($_GET['page'] - 1) : '0' ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php
                            for ($num = 0; $num < $numbers; $num++) {
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href="/Shop_Computer/admin/Category&page=<?php echo $num; ?>"><?php echo $num + 1; ?></a>
                                </li>
                            <?php  } ?>
                            <li class="page-item">
                                <a class="page-link" href="/Shop_Computer/admin/Category&page=<?php echo isset($_GET['page']) && $_GET['page'] < $numbers - 1 ? ($_GET['page'] + 1) : $numbers - 1 ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    <?php   } ?>
                </nav>
            </div>

        </div>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(() => {
        $(".view_all").attr("href", `/Shop_Computer/${path}`);
        $('.NameCategory').each(function() {
            $(this).on('change', function() {
                $.ajax({
                    url: "/Shop_Computer/admin/UpdateCategory",
                    type: "POST",
                    data: {
                        // cancel: true,
                        NameCategory: $(this).val(),
                        id: $(this).attr('id_category')
                    },
                }).done((responsive) => {
                    // console.log(responsive);
                })
                if ($(this).val().trim() == '') {
                    $(this).val($(this).prop('defaultValue'));
                }
                // <?php
                    // if (isset($_SESSION['messagess'])) {
                    //     echo "alert('$_SESSION[messagess]');";
                    //     echo "$(this).val($(this).prop('defaultValue'))";
                    // }
                    // 
                    ?>

            })
        })
    })
</script>