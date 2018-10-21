<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1">
			<li><a href="<?php echo base_url() ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li class="active">Checkout Page</li>
		</ol>
	</div>
</div>
<?php defined('BASEPATH') OR exit('No direct script access allowed');
$cart_product = $this->session->userdata('product_cart');
if(!empty($cart_product))
{
	$count = count($cart_product);
	?>
	<div class="checkout">
		<div class="container">
			<h2>Your shopping cart contains: <span><?php echo $count ?> Products</span></h2>
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Product Name</th>
							<th>Price</th>
						</tr>
					</thead>
					<?php
					$i = 1;
					foreach ($cart_product as $key => $value)
					{
						?>
						<tr class="rem<?php echo $i;?>">
							<td class="invert"><?php echo $i;?></td>
							<td class="invert-image"><a href="<?php echo product_link($value['slug']) ?>"><img src="<?php echo $value['image']; ?>" alt=" " class="img-responsive" /></a></td>
							<td class="invert">
								 <div class="quantity">
									<div class="quantity-select">
										<!-- <div class="entry value-minus">&nbsp;</div> -->
										<div class="entry value"><span>X <?php echo $value['qty'] ?></span></div>
										<!-- <div class="entry value-plus active">&nbsp;</div> -->
									</div>
								</div>
							</td>
							<td class="invert"><?php echo $value['title'] ?></td>

							<td class="invert">Rp <?php echo product_price($value['price'], $value['discount']) ?></td>
						</tr>
						<?php
						$i++;
					}
					?>
				</table>
			</div>
			<div class="checkout-left">
				<div class="checkout-left-basket">
					<h4>Continue to basket</h4>
					<ul>
						<?php
						$sub_total = 0;
						foreach ($cart_product as $key => $value)
						{
							$s_price = $value['price'] - (($value['price']*$value['discount'])/100);
							$s_price = $s_price*$value['qty'];
							$sub_total += $s_price;
							echo '<li>'.$value['title'].' <i>x</i> '.$value['qty'].' <span>Rp. '.product_price($s_price,0).' </span></li>';
						}
						$unic_code = random_int(100,999);
						$sub_total += $unic_code;
						?>
						<li>Unic Code <i>-</i> <span>Rp. <?php echo product_price($unic_code,0); ?></span></li>
						<li>Total <i>-</i> <span>Rp. <?php echo product_price($sub_total,0); ?></span></li>
					</ul>
					<hr>
					<form action="<?php echo base_url('checkout/detail') ?>" method="post">
						<div class="panel panel-default">
							<div class="panel panel-heading">
								<h5>Data Diri</h5>
							</div>
							<div class="panel panel-body">
								<div class="form-group">
									<input type="text" name="nama" class="form-control" placeholder="nama" required>
								</div>
								<div class="form-group">
									<input type="number" name="hp" class="form-control" placeholder="no hp" required>
								</div>
								<div class="form-group">
									<input type="text" name="prov" class="form-control" placeholder="Provinsi" required>
								</div>
								<div class="form-group">
									<input type="text" name="kab" class="form-control" placeholder="Kabupaten" required>
								</div>
								<div class="form-group">
									<input type="text" name="kec" class="form-control" placeholder="Kecamatan" required>
								</div>
								<div class="form-group">
									<input type="number" name="pos" class="form-control" placeholder="kode pos" required>
								</div>
								<div class="form-group">
									<textarea class="form-control" name="alamat" placeholder="alamat lengkap" required></textarea>
								</div>
								<div class="form-group">
									<select class="form-control" name="expedision" required>
										<option value="">Pilih Expedisi</option>
										<?php 
										foreach($expedision as $key => $value) 
										{
											echo '<option value="'.$value['id'].'">'.$value['title'].'</option>';
										} 
										?>
									</select>
								</div>
							</div>
							<div class="panel panel-footer">
								<input type="submit" class="btn btn-primary" value="submit">
							</div>
						</div>
					</form>
				</div>
				<div class="checkout-right-basket">
					<a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<?php
}else{
	?>
	<div class="checkout">
		<div class="container">
			<?php echo msg('your cart is empty', 'warning');?>
		</div>
	</div>
	<?php
}