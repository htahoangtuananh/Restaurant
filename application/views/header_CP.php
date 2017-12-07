<?php
/**
 * @author Tuan Anh <htc.hoangtuananh@gmail.com>
 */
  defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title><?= $this->lang->line('Content Management System');?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url().'assets/wp-content/uploads/2015/10/fav.png'?>">
    <meta name="keywords" content=""/>
    <meta name="language" content="vi"/>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->

    <link rel='stylesheet' id='boostrap-css' href='<?php echo base_url()."assets/css/bootstrap.min.css"?>'/>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/AdminLTE.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/datatables.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-toggle.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/custom.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/skins/_all-skins.min.css'?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script  type='text/javascript' src="<?php echo base_url().'assets/js/jQuery.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/datatables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/custom.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap-toggle.min.js'?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url().'assets/js/adminlte.min.js'?>"></script>
</head>
<script>
    $(document).ready(function(){
    $('.dataTable').DataTable();
    });
</script>

<body class="skin-blue sidebar-mini" style="height: auto; min-height: 100%;">
    <header class="main-header">
              <!-- Logo -->
            <a class="logo"  href="<?php echo base_url()?>">
                 <span class="logo-lg">Admin control panel</span>
                 <span class="logo-mini"><b>A</b>LT</span>
            </a>

            <div class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                   <?php if($this->session->admin_logged_in == TRUE):?>
                    <li>
                        <a class="title" href="<?php echo base_url().'index.php/AdminCP'?>"><?php echo $this->session->username ?></a>
                    </li>
                    <li>
                        <a class="title" href="<?php echo base_url().'index.php/logout'?>"><?= $this->lang->line('Log out');?></a>
                    </li>
                    <?php else: ?>
                    <li>
                        <a class="title"><?= $this->lang->line('Havent logged in yet');?></a>
                    </li>
                <?php endif;?>
                    </ul>
                </div>
            </div>
    </header>
    <div class="row">
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="height: auto;">






		