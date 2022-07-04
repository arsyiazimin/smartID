<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>SMART IDENTIFICATION</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url() ?>table/lib/datatables/css/demo_table_jui.css" type="text/css">

    <!-- select file backup/restore.php -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>js/jquery.inputfile.css" />
    <script type="text/javascript" src="<?php echo base_url() ?>jquery-1.2.6.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    .bdash {
        background-image:url('<?php echo base_url() ?>images/15.jpg');
        background-attachment: fixed;
        background-position: center center;
        background-size: cover;
        /*margin-top: -1px;*/
        min-height: 667px;
    }

    </style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url()?>mahasiswa">Smart Identification</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url() ?>welcome/logout"><i class="fa fa-fw fa-power-off"></i> Keluar</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li >
                        <a href="<?php echo base_url() ?>dosen/"><i class="fa fa-fw fa-dashboard"></i> Beranda</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>dosen/jadwal_dosen"><i class="fa fa-fw fa-dashboard"></i>Jadwal</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>dosen/log_presensi"><i class="fa fa-fw fa-dashboard"></i>Data Presensi</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        
        <div id="page-wrapper" class="bdash">

            <div class="container-fluid">
              <?php echo $this->session->flashdata('notification'); ?>
                