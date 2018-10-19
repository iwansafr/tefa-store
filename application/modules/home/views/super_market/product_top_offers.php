<?php defined('BASEPATH') OR exit('No direct script access allowed');
$num = array(1,2,3);
foreach ($num as $key => $value)
{
	$data_config = get_block_config('product_top_offer_'.$value, $config_template);
	if(!empty($data_config['id']))
	{
		$product[]     = $this->esg->get_product($data_config['where'], @intval($data_config['limit']));
	}
}
?>
<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
	<ul id="myTab" class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Advertised offers</a></li>
		<li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours">Today Offers</a></li>
		<li role="presentation"><a href="#extra" role="tab" id="extra-tab" data-toggle="tab" aria-controls="extra">Today Offers</a></li>
	</ul>
	<div id="myTabContent" class="tab-content">
		<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
			<div class="agile-tp">
				<h5>Advertised this week</h5>
				<p class="w3l-ad">We've pulled together all our advertised offers into one place, so you won't miss out on a great deal.</p>
			</div>
			<?php
			if(!empty($product[0]))
			{
				$product[0] = array_chunk($product[0], 3);
				foreach ($product[0] as $key => $value)
				{
					?>
					<div class="agile_top_brands_grids">
						<?php
						foreach ($value as $vkey => $vvalue)
						{
							?>
							<div class="col-md-4 top_brand_left">
							<div class="hover14 column">
								<div class="agile_top_brand_left_grid">
									<div class="agile_top_brand_left_grid_pos">
										<img src="<?php echo base_url().'templates/super_market/';?>images/offer.png" alt=" " class="img-responsive" />
									</div>
									<div class="agile_top_brand_left_grid1">
										<figure>
											<div class="snipcart-item block" >
												<div class="snipcart-thumb">
													<a href="<?php echo product_link($vvalue['slug']); ?>"><img title=" " height="150" alt=" " src="<?php echo image_module('product', $vvalue['id'].'/'.$vvalue['image'])?>" /></a>
													<p><?php echo $vvalue['title'] ?></p>
													<!-- <div class="stars">
														<i class="fa fa-star blue-star" aria-hidden="true"></i>
														<i class="fa fa-star blue-star" aria-hidden="true"></i>
														<i class="fa fa-star blue-star" aria-hidden="true"></i>
														<i class="fa fa-star blue-star" aria-hidden="true"></i>
														<i class="fa fa-star gray-star" aria-hidden="true"></i>
													</div> -->
													<h4><?php echo 'Rp. '.number_format($vvalue['price']-($vvalue['price']*@intval($vvalue['discount']))/100,'2',',','.') ?> <span><?php echo 'Rp. '.number_format($vvalue['price'], '2',',','.'); ?></span></h4>
												</div>
												<div class="snipcart-details top_brand_home_details">
													<form action="#" method="post" name="add_cart">
														<fieldset>
															<input type="hidden" name="id" value="<?php echo $vvalue['id'] ?>">
															<input type="submit" name="submit" value="Add to cart" class="button" />
														</fieldset>
													</form>
												</div>
											</div>
										</figure>
									</div>
								</div>
							</div>
							</div>
							<?php
						}
						?>
						<?php
						?>
						<div class="clearfix"> </div>
					</div>
					<?php
				}
			}
			?>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
			<div class="agile-tp">
				<h5>This week</h5>
				<p class="w3l-ad">We've pulled together all our advertised offers into one place, so you won't miss out on a great deal.</p>
			</div>
			<?php
			if(!empty($product[1]))
			{
				$product[1] = array_chunk($product[1], 3);
				foreach ($product[1] as $key => $value)
				{
					?>
					<div class="agile_top_brands_grids">
						<?php
						foreach ($value as $vkey => $vvalue)
						{
							?>
							<div class="col-md-4 top_brand_left">
							<div class="hover14 column">
								<div class="agile_top_brand_left_grid">
									<div class="agile_top_brand_left_grid_pos">
										<img src="<?php echo base_url().'templates/super_market/';?>images/offer.png" alt=" " class="img-responsive" />
									</div>
									<div class="agile_top_brand_left_grid1">
										<figure>
											<div class="snipcart-item block" >
												<div class="snipcart-thumb">
													<a href="<?php echo product_link($vvalue['slug']); ?>"><img title=" " alt=" " height="150" src="<?php echo image_module('product', $vvalue['id'].'/'.$vvalue['image'])?>" /></a>
													<p><?php echo $vvalue['title'] ?></p>
													<!-- <div class="stars">
														<i class="fa fa-star blue-star" aria-hidden="true"></i>
														<i class="fa fa-star blue-star" aria-hidden="true"></i>
														<i class="fa fa-star blue-star" aria-hidden="true"></i>
														<i class="fa fa-star blue-star" aria-hidden="true"></i>
														<i class="fa fa-star gray-star" aria-hidden="true"></i>
													</div> -->
													<h4><?php echo 'Rp. '.number_format($vvalue['price']-($vvalue['price']*@intval($vvalue['discount']))/100,'2',',','.') ?> <span><?php echo 'Rp. '.number_format($vvalue['price'], '2',',','.'); ?></span></h4>
												</div>
												<div class="snipcart-details top_brand_home_details">
													<form action="#" method="post">
														<fieldset>
															<input type="hidden" name="cmd" value="_cart" />
															<input type="hidden" name="add" value="1" />
															<input type="hidden" name="business" value=" " />
															<input type="hidden" name="item_name" value="<?php echo $vvalue['title'] ?>" />
															<input type="hidden" name="amount" value="<?php echo $vvalue['price'] ?>" />
															<input type="hidden" name="discount_amount" value="<?php echo $vvalue['discount'] ?>" />
															<input type="hidden" name="currency_code" value="Rp" />
															<input type="hidden" name="return" value=" " />
															<input type="hidden" name="cancel_return" value=" " />
															<input type="submit" name="submit" value="Add to cart" class="button" />
														</fieldset>
													</form>
												</div>
											</div>
										</figure>
									</div>
								</div>
							</div>
							</div>
							<?php
						}
						?>
						<?php
						?>
						<div class="clearfix"> </div>
					</div>
					<?php
				}
			}
			?>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="extra" aria-labelledby="extra-tab">
			<div class="agile-tp">
				<h5>This week</h5>
				<p class="w3l-ad">We've pulled together all our advertised offers into one place, so you won't miss out on a great deal.</p>
			</div>
			<?php
			if(!empty($product[2]))
			{
				$product[2] = array_chunk($product[2], 3);
				foreach ($product[2] as $key => $value)
				{
					?>
					<div class="agile_top_brands_grids">
						<?php
						foreach ($value as $vkey => $vvalue)
						{
							?>
							<div class="col-md-4 top_brand_left">
							<div class="hover14 column">
								<div class="agile_top_brand_left_grid">
									<div class="agile_top_brand_left_grid_pos">
										<img src="<?php echo base_url().'templates/super_market/';?>images/offer.png" alt=" " class="img-responsive" />
									</div>
									<div class="agile_top_brand_left_grid1">
										<figure>
											<div class="snipcart-item block" >
												<div class="snipcart-thumb">
													<a href="<?php echo product_link($vvalue['slug']); ?>"><img title=" " alt=" " height="150" src="<?php echo image_module('product', $vvalue['id'].'/'.$vvalue['image'])?>" /></a>
													<p><?php echo $vvalue['title'] ?></p>
													<!-- <div class="stars">
														<i class="fa fa-star blue-star" aria-hidden="true"></i>
														<i class="fa fa-star blue-star" aria-hidden="true"></i>
														<i class="fa fa-star blue-star" aria-hidden="true"></i>
														<i class="fa fa-star blue-star" aria-hidden="true"></i>
														<i class="fa fa-star gray-star" aria-hidden="true"></i>
													</div> -->
													<h4><?php echo 'Rp. '.number_format($vvalue['price']-($vvalue['price']*@intval($vvalue['discount']))/100,'2',',','.') ?> <span><?php echo 'Rp. '.number_format($vvalue['price'], '2',',','.'); ?></span></h4>
												</div>
												<div class="snipcart-details top_brand_home_details">
													<form action="#" method="post">
														<fieldset>
															<input type="hidden" name="cmd" value="_cart" />
															<input type="hidden" name="add" value="1" />
															<input type="hidden" name="business" value=" " />
															<input type="hidden" name="item_name" value="<?php echo $vvalue['title'] ?>" />
															<input type="hidden" name="amount" value="<?php echo $vvalue['price'] ?>" />
															<input type="hidden" name="discount_amount" value="<?php echo $vvalue['discount'] ?>" />
															<input type="hidden" name="currency_code" value="Rp" />
															<input type="hidden" name="return" value=" " />
															<input type="hidden" name="cancel_return" value=" " />
															<input type="submit" name="submit" value="Add to cart" class="button" />
														</fieldset>
													</form>
												</div>
											</div>
										</figure>
									</div>
								</div>
							</div>
							</div>
							<?php
						}
						?>
						<?php
						?>
						<div class="clearfix"> </div>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</div>