<?php
    include $_SERVER['DOCUMENT_ROOT'].'/catatanuang/db.php';
    require $_SERVER['DOCUMENT_ROOT'].'/catatanuang/source.php';
    session_start(); 
    if( ! isset($_SESSION['username']))
    {
        header("location: $url/index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pencatatan Keuangan Pribadi</title>
        <link rel="shortcut icon" href="<?php echo $url;?>assets/favicon/logopbg.ico">
        <link href="<?php echo $url; ?>/css/styles.css" rel="stylesheet" />
        <link href="<?php echo $url; ?>/css/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo $url; ?>/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="<?php echo $url; ?>/js/all.min.js" crossorigin="anonymous"></script>
        <style type="text/css">
            .collapse1
            {
                display: none;
            }
            .collapse2
            {
                display: block;
            }
            .off
            {

            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary-sd-dark">
            <a class="navbar-brand" href="<?php echo $url; ?>/main/">Pencatatan Keuangan Pribadi</a>
            <button class="navbar-toggler btn btn-p-sd" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary-sd-dark" id="nav-menu">
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item btn btn-p-sd" id="main_nav" >
                            <a class="nav-link" href="<?php echo $url; ?>/main/">
                                <i class="fas fa-tachometer-alt"></i><br>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item btn btn-p-sd" id="pemasukan_nav" >
                            <a class="nav-link" href="<?php echo $url; ?>/main/pemasukan.php">
                                <i class="fas fa-coins"></i><br>
                                Pemasukan Keuangan Pribadi
                            </a>
                        </li>
                        <li class="nav-item btn btn-p-sd" id="pengeluaran_nav" >
                            <a class="nav-link" href="<?php echo $url; ?>/main/pengeluaran.php">
                                <i class="fas fa-coins"></i><br>
                                Pengeluaran Keuangan Pribadi
                            </a>
                        </li>

                    </ul>
                    <ul class="navbar-nav ml-auto ml-md-0">
                        <li class="nav-item dropdown btn btn-p-sd" id="profil_nav">
                            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?php echo $url."/main/profil.php"?>">Info Profil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo $url."/logout.php"?>">Logout</a>
                            </div>
                        </li>
                    </ul>
              </div>
            </nav>