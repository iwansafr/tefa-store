<?php
$site_value = $site['value'];
$site_value = json_decode($site_value,1);
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo $site_value['description'] ?>">
<meta name="author" content="iwan@esoftgreat.com">
<title><?php echo $site_value['title'] ?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo image_module('config','site/'.@$site_value['image']) ?>">
<link href="<?php echo base_url().'templates/admin/'; ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url().'templates/admin/'; ?>css/sb-admin.css" rel="stylesheet">
<link href="<?php echo base_url().'templates/admin/'; ?>css/plugins/morris.css" rel="stylesheet">
<link href="<?php echo base_url().'templates/admin/'; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url().'templates/admin/'; ?>css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css">
<!-- <link href="<?php echo base_url().'templates/admin/'; ?>css/material-kit.css" rel="stylesheet"/> -->
<!-- <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script> -->
<script src="<?php echo base_url().'templates/admin/'; ?>js/plugins/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="<?php echo base_url().'templates/admin/'; ?>css/bootstrap-tagsinput.css"></link>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->