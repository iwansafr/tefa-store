<?php defined('BASEPATH') OR exit('No direct script access allowed');
$esg  = new esg();
$menu = $this->esg->get_menu($config_template[$menu]);
if(!function_exists('super_market_menu_bottom'))
{
	function super_market_menu_bottom($data = array())
	{
		if(!empty($data) && is_array($data))
		{
			foreach ($data as $key => $value)
			{
				if(empty($value['child']))
				{
					$link = (!empty($value['is_local'])) ? base_url($value['link']) : $value['link'];
					?>
					<li><a href="<?php echo $link ?>"><?php echo $value['title'] ?></a></li>
					<?php
				}else{
					?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $value['title'] ?><b class="caret"></b></a>
						<ul class="dropdown-menu multi-column columns-3">
							<div class="row">
								<div class="multi-gd-img">
									<ul class="multi-column-dropdown">
										<h6>All <?php echo $value['title'] ?></h6>
										<?php call_user_func(__FUNCTION__, $value['child']) ?>
									</ul>
								</div>

							</div>
						</ul>
					</li>
					<?php
				}
			}
		}
	}
}

?>
<h3>Information</h3>
<ul class="info">
<!-- 	<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="about.html">About Us</a></li>
	<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="contact.html">Contact Us</a></li>
	<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="short-codes.html">Short Codes</a></li>
	<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="faq.html">FAQ's</a></li>
	<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="products.html">Special Products</a></li> -->
	<?php super_market_menu_bottom($menu) ?>
</ul>