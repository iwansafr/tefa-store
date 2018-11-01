<h3>Contact</h3>
<?php
$profile = $this->esg->get_config('profile');
?>
<ul class="address">
	<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><?php echo @$profile['address'] ?></li>
	<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:<?php echo @$profile['email'] ?>"><?php echo @$profile['email'] ?></a></li>
	<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a href="tel:<?php echo $profile['phone'] ?>"><?php echo $profile['phone'] ?></a></li>
	<li><i class="fa fa-whatsapp" aria-hidden="true"></i><a href="https://api.whatsapp.com/send?phone=<?php echo @$profile['wa'];?>"><?php echo @$profile['wa'];?></a></li>
</ul>