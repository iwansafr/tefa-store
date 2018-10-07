<?php defined('BASEPATH') OR exit('No direct script access allowed');
$data_config = get_block_config('slider', $config_template);
$content     = $this->esg->get_content($data_config['where'], @intval($data_config['limit']));
?>
<ul id="demo1">
	<?php
	if(!empty($content))
	{
		foreach ($content as $key => $value)
		{
			?>
			<li>
				<img src="<?php echo image_module('content', $value['id'].'/'.$value['image'])?>" alt="" />
				<div class="slide-desc">
					<h3><?php echo $value['title'] ?></h3>
				</div>
			</li>
			<?php
		}
	}
	?>
</ul>