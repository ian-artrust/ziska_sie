<?php
    require_once "_config/config.php";
    if(!isset($_SESSION['username'])){
        echo "<script>window.location='".base_url('auth/login.php')."'</script>";
    }else{
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - Ziska SIE</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('_assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('_assets/css/simple-sidebar.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('_assets/css/menu.css'); ?>" rel="stylesheet">

     <style>
      @font-face{
        font-family: "sqr";
        src: url('../_assets/fonts/square721.ttf');
      }

      html, body {
        font-family: "sqr";
      }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- jQuery -->
    <script src="<?=base_url('_assets/js/jquery.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>

    <!-- Highcarts Library -->
    <script src="<?=base_url('_assets/js/highcharts.js')?>"></script>
    <script src="<?=base_url('_assets/js/exporting.js')?>"></script>
    <script src="<?=base_url('_assets/js/export-data.js')?>"></script>
    <script src="<?=base_url('_assets/js/wNumb.min.js')?>"></script>

    <!-- START WRAPPER -->
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav list-unstyled components">
                <li class="sidebar-brand">
                    <a href="<?=base_url('dashboard')?>"><span class="text-primary"><b>SIE ZISKA</b></span></a>
                </li>
                <li>
                    <a href="#penghimpunan" data-toggle="collapse" aria-expanded="false">Penghimpunan</a>
                    <ul class="collapse list-unstyled" id="penghimpunan">
                        <li><a href="?page=penghimpunan">Global Penghimpunan</a></li>
                        <li><a href="?page=penghimpunan_detail">Detail Penghimpunan</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#pendistribusian" data-toggle="collapse" aria-expanded="false">Pendistribusian</a>
                    <ul class="collapse list-unstyled" id="pendistribusian">
                        <li><a href="?page=pendistribusian">Global Pendistribusian</a></li>
                        <li><a href="?page=pendistribusian_detail">Detail Pendistribusian</a></li>
                        <li><a href="?page=pendistribusian_bidang">Bidang Pendistribusian</a></li>
                        <li><a href="?page=pendistribusian_asnaf">Asnaf Pendistribusian</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#datapokok" data-toggle="collapse" aria-expanded="false">Infromasi Data Pokok</a>
                    <ul class="collapse list-unstyled" id="datapokok">
                        <li><a href="?page=muzaki">Muzaki</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url('_config/logout.php');?>"><span class="text-danger"><b>Logout</b></span></a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">

<?php
}
?>
