<?php defined('BASEPATH') OR exit('No direct script access allowed');

$part = @$_GET['part'];
if(!empty($part))
{
	$file_path = APPPATH.'modules'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'manual'.DIRECTORY_SEPARATOR.$part.'.php';
	if(file_exists($file_path))
	{
		echo '<button class="btn btn-default" onclick="print_manual()"><i class="fa fa-print"></i> Print</button>';
		echo '<div id="manual_form">';
		$this->load->view('manual/'.$part);
		echo '</div>';
		?>
		<script type="text/javascript">
			document.title = "<?php echo str_replace('_', ' ', $part) ?>";
			function print_manual()
			{
				var p = document.getElementById('manual_form').innerHTML;
				var o = document.body.innerHTML;
				document.body.innerHTML = p;
				window.print();
				document.body.innerHTML = o;
			}
		</script>
		<?php
	}else{
		msg('it seems that your url is wrong', 'danger');
	}
}