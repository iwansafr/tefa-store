<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{
	public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('html');
    $this->load->library('session');
    $this->load->model('admin/data_model');
    $this->load->model('admin/config_model');
    // $this->load->model('content/content');
    $this->load->model('product_model');
    $this->load->library('ECRUD/ecrud');
    $this->load->library('pagination');
    $this->load->library('esg');

  }

  public function api()
  {
    $array = array(1,2,3,4,5);
    echo json_encode($array);
  }

  public function index()
	{
		$this->load->view('home/index');
	}
  public function detail($id)
  {
    $this->product_model->set_meta($id,'detail', 'product');
    $this->load->view('home/index');
  }

  public function cat_list($par_id = 0, $page = 0, $keyword = NULL)
  {
    if(!empty($_POST['del_cat']))
    {
      $this->product_model->del_cat($_POST['del_user']);
      $data['msg']   = 'data berhasil dihapus';
      $data['alert'] = 'success';
    }

    $data = $this->product_model->get_all_category($par_id, $page, $keyword);
    $this->load->view('admin/index',$data);
  }
  public function category($id = 0, $title = '')
  {
    $this->product_model->set_meta($id,'Category', 'content_cat');
    $this->load->view('home/index');
  }
  public function tag($id = 0, $title = '')
  {
    $this->product_model->set_meta($id,'Tag', 'content_tag');
    $this->load->view('home/index');
  }
  public function cat_edit($id = 0)
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->load->view('admin/index');
    // echo 'iwan';
  }
  public function content_cat()
  {
    $this->load->view('admin/index');
  }
  public function search()
  {
    $this->load->view('home/index');
  }
}