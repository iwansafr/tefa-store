<div class="container">
	<div class="w3ls_logo_products_left1">
		<ul class="phone_email">
			<?php $phone = '085000000000' ?>
			<li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : <a href="tel:<?php echo $phone ?>" style="color: #212121;"><?php echo $phone ?></a></li>
		</ul>
	</div>
	<div class="w3ls_logo_products_left">
		<a href="<?php echo base_url(); ?>">
			<?php
			if(!empty($logo_value['image']))
			{
				$link = !empty($logo_value['is_custom']) ? image_module('config',$active_template.'_config/'.@$logo_value['image']) : image_module('config', 'logo/'.@$logo_value['image']);
				?>
				<img src="<?php echo $link ?>" height="<?php echo $logo_value['height'] ?>">
				<?php
			}else{
				echo '<h1><a href="'.base_url().'">'.$logo_value['title'].'</a></h1>';
			}
			?>
		</a>
	</div>
	<div class="w3l_search">
		<form action="<?php echo base_url('search') ?>" method="get" name="cart">
			<input type="search" name="keyword" placeholder="Search for a Product..." required="" value="<?php echo !empty($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
			<button type="submit" class="btn btn-default search" aria-label="Left Align">
				<i class="fa fa-search" aria-hidden="true"> </i>
			</button>
			<div class="clearfix"></div>
		</form>
	</div>
	<div class="clearfix"> </div>
</div>