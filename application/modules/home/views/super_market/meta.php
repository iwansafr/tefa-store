<!-- <title>Super Market an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title> -->
<!-- for-mobile-apps -->
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
<!-- <meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,Smartphone Compatible web template, free webdesigns for Nokia,Samsung, LG, SonyEricsson, Motorola web design" /> -->
<link href="<?php echo base_url('templates/super_market/');?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url('templates/super_market/');?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="<?php echo base_url('templates/super_market/');?>css/font-awesome.css" rel="stylesheet"> 
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); }
</script>
<!-- //for-mobile-apps -->
<!-- js -->

<script src="<?php echo base_url().'templates/super_market/';?>js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo base_url().'templates/super_market/';?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url().'templates/super_market/';?>js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<?php 
if(!empty($site_value['image']))
{
	?>
	<span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject"> <link itemprop="url" href="<?php echo image_module('config','super_market_config/'.$site_value['image']); ?>"> </span>
	<?php
}
?>
