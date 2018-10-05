<?php defined('BASEPATH') OR exit('No direct script access allowed');

_func('content');
$data['main_data'] = !empty($main_data) ? $main_data : array();
$this->load->view('home/'.$active_template.'/home', $data);