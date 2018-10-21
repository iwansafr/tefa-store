<?php defined('BASEPATH') OR exit('No direct script access allowed');

class product_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
    $this->load->library('esg');
	}

  public function generate_user($username = '')
  {
    $username   = empty($username) ? substr(encrypt(time()), 55,5) : $username;
    $user_exist = $this->data_model->get_one('product_order','username', "WHERE username = '$username'");
    if(!empty($user_exist))    
    {
      call_user_func(array('product_model', $user_exist));
    }else{
      return $username;
    }
  }

  public function set_meta($id = '', $title = '', $table = '')
  {
    $site_value             = $this->esg->get_config('site');
    $active_template        = $this->esg->get_config('templates');
    $active_template        = $active_template['templates'];
    $config_active_template = $this->esg->get_config($active_template.'_config');
    if(!empty($config_active_template))
    {
      $site_value['title']       = !empty($config_active_template['site_title']) ? $config_active_template['site_title'] : $site_value['title'];
      $site_value['link']        = !empty($config_active_template['site_link']) ? $config_active_template['site_link'] : $site_value['link'];
      $site_value['image']       = !empty($config_active_template['site_image']) ? $config_active_template['site_image'] : $site_value['image'];
      $site_value['keyword']     = !empty($config_active_template['site_keyword']) ? $config_active_template['site_keyword'] : $site_value['keyword'];
      $site_value['description'] = !empty($config_active_template['site_description']) ? $config_active_template['site_description'] : $site_value['description'];
    }
    $meta = array(
      'author'      => 'iwan@esoftgreat.com',
      'title'       => 'All '.$title.' '.$site_value['title'],
      'developer'   => 'esoftgreat',
      'image'       => $site_value['image'],
      'keyword'     => $site_value['keyword'],
      'description' => $site_value['description']
    );
    if(!empty($id))
    {
      $meta['title'] = $title.' of '.$id;
      $q             = "SELECT * FROM {$table} WHERE slug = ? LIMIT 1";
      if($table == 'product_tag')
      {
        $q = "SELECT * FROM {$table} WHERE title = ? LIMIT 1";
      }
      $data = $this->db->query($q, array($id))->row_array();
      if(empty($data))
      {
        $id = str_replace('-', ' ', $id);
        $data = $this->db->query($q, array($id))->row_array();
      }
      if(!empty($data))
      {
        $image = !empty($data['image']) ? $data['image'] : $site_value['image'];
        $image = !empty($data['image_link']) ? $data['image_link'] : $image;
        if(empty($data['image']) && empty($data['image_link']))
        {
          $image = image_module('config', 'site/'.$image);
        }else{
          if(empty($data['image_link']))
          {
            $image = image_module($table, $data['id'].'/'.$image);
          }else if(!empty($data['image_link'])){
            $image = $image;
          }else{
            $image = image_module('config', 'site/'.$image);
          }
        }
        $meta = array(
          'author'      => 'iwan@esoftgreat.com',
          'title'       => $title.' of '.@$data['title']. ' | '.$site_value['title'],
          'developer'   => 'esoftgreat',
          'image'       => @$image,
          'keyword'     => @$data['keyword'],
          'description' => @$data['description']
        );
        if($title == 'product' || 'product_tag')
        {
          $meta['title']       = $data['title']. ' | '.$site_value['title'];
          $meta['keyword']     = $data['title'];
          $meta['description'] = $data['title'];
        }
      }else{
        $meta['title'] = 'All of '.$title;
        $meta['image'] = image_module('config', 'site/'.@$meta['image']);
      }
    }
    $this->config->set_item('meta', $meta);
  }

	public function get_all_category($par_id = 0, $page = 0, $keyword = NULL)
	{
		$data = array();
    $url_get = '';
		$limit = 12;

    if(!empty($_GET))
    {
    	if(!empty($_GET['keyword']))
    	{
	      $keyword = @$_GET['keyword'];
	      $url_get = '?keyword='.$keyword;
    	}
      if(!empty($_GET['page']))
      {
      	$page = @intval($_GET['page']);
      }
    }
    if($keyword==NULL)
    {
      $query = $this->db->query('SELECT id FROM product_cat WHERE par_id = '.$par_id.' ORDER BY ID DESC');
    }else{
      $query = $this->db->query('SELECT id FROM product_cat WHERE id = "'.$keyword.'" OR username = "'.$keyword.'" AND par_id = '.$par_id.' ORDER BY ID DESC');
    }
      $total_rows = $query->num_rows();

    $config['base_url']   = base_url('product/cat_list').$url_get;
    $config['total_rows'] = $total_rows;
    $config['per_page']   = $limit;
    $config['full_tag_open'] = '<ul class="pagination" style="margin-top: 0;margin-bottom: 0;">';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['full_tag_close'] = '</ul>';
    $config['enable_query_strings'] = TRUE;
    $config['page_query_string'] = TRUE;
    $config['query_string_segment'] = 'page';
    $config['use_page_numbers'] = TRUE;
    $this->pagination->initialize($config);

    $data['pagination'] = $this->pagination->create_links();

		if($page>0)
		{
			$page = $page-1;
		}
		$page = @intval($page)*$limit;
		$this->db->limit($limit,$page);
		if($keyword != NULL)
		{
			$this->db->or_where(array(
									'id'=>$keyword,
									'title'=>$keyword
								));
		}
		$query = $this->db->get('product_cat');
		$data['data'] = $query->result_array();
		return $data;

		// untuk menampilkan query terakhir
		// pr($this->db->last_query());die();

	}

    public function get_data_menu($table = 'menu', $id = 0, $submenu = 0)
    {
      $data = array();
      if(!empty($table) && !empty($id))
      {
          $sql = empty($submenu) ? 'AND par_id = 0' : 'AND par_id = '.$submenu;
          $this->db->order_by('sort_order','ASC');
          $data = $this->db->get_where($table, 'publish = 1 '.$sql.' AND position_id = '.$id)->result_array();
      }
      return $data;
    }

    public function get_cat($id = 0)
    {
      $data = array();
      if(!empty($id))
      {
        $this->db->select('id,title,slug');
        $data = $this->db->get_where('product_cat', 'id = '.$id, 1)->row_array();
      }
      return $data;
    }
    public function block_product($table = '' ,$where = '', $limit = 1)
    {
      $data = array();
      if(!empty($table) && !empty($where))
      {
        $this->db->select('id,title,slug,image,created,product');
        $this->db->order_by('id', 'desc');
        if($limit == 1)
        {
          $data = $this->db->get_where($table, $where, $limit)->row_array();
        }else if($limit > 1)
        {
          $data = $this->db->get_where($table, $where, $limit)->result_array();
        }
      }
      return $data;
    }
}
