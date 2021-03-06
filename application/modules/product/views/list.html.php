<?php defined('BASEPATH') OR exit('No direct script access allowed');

$data = array_chunk($data,4);
$link = !empty($keyword) ? $url_get.'&sort=' : product_cat_link($title).'?sort=';
?>

	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="<?php echo base_url() ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active"><?php echo $title ?></li>
			</ol>
		</div>
	</div>
	<div class="products">
		<div class="container">
			<div class="col-md-12 products-right">
				<div class="products-right-grid">
					<div class="products-right-grids">
						<div class="sorting">
							<select id="p_sort" class="frm-field required sect form-control">
								<option value="<?php echo $link ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i>Default sorting</option>
								<option value="<?php echo $link.'ph2l' ?>" <?php echo $psort == 'ph2l' ? 'selected' : '' ?>><i class="fa fa-arrow-right" aria-hidden="true"></i>High Price to Low</option>
								<option value="<?php echo $link.'pl2h' ?>" <?php echo $psort == 'pl2h' ? 'selected' : '' ?>><i class="fa fa-arrow-right" aria-hidden="true"></i>Low Price to High</option>
								<option value="<?php echo $link.'newest' ?>" <?php echo $psort == 'newest' ? 'selected' : '' ?>><i class="fa fa-arrow-right" aria-hidden="true"></i>Newest</option>
							</select>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<?php
				foreach ($data as $key => $value)
				{
					?>
					<div class="agile_top_brands_grids">
						<?php
						if(!empty($value))
						{
							foreach ($value as $vkey => $vvalue)
							{
								?>
								<div class="col-md-3 top_brand_left">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid_pos">
												<img src="<?php echo base_url().'templates/'.$active_template.'/'; ?>images/offer.png" alt=" " class="img-responsive">
											</div>
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block">
														<div class="snipcart-thumb">
															<a href="<?php echo product_link($vvalue['slug']) ?>"><img title=" " alt=" " src="<?php echo image_module('product',$vvalue['id'].'/'.$vvalue['image']) ?>" style="object-fit: contain;width: 150px;height: 150px;"></a>
															<p><?php echo $vvalue['title'] ?></p>
															<h4><?php echo 'Rp. '.number_format($vvalue['price']-($vvalue['price']*@intval($vvalue['discount']))/100,'2',',','.') ?> <br><span><?php echo 'Rp. '.number_format($vvalue['price'],'0',',','.') ?></span></h4>
														</div>
														<div class="snipcart-details top_brand_home_details">
															<form action="#" method="post">
																<fieldset>
																	<input type="hidden" name="cmd" value="_cart">
																	<input type="hidden" name="add" value="1">
																	<input type="hidden" name="business" value=" ">
																	<input type="hidden" name="item_name" value="Fortune Sunflower Oil">
																	<input type="hidden" name="amount" value="35.99">
																	<input type="hidden" name="discount_amount" value="1.00">
																	<input type="hidden" name="currency_code" value="USD">
																	<input type="hidden" name="return" value=" ">
																	<input type="hidden" name="cancel_return" value=" ">
																	<input type="submit" name="submit" value="Add to cart" class="button">
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
						}
						?>
						<div class="clearfix"> </div>
					</div>
					<?php
				}
				?>
				<nav class="numbering">
<!-- 					<ul class="pagination paging">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li>
							<a href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul> -->
					<?php echo $page_nation; ?>
				</nav>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>