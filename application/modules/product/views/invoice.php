<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($data['u']) && !empty($data['t']))
{
	if(decrypt($data['u'],$data['t']))
	{
		echo 'sukses';
	}else{
		redirect(base_url());
	}
}else{
	redirect(base_url());
}