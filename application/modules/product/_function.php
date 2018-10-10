<?php defined('BASEPATH') OR exit('No direct script access allowed');
function product_link($id = '', $title = '')
{
  $output = base_url($id);
  if(!empty($id) && is_numeric($id))
  {
    $output = base_url('product/'.$id.'/').url_title($title).'.html';
  }else if(!empty($id) && !is_numeric($id))
  {
    $output = base_url('p/'.$id).'.html';
  }
  return $output;
}

function product_cat_link($id = '', $title = '')
{
	$output = base_url();
  if(!empty($id) && is_numeric($id))
  {
    $output = base_url('product/cat/'.$id.'/').url_title($title).'.html';
  }else if(!empty($id) && !is_numeric($id)){
    $output = base_url('cat/'.$id).'.html';
  }
  return $output;
}

function product_tag_link($id = '', $title = '')
{
  $output = base_url();
  if(!empty($id) && is_numeric($id))
  {
    $output = base_url('product/tag/'.$id.'/').url_title($title).'.html';
  }else if(!empty($id) && !is_numeric($id)){
    $output = base_url('product-tag/'.url_title($id)).'.html';
  }
  return $output;
}