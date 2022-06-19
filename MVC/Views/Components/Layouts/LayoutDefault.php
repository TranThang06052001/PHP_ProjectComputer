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
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= $host ?>/public/assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="<?= $host ?>/public/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= $host ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?= $host ?>/public/assets/css/custom-style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= $host ?>/public/assets/images/favicon.png" />
</head>

<body>
    <script src="<?= $host ?>/public/assets/vendors/js/vendor.bundle.base.js"></script>
    <div class="container-scroller">
        <?= $routes->routeResult("content") ?>
    </div>


    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?= $host ?>/public/assets/vendors/select2/select2.min.js"></script>
    <script src="<?= $host ?>/public/assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= $host ?>/public/assets/js/off-canvas.js"></script>
    <script src="<?= $host ?>/public/assets/js/hoverable-collapse.js"></script>
    <script src="<?= $host ?>/public/assets/js/misc.js"></script>
    <script src="<?= $host ?>/public/assets/js/settings.js"></script>
    <script src="<?= $host ?>/public/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?= $host ?>/public/assets/js/file-upload.js"></script>
    <script src="<?= $host ?>/public/assets/js/typeahead.js"></script>
    <script src="<?= $host ?>/public/assets/js/select2.js"></script>
    <!-- End custom js for this page -->
</body>

</html>