<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SI Bantuan Sosial</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url() ?>/img/favicon.png" rel="icon">
    <link href="<?= base_url() ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url() ?>/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url() ?>/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>/css/style.css" rel="stylesheet">
    <script src="<?= base_url() ?>/js/jquery-3.5.1.min.js"></script>

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- header -->
    <?= $this->include('layout/header') ?>
    <!-- ======= Sidebar ======= -->
    <?= $this->include('layout/sidebar') ?>
    <!-- End Sidebar-->

    <main id="main" class="main">
        <?= $this->renderSection('content') ?>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?= $this->include('layout/footer') ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/vendor/chart.js/chart.min.js"></script>
    <script src="<?= base_url() ?>/vendor/echarts/echarts.min.js"></script>
    <script src="<?= base_url() ?>/vendor/quill/quill.min.js"></script>
    <script src="<?= base_url() ?>/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url() ?>/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url() ?>/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url() ?>/vendor/simple-datatables/simple-datatables.js"></script>
    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>/js/main.js"></script>


</body>

</html>