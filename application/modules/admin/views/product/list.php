<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new ecrud();
$table = 'product';
$form->setTable($table);
$form->init('roll');

$form->search();

$form->setField(array('id','title'));

$form->addInput('id','plaintext');
$form->addInput('title','link');
$form->setLink('title',base_url('admin/'.$table.'_edit'), 'id');
$form->addInput('image','thumbnail');
$form->setImage('image',$table);

$form->addInput('created','plaintext');

$form->addInput('publish','checkbox');

$form->setDelete(true);

?>
<div class="box">
	<div class="box-body table-responsive">
		<?php
		$form->form();
		?>
	</div>
</div>