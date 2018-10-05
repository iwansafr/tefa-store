<?php defined('BASEPATH') OR exit('No direct script access allowed');
$logo_value = $this->esg->get_config('logo');

if(!empty($config_active_template))
{
	$logo_value['title']  = !empty($config_active_template['logo_title']) ? $config_active_template['logo_title'] : $logo_value['title'];
	$logo_value['image']  = !empty($config_active_template['logo_image']) ? $config_active_template['logo_image'] : $logo_value['image'];
	$logo_value['width']  = !empty($config_active_template['logo_width']) ? $config_active_template['logo_width'] : $logo_value['width'];
	$logo_value['height'] = !empty($config_active_template['logo_height']) ? $config_active_template['logo_height'] : $logo_value['height'];
}

if(!empty($logo_value))
{
	$data['logo_value'] = $logo_value;
	$this->load->view('home/'.$active_template.'/logo', $data);
}