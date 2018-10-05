<?php
$type = @($_GET['type']);
$slug = $this->uri->segment(1);
$slug = str_replace('-', ' ', $slug);
if($slug != 'content')
{
	$slug       = $this->uri->segment(2);
	$slug       = str_replace('-', ' ', $slug);
	$tag_id     = $this->data_model->get_one('content_tag', 'id', "WHERE title = '{$slug}'");
	$tag_title  = $this->data_model->get_one('content_tag', 'title', "WHERE title = '{$slug}'");
	$title      = @$slug;
	$page       = @intval($_GET['page']);
	$limit      = 6;
	$data       = $this->db->get_where('content', "tag_ids LIKE  '%,{$tag_id},%' AND publish = 1",$limit)->result_array();
	$total_rows = $this->db->get_where('content',"tag_ids LIKE  '%,{$tag_id},%' AND publish = 1")->num_rows();
}else{
	$id           = @intval($this->uri->segment(3));
	$title        = @($this->uri->segment(4));
	$page         = @intval($_GET['page']);
	$limit        = 6;
}
if(!empty($id) && is_numeric($id))
{
	$url_get = base_url('content/tag/'.$id.'/'.url_title($title).'.html');
	$header_title = 'tag of '.$title;
	$table = 'content';
}else if(!empty($tag_title)){
	$url_get = base_url('tag/'.url_title($slug).'.html');
	$header_title = 'tag of '.$tag_title;
	$table = 'content';
}else{
	$url_get = base_url('tag/'.url_title($slug).'.html');
	$header_title = 'All tag';
	$table = 'content_tag';
}
if(!empty($id))
{
	$this->db->like('tag_ids', $id, 'both');
}
if(empty($data) && empty($tag_title))
{
	$data = $this->db->get_where($table,'id > 0',$limit,$page)->result_array();
}

if(!empty($id))
{
	$this->db->like('tag_ids', $id, 'both');
}
if(empty($total_rows) && empty($tag_title))
{
	$total_rows = $this->db->get_where($table,'id > 0')->num_rows();
}

$config = pagination($total_rows,$limit,$url_get);
$this->pagination->initialize($config);
$page_nation = $this->pagination->create_links();

if($type=='grid')
{
	$header_title = $tag_title;
	include 'grid.html.php';
}else{
	include 'list.html.php';
}