<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*admin*/
$route['admin']                         = 'admin';
$route['admin/user_edit/(:any)']        = 'admin/user_edit/$1';
$route['admin/siswa_edit/(:any)']       = 'admin/siswa_edit/$1';
$route['admin/content_category/(:any)'] = 'admin/content_category/$1';
// $route['admin/config_header']        = 'adnim/config_header';
// $route['admin/novel_novel/(:any)']   = 'admin/novel_novel/$1';

$route['search']          = 'product/search';
$route['checkout']        = 'product/cart_checkout';
$route['checkout/detail'] = 'product/checkout_detail';
$route['invoice']         = 'product/invoice';

/*content*/
$route['content/api']             = 'content/api';
$route['content/category/(:any)'] = 'content/category/$1';
$route['content/category/']       = 'content/category/';
$route['content/category']        = 'content/category/';
$route['content/search']          = 'content/search';
$route['content/search/']         = 'content/search/';
$route['content/(:any)/(:any)']   = 'content/detail/$1';
$route['content/(:any)']          = 'content/detail/$1';
$route['(:any)']                  = 'content/detail/$1';
$route['content/cat']             = 'content/content_cat';
$route['content/cat_list/(:any)'] = 'content/cat_list/$1';
$route['content/cat_edit/(:any)'] = 'content/cat_edit/$1';
$route['category/(:any)']         = 'content/category/$1';
$route['tag/(:any)']              = 'content/tag/$1';

// $route['content']              = 'content';

/*product*/
$route['cat/(:any)']         = 'product/category/$1';
$route['product-tag/(:any)'] = 'product/tag/$1';
$route['product/(:any)']     = 'product/detail/$1';
$route['p/(:any)']           = 'product/detail/$1';
$route['p-c/add_cart']       = 'product/add_cart';
$route['p-c/ch_qty']         = 'product/ch_qty';
$route['p-c/del_cart']       = 'product/del_cart';
$route['p-c/total_cart']     = 'product/total_cart';

/*crud*/
$route['crud/list_edit/(:any)'] = 'crud/list_edit/$1';

/*default*/
$route['default_controller']      = 'home/product';
$route['404_override']            = 'home';
// $route['translate_uri_dashes'] = FALSE;

