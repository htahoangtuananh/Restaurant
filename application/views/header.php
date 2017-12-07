
<?php
/**
 * @author Tuan Anh <htc.hoangtuananh@gmail.com>
 */
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
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
<style type="text/css">
    @font-face {
        font-family: "UVNSaigon_R";
        src: url("<?= base_url().'assets/fonts/UVNSaigon_R.ttf'?>") format('truetype');
    }
    @font-face {
        font-family: "Roboto-Light";
        src: url("<?= base_url().'assets/fonts/Roboto-Light.ttf'?>") format('truetype');
    }
    @font-face {
        font-family: "Roboto-Bold";
        src: url("<?= base_url().'assets/fonts/Roboto-Bold.ttf'?>") format('truetype');
    }
    @font-face {
        font-family: "Roboto-Italic";
        src: url("<?= base_url().'assets/fonts/Roboto-Italic.ttf'?>") format('truetype');
    }
    @font-face {
        font-family: "Roboto-Regular";
        src: url("<?= base_url().'assets/fonts/Roboto-Regular.ttf'?>") format('truetype');
    }
</style>