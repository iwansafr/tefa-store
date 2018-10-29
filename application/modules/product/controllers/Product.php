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

  public function register()
  {
    $status = 0;
    $data['data'] = $this->input->post();
    $data['data']['agree'] = !empty($data['data']['agree']) ? 'checked' : '';
    if(!empty($data['data']['email']))
    {
      $email_exist = $this->db->query('SELECT id FROM user WHERE email = ?', $data['data']['email'])->row_array();
      if(!empty($email_exist))
      {
        $data['data']['message']['email'] = 'email is exist';
      }else{
        $status  = 1;
      }
    }
    if(@$data['data']['password']!=@$data['data']['cpassword'])
    {
      $data['data']['message']['password'] = 'password didnt match';
    }
    $this->load->view('home/index', $data);
  }

  public function total_cart()
  {
    $current_data = $this->session->userdata('product_cart');
    $total = 0;
    if(!empty($current_data))
    {
      foreach ($current_data as $key => $value)
      {
        $total += $value['price']*$value['qty'];
      }
    }
    echo $total;
  }
  public function confirm_payment()
  {
    $data['data'] = $this->input->get();
    if(!empty($data['data']['u']) && !empty($data['data']['t']))
    {
      if(decrypt($data['data']['u'], $data['data']['t']))
      {
        $q = $this->db->query('SELECT id FROM product_order WHERE username = ? LIMIT 1', $data['data']['u'])->row_array();
        $data['data']['order_id'] = $q['id'];
        $this->load->view('home/index',$data);
      }else{
        redirect(base_url());
      }
    }else{
      redirect(base_url());
    }
  }
  public function invoice()
  {
    $data['data'] = $this->input->get();
    $this->load->view('invoice', $data);
  }
  public function cart_checkout()
  {
    $this->db->select('id,title');
    $data['expedision'] = $this->db->get_where('expedision')->result_array();
    $this->load->view('home/index',$data);
  }
  public function checkout_detail()
  {
    $this->load->view('home/index');
  }
  public function add_cart()
  {
    $data                = array('msg'=>'failed add product to cart','status'=>0);
    $data['add_qty']     = 0;
    $data['add_product'] = 0;
    if(!empty($_POST))
    {
      $post = array();
      foreach ($_POST['data'] as $key => $value)
      {
        $post[$value['name']] = $value['value'];
      }
      $id = @intval($post['id']);
      if(!empty($id))
      {
        $p = $this->db->query('SELECT id,expedision_ids,title,image,price,stock,slug,discount FROM product WHERE id = ? LIMIT 1', $id)->row_array();
        $current_data = $this->session->userdata('product_cart');
        if(array_key_exists($id, (array)$current_data))
        {
          $current_data[$id]['qty'] += 1;
          $data['add_qty'] = 1;
        }else{
          $current_data[$id]          = $p;
          $current_data[$id]['qty']   = 1;
          $current_data[$id]['image'] = image_module('product',$p['id'].'/'.$p['image']);
          $data['add_product']        = 1;
        }
        $data['p_id']             = $id;
        $this->session->set_userdata('product_cart',$current_data);
        $data['data'] = $current_data;
        $data['msg'] = 'product added to cart successfully';
        $data['status'] = 1;
      }
    }
    $data = json_encode($data);
    echo $data;
  }

  public function ch_qty()
  {
    $data = array('status'=>0,'msg'=>'failed change qty');
    if(!empty($_POST))
    {
      $id = @intval($_POST['id']);
      if(!empty($id))
      {
        $current_data = $this->session->userdata('product_cart');
        if(!empty($current_data))
        {
          $qty = @intval($_POST['qty']);
          $current_data[$id]['qty'] = $qty;
          $this->session->set_userdata('product_cart',$current_data);
          $data = array('status'=>1);
        }
      }
    }
    echo json_encode($data);
  }

  public function del_cart()
  {
    $data = array('status'=>0,'msg'=>'failed change qty');
    if(!empty($_POST))
    {
      $id = @intval($_POST['id']);
      if(!empty($id))
      {
        $current_data = $this->session->userdata('product_cart');
        unset($current_data[$id]);
        $this->session->set_userdata('product_cart',$current_data);
        $data = array('status'=>1);
      }
    }
    $data = json_encode($data);
    echo $data;
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
    $this->product_model->set_meta($id,'Category', 'product_cat');
    $this->load->view('home/index');
  }
  public function tag($id = 0, $title = '')
  {
    $this->product_model->set_meta($id,'Tag', 'product_tag');
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
  public function product_cat()
  {
    $this->load->view('admin/index');
  }
  public function search()
  {
    $this->load->view('home/index');
  }
}