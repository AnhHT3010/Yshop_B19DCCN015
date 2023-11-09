<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Quản trị YSHOP</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="public/img/favicon.png" rel="icon">
    <link href="public/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="public/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="public/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="public/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="public/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="public/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="public/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <?php
    require_once("./views/admin/menu.php") ?>
    <?php
    $mod = isset($_GET['mod']) ? $_GET['mod'] : "admin";
    $act = isset($_GET['act']) ? $_GET['act'] : "";
    switch ($mod) {
        case 'admin':
            require_once("./views/bangdieukhien/bangdieukhien.php");
            break;
        case 'danhmuc':
            switch ($act) {
                case 'list':
                    require_once("./views/danhmuc/list.php");
                    break;
                case 'add':
                    require_once("./views/danhmuc/add.php");
                    break;
                case 'edit':
                    require_once("./views/danhmuc/edit.php");
                    break;
                case 'detail':
                    require_once("./views/danhmuc/detail.php");
                    break;
                default:
                    require_once("./views/danhmuc/list.php");
                    break;
            }
            break;
        default:
            require_once("./views/bangdieukhien/bangdieukhien.php");
            break;
    }
    ?>
    <!-- Vendor JS Files -->
    <script src="public/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="public/vendor/chart.js/chart.umd.js"></script>
    <script src="public/vendor/echarts/echarts.min.js"></script>
    <script src="public/vendor/quill/quill.min.js"></script>
    <script src="public/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="public/vendor/tinymce/tinymce.min.js"></script>
    <script src="public/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="public/js/main.js"></script>

    <script script src="//static.filestackapi.com/filestack-js/3.x.x/filestack.min.js">
    </script>
</body>

</html>