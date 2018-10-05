<?php

$id = @intval($this->uri->segment(3));

$this->ecrud->init('edit');

$this->ecrud->setTable('comment');

$this->ecrud->setId($id);

$this->ecrud->addInput('username','text');
$this->ecrud->addInput('content','textarea');

$this->ecrud->form();

back_form('btn btn-primary');