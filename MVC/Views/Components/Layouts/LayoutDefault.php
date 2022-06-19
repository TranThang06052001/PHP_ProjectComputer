<?php
require_once './routes.php';
require "evConfig.php";
$routes = new Route();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $routes->routeResult("title") ? $routes->routeResult("title") : "" ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= $host ?>/public/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= $host ?>/public/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= $host ?>/public/assets/vendors/jvectormap/jquery-jvectormap.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= $host ?>/public/assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="<?= $host ?>/public/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="<?= $host ?>/public/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= $host ?>/public/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= $host ?>/public/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="shortcut icon" href="<?= $host ?>/public/assets/images/favicon.png" />

    <link rel="stylesheet" href="<?= $host ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?= $host ?>/public/assets/css/custom-style.css">
    <!-- End layout styles -->

</head>

<body>
    <script src="<?= $host ?>/public/assets/vendors/js/vendor.bundle.base.js"></script>
    <div class="container-scroller">
        <?= include "MVC/Views/Components/Commons/_sidebar.php"; ?>
        <div class="container-fluid page-body-wrapper">
            <?php include "MVC/Views/Components/Commons/_navbar.php"; ?>
            <div class="main-panel">
                <?php
                $routes->routeResult("content");
                include "MVC/Views/Components/Commons/_footer.php";
                ?>
            </div>
        </div>

    </div>
    <script src="<?= $host ?>/public/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="<?= $host ?>/public/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="<?= $host ?>/public/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="<?= $host ?>/public/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?= $host ?>/public/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= $host ?>/public/assets/js/off-canvas.js"></script>
    <script src="<?= $host ?>/public/assets/js/hoverable-collapse.js"></script>
    <script src="<?= $host ?>/public/assets/js/misc.js"></script>
    <script src="<?= $host ?>/public/assets/js/settings.js"></script>
    <script src="<?= $host ?>/public/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?= $host ?>/public/assets/js/dashboard.js"></script>

</body>

</html>