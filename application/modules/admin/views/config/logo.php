<?php

$form = new Ecrud();
$form->init('param');
$form->setTable('config');
// $form->setParam($config);
$form->setParamName('logo');
$form->addInput('title', 'text');
$form->addInput('image', 'upload');
// $form->setAccept('image', 'image/jpeg,image/png');
$form->addInput('width', 'text');
$form->addInput('height', 'text');
$form->form();