<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->session->__set('link_js', base_url().'templates/admin/js/bootstrap-tagsinput.js');

$form = new ecrud();

$get_id = $this->input->get('id');

if(!empty($get_id))
{
  ?>
  <a href="<?php echo base_url('admin/content_add_menu/'.$get_id) ?>"><button class="pull-right btn btn-sm btn-success"><span><i class="fa fa-plus-circle"></i></span> add to menu</button></a>
  <?php
}
$form->init('edit');
$form->setTable('content');

$form->setId($get_id);

$form->setHeading('Content');

$form->addInput('cat_ids','multiselect');
$form->setLabel('cat_ids', 'Category');
$form->setMultiSelect('cat_ids','content_cat','id,par_id,title');


$form->addInput('title', 'text');

$form->addInput('author','hidden');
$form->setValue('author',$this->session->userdata[base_url().'_logged_in']['username']);

$form->addInput('image','upload');
// $form->setAccept('image', 'image/jpeg,image/png');

$form->addInput('image_link','text');
$form->startCollapse('image_link', 'add image link');
$form->endCollapse('image_link');
$form->setCollapse('image_link', 1);

$form->addInput('images','gallery');
// $form->setAccept('images', 'image/jpeg,image/png');
$form->setAttribute('images','multiple');
$form->startCollapse('images', 'Gallery');
$form->endCollapse('images');
$form->setCollapse('images', 1);

$form->addInput('icon','text');

$form->addInput('keyword','textarea');
$form->setLabel('keyword','Meta Keyword');

$slug_type = !empty($get_id) ? 'text' : 'hidden';

$form->addInput('slug', $slug_type);

$form->addInput('description','textarea');
$form->setLabel('description','Meta Description');
$form->startCollapse('keyword', 'meta');
$form->endCollapse('description');
$form->setCollapse('keyword', 1);

$form->addInput('intro','textarea');

$form->addInput('content','textarea');
$form->setElementId('content','textckeditor');
$form->setRequired(array('title','content','cat_ids'));


$form->addInput('tag_ids', 'text');
$form->setLabel('tag_ids', 'Tag : ');
$form->setAttribute('tag_ids', array('data-role'=>'tagsinput','placeholder'=>'separate with coma'));
$form->startCollapse('tag_ids', 'Tag');
$form->endCollapse('tag_ids');
$form->setCollapse('tag_ids', 1);
if(!empty($get_id))
{
  if(empty($_POST['tag_ids']))
  {
    $tag_data = $this->data_model->get_one('content','tag_ids', ' WHERE id = '.$get_id);
    $tag_data = explode(',',$tag_data);
    $tag_name = array();
    foreach ($tag_data as $key => $value)
    {
      $tag_name[] = $this->data_model->get_one('content_tag', 'title', ' WHERE id = '.@intval($value));
    }
    $tag_name = implode($tag_name, ',');
  }else{
    $tag_name = $_POST['tag_ids'];
  }
  $form->setValue('tag_ids', $tag_name);
}

$form->addInput('publish','checkbox');

$form->form();


$last_id = $this->data_model->LAST_INSERT_ID();

if(!empty($last_id) || !empty($get_id))
{
  $last_id = !empty($get_id) ? $get_id : $last_id;
  if(!empty($_POST))
  {
    $post = array();
    if(empty($_POST['keyword']))
    {
      $post['keyword'] = $_POST['title'];
    }
    if(empty($_POST['description']))
    {
      $post['description'] = $_POST['content'];
    }
    if(empty($_POST['intro']))
    {
      $post['intro'] = substr($_POST['content'], 0,200);
    }
    if(!empty($_POST['tag_ids']))
    {
      $post['tag_ids'] = $this->esg->set_tag();
    }
    if(empty($_POST['slug']))
    {
      $post['slug'] = slug($this->input->post('title', TRUE));
      $check_slug   = $this->data_model->get_one('content', 'slug', " WHERE slug = '".$post['slug']."'");

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
      $this->data_model->set_data('content', $last_id, $post);
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
      $post['tag_ids'] = $this->esg->set_tag();
    }
    $uniqe_id   = '';
    $check_slug = $this->data_model->get_one('content', 'slug', " WHERE id = {$get_id} AND slug = '".$this->input->post('slug')."'");
    if(empty($check_slug))
    {
      $check_slug = slug($this->input->post('title'));
      $check_slug = $this->data_model->get_one('content', 'slug', " WHERE slug = '".$check_slug."'");
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
      $this->data_model->set_data('content', $get_id, $post);
    }
  }
}
