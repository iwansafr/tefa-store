<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($_POST) && !empty($this->session->userdata('product_cart')))
{

	$username             = $this->product_model->generate_user();
	$buyer_detail         = $_POST;
	$order_detail         = $this->session->userdata('product_cart');
	$order_detail         = json_encode($order_detail);
	$buyer_detail         = json_encode($buyer_detail);
	$data['buyer_detail'] = $buyer_detail;
	$data['order_detail'] = $order_detail;
	$data['status']       = 1;
	$data['username']     = $username;
	$data['password']     = substr(encrypt(time()), 55,5);
	if($this->data_model->set_data('product_order',0,$data))
	{
		redirect(base_url('invoice').'?t='.encrypt($username).'&u='.$username);
	}
}