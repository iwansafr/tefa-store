<div class="container">
	<div class="w3ls_logo_products_left1">
		<ul class="phone_email">
			<li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : 085 640 510 460</li>
		</ul>
	</div>
	<div class="w3ls_logo_products_left">
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
	</div>
	<div class="w3l_search">
		<form action="#" method="post">
			<input type="search" name="Search" placeholder="Search for a Product..." required="">
			<button type="submit" class="btn btn-default search" aria-label="Left Align">
				<i class="fa fa-search" aria-hidden="true"> </i>
			</button>
			<div class="clearfix"></div>
		</form>
	</div>
	<div class="clearfix"> </div>
</div>