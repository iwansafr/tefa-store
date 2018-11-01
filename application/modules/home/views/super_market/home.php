<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('home/meta');?>
</head>
<?php $dir = 'home/'.$active_template.'/'; ?>
<body>
	<div class="agileits_header">
		<?php $this->load->view($dir.'menu_user'); ?>
	</div>
	<div class="logo_products">
		<?php $this->load->view('home/logo') ?>
	</div>
	<div class="navigation-agileits">
		<div class="container">
			<?php $this->load->view($dir.'menu_top') ?>
		</div>
	</div>
	<?php
	if($content == 'home/product')
	{
		$this->load->view($dir.'slider') ?>
		<div class="top-brands">
			<div class="container">
			<h2>Top selling offers</h2>
				<div class="grid_3 grid_5">
					<?php $this->load->view($dir.'product_top_offers')?>
				</div>
			</div>
		</div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <?php $this->load->view($dir.'product_banner_top') ?>
    </div>
		<div class="ban-bottom-w3l">
			<?php $this->load->view($dir.'banner_bottom') ?>
		</div>
		<!-- <div class="brands">
			<?php $this->load->view($dir.'brands') ?>
		</div> -->
		<?php
	}else{
		$this->load->view($content);
	}?>
		<div class="newproducts-w3agile">
			<div class="container">
				<?php $this->load->view($dir.'product_new_offers') ?>
			</div>
		</div>
		<div class="footer">
			<div class="container">
				<div class="w3_footer_grids">
					<div class="col-md-3 w3_footer_grid">
						<?php
						$menu_bottom = array();
						for($i=1;$i<4;$i++)
						{
							$menu_bottom[$i]['menu'] = 'menu_bottom_'.$i;
						}
						?>
						<?php $this->load->view($dir.'contact') ?>
					</div>
					<div class="col-md-3 w3_footer_grid">
						<?php $this->load->view($dir.'menu_bottom',$menu_bottom[1]) ?>
					</div>
					<div class="col-md-3 w3_footer_grid">
						<?php $this->load->view($dir.'menu_bottom',$menu_bottom[2]) ?>
					</div>
					<div class="col-md-3 w3_footer_grid">
						<?php $this->load->view($dir.'menu_bottom',$menu_bottom[3]) ?>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="footer-copy">
				<?php $this->load->view('home/footer') ?>
			</div>
		</div>
		<div class="footer-botm">
			<div class="container">
				<div class="w3layouts-foot">
					<?php $this->load->view($dir.'menu_social_media') ?>
				</div>
				<div class="payment-w3ls">
					<img src="<?php echo base_url().'templates/super_market/';?>images/card.png" alt=" " class="img-responsive">
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<script src="<?php echo base_url().'templates/super_market/';?>js/bootstrap.min.js"></script>
<?php
$this->session->set_userdata('link_js', base_url().'templates/'.$active_template.'/'.'js/'.'script.js');
$this->esg->js();
?>
<script type="text/javascript">
	$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear'
			};
		*/

		$().UItoTop({ easingType: 'easeOutQuart' });

		});
</script>
<!-- <script src="<?php echo base_url().'templates/super_market/';?>js/minicart.min.js"></script> -->
<script>
	// Mini Cart
	// paypal.minicart.render({
	// 	action: '#'
	// });

	// if (~window.location.search.indexOf('reset=true')) {
	// 	paypal.minicart.reset();
	// }
</script>
<?php
// $this->load->view($dir.'cart')
?>
<script src="<?php echo base_url().'templates/super_market/';?>js/skdslider.min.js"></script>
<link href="<?php echo base_url().'templates/super_market/';?>css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});

			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});

		});
</script>
<img src="<?php echo base_url('templates/super_market/images/loading.gif') ?>" id="loading" style="display: none;">
</body>
</html>