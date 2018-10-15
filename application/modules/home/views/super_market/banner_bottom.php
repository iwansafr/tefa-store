<?php defined('BASEPATH') OR exit('No direct script access allowed');
$data_config = get_block_config('banner_bottom', $config_template);
if(!empty($data_config['where']))
{
	$product = $this->esg->get_content($data_config['where'], @intval($data_config['limit']));
	$ban = array();
	$i = 0;
	if(!empty($product))
	{
		foreach ($product as $key => $value)
		{
			if($i==0){
				$ban['left'] = $value;
			}else if($i < 3){
				$ban['left']['child'][] = $value;
			}else{
				$ban['right'] = $value;
			}

			$i++;
		}
	}
}
?>
<div class="container">
	<?php
	if(!empty($ban['left']))
	{
		?>
		<div class="col-md-6 ban-bottom3">
			<div class="ban-top">
				<img src="<?php echo image_module('content',$ban['left']['id'].'/'.$ban['left']['image']);?>" class="img-responsive" alt=""/>
			</div>
			<div class="ban-img">
				<?php
				if(!empty($ban['left']['child']))
				{
					$i = 1;
					foreach ($ban['left']['child'] as $ckey => $cvalue)
					{
						?>
						<div class=" ban-bottom<?php echo $i; ?>">
							<div class="ban-top">
								<img src="<?php echo image_module('content',$cvalue['id'].'/'.$cvalue['image']) ?>" class="img-responsive" alt=""/>
							</div>
						</div>
						<?php
						$i++;
					}
				}
				?>
				<div class="clearfix"></div>
			</div>
		</div>
		<?php
	}
	if(!empty($ban['right']))
	{
		?>
		<div class="col-md-6 ban-bottom">
			<div class="ban-top">
				<img src="<?php echo image_module('content',$ban['right']['id'].'/'.$ban['right']['image']);?>" class="img-responsive" alt=""/>
			</div>
		</div>
		<div class="clearfix"></div>
		<?php
	}
	?>
</div>