<?php
$keyword = @$_GET['keyword'];
$psort   = @$_GET['sort'];
if(!empty($keyword))
{
	$page         = @intval($_GET['page']);
	$limit        = 6;
	$url_get      = base_url('search/?keyword='.$keyword);
	$header_title = 'search for '.$keyword;

	if(!empty($psort))
	{
		switch ($psort)
		{
			case 'ph2l':
				$this->data_model->orderBy('price','DESC');
				break;
			case 'pl2h':
				$this->data_model->orderBy('price','ASC');
				break;
			case 'newest':
				$this->data_model->orderBy('id','DESC');
				break;
			default:
				$this->data_model->orderBy('id','DESC');
				break;
		}
	}
	$this->data_model->setView('search');
	$this->data_model->setWhere('publish = 1');

	$data        = $this->data_model->get_data_list('product', array('id','title','description','created'), 0, $limit);
	$page_nation = $data['pagination'];
	$data        = $data['data'];
	$table       = 'product';
	$title = 'Result Of '.$keyword;
	include 'list.html.php';
}else{
	echo msg('ups, it seems you are search nothing','warning');
}
