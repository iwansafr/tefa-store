<?php
_func('product');
$data            = $this->data_model->get_one_data('product_order',"WHERE username = '$u'");
$active_template = $this->esg->get_config('templates');
$site_value      = $this->esg->get_config($active_template['templates'].'_config');
$profile = $this->esg->get_config('profile');

$buyer   = json_decode($data['buyer_detail'],1);
$product = json_decode($data['order_detail'],1);
?>
<html lang="en"><head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>esftgreat - Invoice #<?php echo !empty($data['id']) ? $data['id'] : time(); ?></title>
	<link href="<?php echo base_url().'templates/super_market/invoice/';?>all.min.css" rel="stylesheet">
	<link href="<?php echo base_url().'templates/super_market/invoice/';?>invoice.css" rel="stylesheet">
	<link href="<?php echo base_url().'templates/admin/css/';?>bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid invoice-container">
			<div class="row invoice-header">
				<div class="invoice-col">
					<!-- <p><img src="<?php echo image_module('config',$active_template['templates'].'_config/'.$site_value['logo_image']) ?>" height="100" title="esoftgreat"></p> -->
					<p><img src="<?php echo image_module('config',$active_template['templates'].'_config/'.$site_value['logo_image']) ?>"  title="esoftgreat" style="object-fit: contain; width: 50%"></p>
					<h3>Invoice #<?php echo !empty($data['id']) ? $data['id'] : time(); ?></h3>
				</div>
				<?php
				$style = ($data['status'] == 2) ? 'color : green;' : 'color: red';
				$color = ($data['status'] == 2) ? 'green' : 'red';
				$img   = ($data['status'] == 2) ? 'paid.png' : 'unpaid.png';
				?>
				<div class="invoice-col " style="margin-top: 2%; padding-left: 140px;">
					<!-- <div class="invoice-status" style="border : <?php echo $color ?> solid 1px; text-align: center;">
						<span style="<?php echo $style ?>"><?php echo $data['status'] ?></span>
					</div> -->
					<!-- <img src="<?php echo base_url().'templates/'.$active_template['templates'].'/invoice/'.$img ?>" style="margin-lef: 100px;transform :rotate(30deg); height: 50px; height: 60px; width: 230px;"> -->
					<img src="<?php echo base_url().'templates/'.$active_template['templates'].'/invoice/'.$img ?>" style="margin-lef: 100px;transform :rotate(30deg);object-fit: contain;width: 100%;margin-top: 15%;">
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="invoice-col right">
					<strong>Pay To</strong>
					<address class="small-text">
						<?php echo @$profile['an_rek'] ?><br>
						Alamat : <br>
						<?php echo @$profile['address'] ?> <br>
						Telp : <?php echo @$profile['phone'] ?>
					</address>
				</div>
				<div class="invoice-col">
					<strong>Invoiced To</strong>
					<address class="small-text">
						<?php echo $buyer['nama'] ?>
					</address>
				</div>
			</div>
			<div class="row">
				<div class="invoice-col right">
					<strong>Payment Method</strong><br>
					<span class="small-text">
						<?php echo 'Bank Transfer' ?>
					</span>
					<br><br>
				</div>
				<div class="invoice-col">
					<strong>Invoice Date</strong><br>
					<span class="small-text">
						<?php echo date('d/m/Y') ?><br><br>
					</span>
				</div>
			</div>
			<br>
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Notes</strong></h3>
			</div>
			<div class="panel-body">
				<?php
				$i = 1;
				foreach ($product as $key => $value)
				{
					echo '#.'.$i.' '.$value['title'];
					echo '<br>';
					$i++;
				}
				?>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Invoice Items</strong></h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-condensed">
						<thead>
							<tr>
								<td><strong>Description</strong></td>
								<td width="25%" class=""><strong>Amount</strong></td>
							</tr>
						</thead>
						<tbody>
							<?php
							$items = $product;

							$sub_total = 0;

							foreach ($items as $key => $value)
							{
								?>
								<tr>
									<td>
										<?php echo $value['title'] ?>
									</td>
									<td class="">
										<?php echo 'Rp. '.product_price($value['price'],$value['discount']); ?>
									</td>
								</tr>
								<?php
								$sub_total += $value['price'] - ($value['price']*$value['discount']/100);
							}
							if(!empty($data['ppn']))
							{
								$ppn = ($sub_total*10)/100;
								$total = $sub_total+$ppn;
							}else{
								$total = $sub_total;
							}
							?>

							<tr>
								<td class="total-row text-right"><strong>Sub Total</strong></td>
								<td class="total-row "><?php echo 'Rp. '.number_format($sub_total, 2, ',', '.'); ?></td>
							</tr>
							<?php
							if(!empty($ppn))
							{
								?>
								<tr>
									<td class="total-row text-right"><strong>10.00% PPN</strong></td>
									<td class="total-row "><?php echo 'Rp. '.number_format($ppn, 2, ',', '.'); ?></td>
								</tr>
								<?php
							}?>
							<tr>
								<td class="total-row text-right"><strong>Credit</strong></td>
								<td class="total-row ">Rp. 0,00 </td>
							</tr>
							<tr>
								<td class="total-row text-right"><strong>Total</strong></td>
								<td class="total-row "><?php echo 'Rp. '.number_format($total, 2, ',', '.'); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<p>* Transfer To</p>
		<div class="transactions-container small-text">
			<div class="table-responsive">
				<table class="table table-condensed">
					<thead>
						<tr>
							<td class=""><strong>Nominal</strong></td>
							<td class=""><strong>Bank</strong></td>
							<td class=""><strong>A/N</strong></td>
							<td class=""><strong>No Rekening</strong></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class=""><?php echo 'Rp. '.number_format($total, 2, ',', '.'); ?></td>
							<td class=""><?php echo @$profile['bank'] ?></td>
							<td class=""><?php echo @$profile['an_rek'] ?></td>
							<td class=""><?php echo @$profile['no_rek'] ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<?php
		if($data['status'] > 1)
		{
			?>
			<p>* Indicates a taxed item.</p>
			<div class="transactions-container small-text">
				<div class="table-responsive">
					<table class="table table-condensed">
						<thead>
							<tr>
								<td class=""><strong>Transaction Date</strong></td>
								<td class=""><strong>Gateway</strong></td>
								<td class=""><strong>Transaction ID</strong></td>
								<td class=""><strong>Amount</strong></td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class=""><?php echo date('d/m/Y') ?></td>
								<td class="">Transfer ke Bank <?php echo @$profile['bank'] ?></td>
								<td class=""><?php echo @$profile['bank'] ?>-<?php echo substr(time(), 0,4).'-'.substr(time(), 5,8) ?></td>
								<td class=""><?php echo 'Rp. '.number_format($total, 2, ',', '.'); ?></td>
							</tr>
							<tr>
								<td class="text-right" colspan="3"><strong>Balance</strong></td>
								<td class="">Rp. 0,00 </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<?php
		}
		?>
		<div class="pull-right btn-group btn-group-sm hidden-print">
			<a href="javascript:window.print()" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
			<!-- <a href="#" class="btn btn-default" data-toggle="modal" data-target="#payment"><i class="fa fa-money"></i> Cara Konfirmasi</a> -->
			<!-- <a href="dl.php?type=i&amp;id=871068" class="btn btn-default"><i class="fa fa-download"></i> Download</a> -->
		</div>
	</div>
	<!-- <p class=" hidden-print"><a href="clientarea.php">« Back to Client Area</a></p> -->
	<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="payment">
	  <div class="modal-dialog" role="document" style="width: 90%;">
	    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="payment"><?php echo 'payment';?></h4>
		      </div>
		      <div class="modal-body" style="text-align: center;">
		      	<div class="panel">
		      		<div class="panel-body" id="payment_body">
		      			upload bukti pembayaran sekarang <br><a href="<?php echo base_url('confirm_payment').'?u='.$data['username'].'&t='.encrypt($data['username']);?>" class="btn btn-default">klik di sini</a>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		      	<h4>
		      		<button class="btn btn-default" class="close" type="button" data-dismiss="modal">Close</button>
		      	</h4>
		      </div>
	    </div>
	  </div>
	</div>
	<script src="<?php echo base_url().'templates/admin/'; ?>js/jquery.js"></script>
	<script src="<?php echo base_url().'templates/admin/'; ?>js/bootstrap.min.js"></script>
</body>
</html>