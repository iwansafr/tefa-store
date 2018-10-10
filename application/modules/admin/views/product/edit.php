<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->session->__set('link_js', base_url().'templates/admin/js/bootstrap-tagsinput.js');

$form = new ecrud();
$table = 'product';

$get_id = $this->input->get('id');

$form->setId($get_id);

$form->init('edit');
$form->setTable($table);
$form->setHeading('Product');

$form->addInput('image','upload');
$form->addInput('image_link','text');
$form->startCollapse('image_link', 'add image link');
$form->endCollapse('image_link');
$form->setCollapse('image_link', 1);

$form->addInput('images','gallery');
$form->setAttribute('images','multiple');
$form->setLabel('images','multiple image');
$form->startCollapse('images', 'Gallery');
$form->endCollapse('images');
$form->setCollapse('images', 1);

$form->addInput('cat_ids','multiselect');
$form->setLabel('cat_ids', 'Category');
$form->setMultiSelect('cat_ids','product_cat','id,par_id,title');

$form->addInput('title', 'text');
$slug_type = !empty($get_id) ? 'text' : 'hidden';
$form->addInput('slug', $slug_type);
$form->addInput('description','textarea');
$form->addInput('price', 'text');
$form->setType('price','number');
$form->setAttribute('price',array('min'=>0));
$form->addInput('qty', 'text');
$form->setType('qty','number');
$form->setLabel('qty','Stock');
$form->setAttribute('qty',array('min'=>0));

$form->addInput('weight', 'text');
$form->setType('weight','number');
$form->setLabel('weight','Weight in gram');
$form->setAttribute('weight',array('min'=>0));

$form->addInput('discount', 'text');
$form->setType('discount','number');
$form->setAttribute('discount',array('min'=>0));

$form->addInput('expedision_ids','multiselect');
$form->setLabel('expedision_ids', 'Expedision');
$form->setMultiSelect('expedision_ids','expedision','id,par_id,title');

$form->addInput('tag_ids', 'text');
$form->setLabel('tag_ids', 'Add some tags : ');
$form->setAttribute('tag_ids', array('data-role'=>'tagsinput','placeholder'=>'separate with coma'));

if(!empty($get_id))
{
  if(empty($_POST['tag_ids']))
  {
    $tag_data = $this->data_model->get_one($table,'tag_ids', ' WHERE id = '.$get_id);
    $tag_data = explode(',',$tag_data);
    $tag_name = array();
    foreach ($tag_data as $key => $value)
    {
      $tag_name[] = $this->data_model->get_one($table.'_tag', 'title', ' WHERE id = '.@intval($value));
    }
    $tag_name = implode($tag_name, ',');
  }else{
    $tag_name = $_POST['tag_ids'];
  }
  $form->setValue('tag_ids', $tag_name);
}


$form->addInput('publish','checkbox');

$form->setRequired(array('title','price','qty'));

$form->form();


$last_id = $this->data_model->LAST_INSERT_ID();

if(!empty($last_id) || !empty($get_id))
{
  $last_id = !empty($get_id) ? $get_id : $last_id;
  if(!empty($_POST))
  {
    $post = array();
    if(!empty($_POST['tag_ids']))
    {
      $post['tag_ids'] = $this->esg->set_tag($table.'_tag');
    }
    if(empty($_POST['slug']))
    {
      $post['slug'] = slug($this->input->post('title', TRUE));
      $check_slug   = $this->data_model->get_one($table, 'slug', " WHERE slug = '".$post['slug']."'");

      if($check_slug == $post['slug'])
      {
        $array_slug   = explode('-', $check_slug);
        $array_slug[] = $last_id;
        $slug         = implode('-', $array_slug);
        $post['slug'] = slug($slug);
      }
    }
    if(!empty($post))
    {
      $this->data_model->set_data($table, $last_id, $post);
    }
  }
}

if(!empty($get_id))
{
  if(!empty($_POST))
  {
    $post       = array();
    if(!empty($_POST['tag_ids']))
    {
      $post['tag_ids'] = $this->esg->set_tag($table.'_tag');
    }
    $uniqe_id   = '';
    $check_slug = $this->data_model->get_one($table, 'slug', " WHERE id = {$get_id} AND slug = '".$this->input->post('slug')."'");
    if(empty($check_slug))
    {
      $check_slug = slug($this->input->post('title'));
      $check_slug = $this->data_model->get_one($table, 'slug', " WHERE slug = '".$check_slug."'");
      if(empty($check_slug))
      {
        $check_slug = slug($this->input->post('title'));
      }else{
        $uniqe_id   = $get_id;
      }
    }

    $array_slug   = explode('-', $check_slug);
    $array_slug[] = $uniqe_id;
    $slug         = implode('-', $array_slug);
    $post['slug'] = slug($slug);
    if(!empty($post))
    {
      $this->data_model->set_data($table, $get_id, $post);
    }
  }
}
