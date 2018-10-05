<div class="container">
	<div class="w3l_offers">
		<p>SALE UP TO 70% OFF. USE CODE "SALE70%" . <a href="products.html">SHOP NOW</a></p>
	</div>
	<div class="agile-login">
		<ul>
			<?php
			$data_config = get_block_config('menu_user', $config_template);
			if(!empty($data_config['table']))
			{
			  $data_menu = $this->db->get_where($data_config['table'], 'publish = 1 AND par_id = 0 AND position_id = '.$data_config['id'])->result_array();
			  foreach ($data_menu as $dkey => $dvalue)
			  {
			    ?>
			    <li><a href="<?php echo $dvalue['link']; ?>"><?php echo ucfirst($dvalue['title']) ?></a></li>
			    <?php
			  }
			}
			?>
		</ul>
	</div>
	<div class="product_list_header">
			<form action="#" method="post" class="last">
				<input type="hidden" name="cmd" value="_cart">
				<input type="hidden" name="display" value="1">
				<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
			</form>
	</div>
	<div class="clearfix"> </div>
</div>