<div class="image">
	<a href="#">
		<button class="w3view-cart" data-toggle="modal" data-target="#cart"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
	</a>
</div>
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="cart">
  <div class="modal-dialog" role="document" style="width: 90%;">
    <div class="modal-content">
    	<form action="" method="post">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="cart"><?php echo 'cart';?></h4>
	      </div>
	      <div class="modal-body" style="text-align: center;">
	      	<div class="panel">
	      		<div class="panel-body" id="cart_body">
	      			<?php
	      			$cart_product = $this->session->userdata('product_cart');
	      			$total = 0;
	      			if(!empty($cart_product))
	      			{
		      			foreach ($cart_product as $key => $value)
		      			{
		      				$total += $value['price']*$value['qty'];
		      				?>
		      				<div id="product_cart_<?php echo $value['id']?>">
										<div class="col-xs-12">
											<div class="col-xs-4">
												<img src="<?php echo $value['image'] ?>" width="50">
											</div>
											<div class="col-xs-8">
												<div class="col-md-8">
													<?php echo $value['title'] ?>
												</div>
												<div class="col-md-2">
													<input type="number" id="qty_p_<?php echo $value['id']?>" name="cart[<?php echo $value['id'] ?>][qty]" min="1" max="<?php echo $value['stock'] ?>" class="form-control" value="<?php echo $value['qty'] ?>">
													<input type="hidden" name="cart[<?php echo $value['id'] ?>][p_id]" value="<?php echo $value['id'] ?>">
												</div>
												<div class="col-md-2">
													<?php echo 'Rp. '.number_format($value['price'],0,',','.'); ?>
													<button class="btn btn-danger btn-xs del_cart" id="<?php echo $value['id'] ?>">x</button>
												</div>
											</div>
										</div>
										<div class="clearfix"></div>
										<hr>
		      				</div>
		      				<?php
		      			}
	      			}
	      			?>
	      		</div>
	      	</div>
	      </div>
	      <div class="modal-footer">
	      	<h4>
	      		<div id="total_cart">total : <?php echo 'Rp. '.number_format($total,0,',','.') ?></div>
	      		<?php if($total>0){
		      		echo '<button class="btn btn-warning" id="btn_checkout" >checkout</button>';
	      		} ?>
	      	</h4>
	      </div>
	    </form>
    </div>
  </div>
</div>