<?php defined('BASEPATH') OR exit('No direct script access allowed');
$type           = @($_GET['type']);
$slug           = $this->uri->segment(1);
$product_config = $this->esg->get_config('product_config');
$limit          = !empty($product_config['limit_list']) ? $product_config['limit_list'] : 12;
$page           = @intval($_GET['page']);
$psort          = @$_GET['sort'];
$x_link         = !empty($psort) ? '?sort='.$psort : '';

if($slug != 'product')
{
	$slug       = $this->uri->segment(2);
	$cat_id     = $this->data_model->get_one('product_cat', 'id', "WHERE slug = '{$slug}'");
	$cat_title  = $this->data_model->get_one('product_cat', 'title', "WHERE slug = '{$slug}'");
	$title      = @$slug;

	if(!empty($psort))
	{
		switch ($psort)
		{
			case 'ph2l':
				$this->db->order_by('price','DESC');
				break;
			case 'pl2h':
				$this->db->order_by('price','ASC');
				break;
			case 'newest':
				$this->db->order_by('id','DESC');
				break;
			default:
				$this->db->order_by('id','DESC');
				break;
		}
	}
	$data       = $this->db->get_where('product', "cat_ids LIKE  '%,{$cat_id},%' AND publish = 1",$limit,$page)->result_array();
	$total_rows = $this->db->get_where('product',"cat_ids LIKE  '%,{$cat_id},%' AND publish = 1")->num_rows();
}else{
	$id           = @intval($this->uri->segment(3));
	$title        = @($this->uri->segment(4));
}
if(!empty($id))
{
	$url_get = base_url('product/category/'.$id.'/'.$title.'.html');
	$header_title = 'Category of '.$title;
	$table = 'product';
}else if(!empty($cat_title)){
	// $url_get = base_url('category/'.$slug.'.html?type=grid');
	$url_get = base_url('cat/'.$slug.'.html'.$x_link);
	$header_title = 'Category of '.$cat_title;
	$table = 'product';
}else{
	$url_get = base_url('product/category/');
	$header_title = 'All Category';
	$table = 'product_cat';
}

if(!empty($id))
{
	$this->db->like('cat_ids', $id, 'both');
}
if(empty($data) && empty($cat_title))
{
	$data = $this->db->get_where($table,'publish = 1',$limit,$page)->result_array();
}
if(!empty($id))
{
	$this->db->like('cat_ids', $id, 'both');
}
if(empty($total_rows) && empty($cat_title))
{
	$total_rows = $this->db->get_where($table,'publish = 1')->num_rows();
}

$config = pagination($total_rows,$limit,$url_get);
$this->pagination->initialize($config);
$page_nation = $this->pagination->create_links();

$view_data                    = array();
$view_data['header_title']    = $header_title;
$view_data['data']            = $data;
$view_data['page_nation']     = $page_nation;
$view_data['config_template'] = $config_template;
if($type=='grid')
{
	$header_title = $cat_title;
	include 'grid.html.php';
}else{
	if(file_exists(APPPATH.'modules/home/views/'.$active_template.'/'.'product/list.html.php'))
	{
		$this->load->view('home/'.$active_template.'/'.'product/list.html.php', $view_data);
	}else{
		include 'list.html.php';
	}
}