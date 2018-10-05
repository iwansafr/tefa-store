<?php
$site_value = $this->esg->get_config('site');
if(!empty($config_active_template))
{
	$site_value['title']       = !empty($config_active_template['site_title']) ? $config_active_template['site_title'] : $site_value['title'];
	$site_value['link']        = !empty($config_active_template['site_link']) ? $config_active_template['site_link'] : $site_value['link'];
	$site_value['image']       = !empty($config_active_template['site_image']) ? $config_active_template['site_image'] : $site_value['image'];
	$site_value['keyword']     = !empty($config_active_template['site_keyword']) ? $config_active_template['site_keyword'] : $site_value['keyword'];
	$site_value['description'] = !empty($config_active_template['site_description']) ? $config_active_template['site_description'] : $site_value['description'];
}
$mod['name'] = $this->router->fetch_class();
$mod['task'] = $this->router->fetch_method();
$image       = image_module('config', 'site/'.@$site_value['image']);

if($mod['name'] == 'content')
{
	$site_value = $this->config->item('meta');
	$image      = @$site_value['image'];
}
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo @$site_value['title'] ?></title>
<meta name="description" content="<?php echo $site_value['description'] ?>">
<meta name="keywords" content="<?php echo $site_value['keyword'] ?>">
<meta name="developer" content="esoftgreat">
<meta name="author" content="admin">
<meta name="ROBOTS" content="all, index, follow">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $image; ?>">


<meta name="url" content="<?php echo base_url() ?>">
<meta name="og:title" content="<?php echo $site_value['title'] ?>"/>
<meta name="og:type" content="site"/>
<meta name="og:url" content="<?php echo base_url() ?>"/>
<meta name="og:image" content="<?php echo $image ?>"/>
<meta name="og:site_name" content="<?php echo $site_value['title'] ?>"/>
<meta name="og:description" content="<?php echo $site_value['description'] ?>"/>

<meta content="<?php echo $image ?>" property="og:image"/>
<meta content="<?php echo $site_value['title'] ?>" property="og:title"/>
<meta content="<?php echo $site_value['description'] ?>" property="og:description"/>
<meta content="<?php echo $image ?>" itemprop='url'/>

<link itemprop="thumbnailUrl" href="<?php echo $image ?>">
<span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject"> <link itemprop="url" href="<?php echo $image ?>"> </span>

<link href="<?php echo base_url().'templates/admin/'; ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url().'templates/admin/'; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url().'templates/admin/'; ?>modules/esg/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url().'templates/'.$active_template.'/'; ?>css/style.css" rel="stylesheet">
<!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css"> -->
<script src="<?php echo base_url().'templates/admin/'; ?>js/plugins/ckeditor/ckeditor.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<?php
if(!empty($site_value))
{
	$data['site_value'] = $site_value;
	$this->load->view('home/'.$active_template.'/meta', $data);
}