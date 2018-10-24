<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new ecrud();

$form->init('edit');
$form->setTable('payment');

$form->addInput('image','upload');
$form->setLabel('image','upload bukti pembayaran');
$form->addInput('order_id', 'hidden');
$form->setValue('order_id', $data['order_id']);
?>
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1">
			<li><a href="<?php echo base_url() ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li class="active">Confirm Payment</li>
		</ol>
	</div>
</div>
<div class="col-md-12">
	<div class="col-md-2">

	</div>
	<div class="col-md-8">
		<?php $form->form(); ?>
	</div>
	<div class="col-md-2">

	</div>
</div>

