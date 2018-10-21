<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($data['u']) && !empty($data['t']))
{
	if(decrypt($data['u'],$data['t']))
	{
		$this->load->view('invoice_template',$data);
	}else{
		redirect(base_url());
	}
}else{
	redirect(base_url());
}