<?php defined('BASEPATH') OR exit('No direct script access allowed');
$data_config = get_block_config('product_banner_top', $config_template);
if(!empty($data_config['where']))
{
  $product = $this->esg->get_product($data_config['where'], @intval($data_config['limit']));
  $i = 0;
  echo '<ol class="carousel-indicators">';
  foreach ($product as $key => $value)
  {
    $active = $i == 0 ? 'class="active"' : '';
    echo '<li data-target="#myCarousel" data-slide-to="'.$i.'" '.$active.'></li>';
    $i++;
  }
  echo '</ol>';
  $i = 0;
  echo '<div class="carousel-inner" role="listbox">';
  foreach ($product as $key => $value)
  {
    $active = $i == 0 ? 'active' : '';
    echo '<div class="item '.$active.'">';
    echo '<a href="'.product_link($value['slug']).'"> <img class="first-slide" src="'.image_module('product',$value['id'].'/'.$value['image']).'" alt="'.$value['title'].'"></a>';
    echo '</div>';
    $i++;
  }
  echo '</div>';
}