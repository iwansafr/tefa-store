<?php

$this->ecrud->init('param');
$this->ecrud->setParamName('content_config');
$this->ecrud->setTable('config');

$this->ecrud->addInput('author_detail', 'dropdown');
$this->ecrud->setLabel('author_detail','Show author or not');
$this->ecrud->setOptions('author_detail',array('Hide','Show'));
$this->ecrud->addInput('tag_detail', 'dropdown');
$this->ecrud->setLabel('tag_detail', 'Show tag ?');
$this->ecrud->setOptions('tag_detail', array('Hide','Show'));
$this->ecrud->addInput('comment_detail', 'dropdown');
$this->ecrud->setLabel('comment_detail', 'Show comment ?');
$this->ecrud->setOptions('comment_detail', array('Hide','Show'));
$this->ecrud->addInput('created_detail', 'dropdown');
$this->ecrud->setLabel('created_detail', 'Show created or not');
$this->ecrud->setOptions('created_detail',array('Hide','Show'));

$this->ecrud->startCollapse('author_detail','detail config');
$this->ecrud->endCollapse('created_detail');

$this->ecrud->addInput('author_list', 'dropdown');
$this->ecrud->setLabel('author_list','Show author or not');
$this->ecrud->setOptions('author_list',array('Hide','Show'));
$this->ecrud->addInput('tag_list', 'dropdown');
$this->ecrud->setLabel('tag_list', 'Show tag ?');
$this->ecrud->setOptions('tag_list', array('Hide','Show'));

$this->ecrud->addInput('limit_list','text');
$this->ecrud->setType('limit_list','number');

$this->ecrud->addInput('created_list', 'dropdown');
$this->ecrud->setLabel('created_list', 'Show created or not');
$this->ecrud->setOptions('created_list',array('Hide','Show'));

$this->ecrud->startCollapse('author_list','list config');
$this->ecrud->endCollapse('created_list');

$this->ecrud->form();