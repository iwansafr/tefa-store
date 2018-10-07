<?php defined('BASEPATH') OR exit('No direct script access allowed');
$esg  = new esg();
$menu = $this->esg->get_menu($config_template['menu_top']);
if(!function_exists('super_market_menu_top'))
{
	function super_market_menu_top($data = array())
	{
		if(!empty($data) && is_array($data))
		{
			foreach ($data as $key => $value)
			{
				if(empty($value['child']))
				{
					?>
					<li><a href="<?php echo $value['link'] ?>"><?php echo $value['title'] ?></a></li>
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
<nav class="navbar navbar-default">
	<div class="navbar-header nav_2">
		<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
		<ul class="nav navbar-nav">
			<?php super_market_menu_top($menu) ?>
		</ul>
	</div>
</nav>