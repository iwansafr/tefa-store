<?php defined('BASEPATH') OR exit('No direct script access allowed');
$data_config = get_block_config('product_top_offer_1', $config_template);
$product     = $this->esg->get_product($data_config['where'], @intval($data_config['limit']));
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
			<div class="agile_top_brands_grids">
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
											<a href="products.html"><img title=" " alt=" " src="<?php echo base_url().'templates/super_market/';?>images/1.png" /></a>
											<p>Tata-salt</p>
											<div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div>
											<h4>$20.99 <span>$35.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
													<input type="hidden" name="amount" value="20.99" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
											<a href="products.html"><img title=" " alt=" " src="<?php echo base_url().'templates/super_market/';?>images/2.png" /></a>
											<p>Fortune-sunflower</p>
											<div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div>
											<h4>$20.99 <span>$35.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="basmati rise" />
													<input type="hidden" name="amount" value="20.99" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
				<div class="col-md-4 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="<?php echo base_url().'templates/super_market/';?>images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="products.html"><img src="<?php echo base_url().'templates/super_market/';?>images/3.png" alt=" " class="img-responsive" /></a>
											<p>Aashirvaad-atta</p>
											<div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div>
											<h4>$40.99 <span>$65.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Pepsi soft drink" />
													<input type="hidden" name="amount" value="40.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
				<div class="clearfix"> </div>
			</div>
			<div class="agile_top_brands_grids">
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
											<a href="products.html"><img title=" " alt=" " src="<?php echo base_url().'templates/super_market/';?>images/4.png" /></a>
											<p>Sampann-toor-dal</p>
											<div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div>
											<h4>$35.99 <span>$55.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
													<input type="hidden" name="amount" value="35.99" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
											<a href="products.html"><img title=" " alt=" " src="<?php echo base_url().'templates/super_market/';?>images/5.png" /></a>
											<p>Parryss-sugar</p>
											<div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div>
											<h4>$30.99 <span>$45.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="basmati rise" />
													<input type="hidden" name="amount" value="30.99" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
				<div class="col-md-4 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="<?php echo base_url().'templates/super_market/';?>images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid_pos">
								<img src="<?php echo base_url().'templates/super_market/';?>images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="products.html"><img src="<?php echo base_url().'templates/super_market/';?>images/6.png" alt=" " class="img-responsive" /></a>
											<p>Saffola-gold</p>
											<div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div>
											<h4>$80.99 <span>$105.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Pepsi soft drink" />
													<input type="hidden" name="amount" value="80.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
				<div class="clearfix"> </div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
			<div class="agile-tp">
				<h5>This week</h5>
				<p class="w3l-ad">We've pulled together all our advertised offers into one place, so you won't miss out on a great deal.</p>
			</div>
			<div class="agile_top_brands_grids">
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
											<a href="products.html"><img title=" " alt=" " src="<?php echo base_url().'templates/super_market/';?>images/7.png" /></a>
											<p>Sona-masoori-rice</p>
											<div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div>
											<h4>$35.99 <span>$55.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
													<input type="hidden" name="amount" value="35.99" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
											<a href="products.html"><img title=" " alt=" " src="<?php echo base_url().'templates/super_market/';?>images/8.png" /></a>
											<p>Milky-mist-paneer</p>
											<div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div>
											<h4>$30.99 <span>$45.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="basmati rise" />
													<input type="hidden" name="amount" value="30.99" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
				<div class="col-md-4 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="<?php echo base_url().'templates/super_market/';?>images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid_pos">
								<img src="<?php echo base_url().'templates/super_market/';?>images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="products.html"><img src="<?php echo base_url().'templates/super_market/';?>images/9.png" alt=" " class="img-responsive" /></a>
											<p>Basmati-Rice</p>
											<div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div>
											<h4>$80.99 <span>$105.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Pepsi soft drink" />
													<input type="hidden" name="amount" value="80.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
				<div class="clearfix"> </div>
			</div>
			<div class="agile_top_brands_grids">
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
											<a href="products.html"><img title=" " alt=" " src="<?php echo base_url().'templates/super_market/';?>images/10.png" /></a>
											<p>Fortune-sunflower</p>
											<div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div>
											<h4>$20.99 <span>$35.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
													<input type="hidden" name="amount" value="20.99" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
											<a href="products.html"><img title=" " alt=" " src="<?php echo base_url().'templates/super_market/';?>images/12.png" /></a>
											<p>Nestle-a-slim</p>
											<div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div>
											<h4>$20.99 <span>$35.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="basmati rise" />
													<input type="hidden" name="amount" value="20.99" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
				<div class="col-md-4 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="<?php echo base_url().'templates/super_market/';?>images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="products.html"><img src="<?php echo base_url().'templates/super_market/';?>images/13.png" alt=" " class="img-responsive" /></a>
											<p>Bread-sandwich</p>
											<div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div>
											<h4>$40.99 <span>$65.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Pepsi soft drink" />
													<input type="hidden" name="amount" value="40.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
				<div class="clearfix"> </div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="extra" aria-labelledby="extra-tab">
			<div class="agile-tp">
				<h5>This week</h5>
				<p class="w3l-ad">We've pulled together all our advertised offers into one place, so you won't miss out on a great deal.</p>
			</div>
			<div class="agile_top_brands_grids">
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
											<a href="products.html"><img title=" " alt=" " src="<?php echo base_url().'templates/super_market/';?>images/7.png" /></a>
											<p>Sona-masoori-rice</p>
											<div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div>
											<h4>$35.99 <span>$55.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
													<input type="hidden" name="amount" value="35.99" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
											<a href="products.html"><img title=" " alt=" " src="<?php echo base_url().'templates/super_market/';?>images/8.png" /></a>
											<p>Milky-mist-paneer</p>
											<div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div>
											<h4>$30.99 <span>$45.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="basmati rise" />
													<input type="hidden" name="amount" value="30.99" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
				<div class="col-md-4 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="<?php echo base_url().'templates/super_market/';?>images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid_pos">
								<img src="<?php echo base_url().'templates/super_market/';?>images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="products.html"><img src="<?php echo base_url().'templates/super_market/';?>images/9.png" alt=" " class="img-responsive" /></a>
											<p>Basmati-Rice</p>
											<div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div>
											<h4>$80.99 <span>$105.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Pepsi soft drink" />
													<input type="hidden" name="amount" value="80.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
				<div class="clearfix"> </div>
			</div>
			<div class="agile_top_brands_grids">
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
											<a href="products.html"><img title=" " alt=" " src="<?php echo base_url().'templates/super_market/';?>images/10.png" /></a>
											<p>Fortune-sunflower</p>
											<div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div>
											<h4>$20.99 <span>$35.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
													<input type="hidden" name="amount" value="20.99" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
											<a href="products.html"><img title=" " alt=" " src="<?php echo base_url().'templates/super_market/';?>images/12.png" /></a>
											<p>Nestle-a-slim</p>
											<div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div>
											<h4>$20.99 <span>$35.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="basmati rise" />
													<input type="hidden" name="amount" value="20.99" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
				<div class="col-md-4 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="<?php echo base_url().'templates/super_market/';?>images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="products.html"><img src="<?php echo base_url().'templates/super_market/';?>images/13.png" alt=" " class="img-responsive" /></a>
											<p>Bread-sandwich</p>
											<div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div>
											<h4>$40.99 <span>$65.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Pepsi soft drink" />
													<input type="hidden" name="amount" value="40.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>