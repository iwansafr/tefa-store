<?php

$this->ecrud->init('roll');

$this->ecrud->setTable('comment');

$this->ecrud->join('content','ON(content.id=comment.module_id)', 'comment.username,comment.content, comment.module_id,comment.id,content.title');

$this->ecrud->search();
$this->ecrud->setField(array('username','content'));

$this->ecrud->addInput('username','plaintext');
// $this->ecrud->addInput('module','plaintext');
// $this->ecrud->addInput('module_id','link');
$this->ecrud->addInput('content','plaintext');

$this->ecrud->addInput('title','link');
$this->ecrud->setLink('title',base_url('content'), 'module_id');
$this->ecrud->setAttribute('title','target="_blank"');
$this->ecrud->setClearGet('title');

$this->ecrud->setEdit(true);
$this->ecrud->setEditLink('comment_edit/');
$this->ecrud->setDelete(true);

$this->ecrud->form();

