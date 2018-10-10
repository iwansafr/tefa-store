<?php defined('BASEPATH') OR exit('No direct script access allowed');

$slug = $this->uri->segment(2);
$data = $this->db->get_where('product', "slug = '{$slug}' AND publish = 1",1)->row_array();

if(!empty($data))
{
	$cat_ids = $data['cat_ids'];
	$cat_ids = array_filter(explode(',', $cat_ids));
	$this->db->where_in('id', $cat_ids);
	$this->db->select('id');
	$this->db->select('title');
	$this->db->select('slug');
	$categories = $this->db->get_where('product_cat')->result_array();

	if(!empty($data['tag_ids']))
	{
		$tag_ids = $data['tag_ids'];
		$tag_ids = array_filter(explode(',', $tag_ids));
		$this->db->where_in('id', $tag_ids);
		$this->db->select('id');
		$this->db->select('title');
		$tags = $this->db->get_where('product_tag')->result_array();
	}

	?>
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="<?php echo base_url() ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active"><?php echo $data['title'] ?></li>
			</ol>
		</div>
	</div>
	<div class="products">
		<div class="container">
			<div class="agileinfo_single">
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="<?php echo image_module('product',$data['id'].'/'.$data['image']) ?>" alt=" " class="img-responsive" style="object-fit: contain; width: 316px; height: 316px;">
					<?php
					if(!empty($data['images']))
					{
						echo '<div style="text-align: center; padding: 1px;">';
						$data['images'] = json_decode($data['images'], 1);
						$i = 1;
						foreach ($data['images'] as $imkey => $imvalue)
						{
							?>
							<a href="#img_image_<?php echo $i?>" >
								<img src="<?php echo image_module('product', 'gallery'.'/'.$data['id'].'/'.$imvalue) ?>" class="" style="object-fit: cover;width: 50px;height: 50px;" data-toggle="modal" data-target="#img_image_<?php echo $i?>">
							</a>
							<div class="modal fade" id="img_image_<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="img_image_<?php echo $i?>">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							        <h4 class="modal-title" id="img_title_image_<?php echo $i?>">image <?php echo $i; ?></h4>
							      </div>
							      <div class="modal-body" style="text-align: center;">
							        <img src="<?php echo image_module('product', 'gallery'.'/'.$data['id'].'/'.$imvalue) ?>" class="img-thumbnail img-responsive">
							      </div>
							      <div class="modal-footer">
							      </div>
							    </div>
							  </div>
							</div>
							<?php
							$i++;
						}
						echo '</div>';
					}?>
				</div>
				<div class="col-md-8 agileinfo_single_right">
				<h2><?php echo $data['title'] ?></h2>
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="w3agile_description">
						<h4>Description :</h4>
						<p><?php echo $data['description'] ?></p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4 class="m-sing"><?php echo 'Rp. '.number_format($data['price']-($data['price']*@intval($data['discount']))/100,'2',',','.') ?> <span><?php echo 'Rp. '.number_format($data['price'],'2',',','.') ?></span></h4>
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
							<form action="#" method="post">
								<fieldset>
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="add" value="1">
									<input type="hidden" name="business" value=" ">
									<input type="hidden" name="item_name" value="pulao basmati rice">
									<input type="hidden" name="amount" value="21.00">
									<input type="hidden" name="discount_amount" value="1.00">
									<input type="hidden" name="currency_code" value="USD">
									<input type="hidden" name="return" value=" ">
									<input type="hidden" name="cancel_return" value=" ">
									<input type="submit" name="submit" value="Add to cart" class="button">
								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<?php
}else{
	echo msg('please check your url, make sure that your url is correct', 'warning');
}