<h3>New offers</h3>
<?php
$data_config = get_block_config('product_new_offers', $config_template);
if(!empty($data_config['where']))
{
	$product = $this->esg->get_product($data_config['where'], @intval($data_config['limit']));
}
?>
<div class="agile_top_brands_grids">
	<?php
	if(!empty($product))
	{
		foreach ($product as $key => $value)
		{
			$text = '';
			$link = product_link($value['slug']);
			$text .= 'nama product : '.$value['title'];
			$text .= "\n";
			$text .= $link;
			$text = urlencode($text);
			?>
			<div class="col-md-3 top_brand_left-1">
				<div class="hover14 column">
					<div class="agile_top_brand_left_grid">
						<div class="agile_top_brand_left_grid_pos">
							<img src="<?php echo base_url().'templates/super_market/';?>images/offer.png" alt=" " class="img-responsive">
						</div>
						<div class="agile_top_brand_left_grid1">
							<figure>
								<div class="snipcart-item block">
									<div class="snipcart-thumb">
										<a href="<?php echo $link ?>"><img title="<?php echo $value['title'] ?>" height="150" alt="<?php echo $value['title'] ?>" src="<?php echo !empty($value['image_link']) ? $value['image_link'] : image_module('product', $value['id'].'/'.$value['image']) ?>"></a>
										<p><?php echo $value['title'] ?></p>
										<!-- <div class="stars">
											<i class="fa fa-star blue-star" aria-hidden="true"></i>
											<i class="fa fa-star blue-star" aria-hidden="true"></i>
											<i class="fa fa-star blue-star" aria-hidden="true"></i>
											<i class="fa fa-star blue-star" aria-hidden="true"></i>
											<i class="fa fa-star gray-star" aria-hidden="true"></i>
										</div> -->
										<h4 class="">
											<?php
											echo 'Rp. '.number_format($value['price']-($value['price']*@intval($value['discount']))/100,'2',',','.');
											if(!empty($value['discount']))
											{
												?>
												<span><?php echo 'Rp. '.number_format($value['price'],'2',',','.') ?></span>
												<?php
											}?>
										</h4>
									</div>
									<div class="snipcart-details top_brand_home_details">
										<form action="#" method="post" name="add_cart">
											<fieldset>
												<input type="hidden" name="id" value="<?php echo $value['id'] ?>">
												<input type="submit" name="submit" value="Add to cart" class="button" />
												<a href="https://wa.me/<?php echo @$profile['wa'];?>?text=<?php echo $text;?>" class="button btn btn-success" style="margin-top: 5%;">Order Via WA <i class="fa fa-whatsapp"></i></a>
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
	}
	?>

	<div class="clearfix"> </div>
</div>