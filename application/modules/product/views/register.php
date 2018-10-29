<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li class="active">Register Page</li>
		</ol>
	</div>
</div>
<div class="register">
	<div class="container">
		<h2>Register Here</h2>
		<form action="" method="post">
			<div class="login-form-grids">
				<h5>profile information</h5>
				<input type="text" name="fname" placeholder="First Name..." required=" " value="<?php echo @$data['fname'] ?>">
				<input type="text" name="lname" placeholder="Last Name..." required=" " value="<?php echo @$data['lname'] ?>">
				<input type="number" name="hp" placeholder="no hp" required>
				<input type="text" name="prov" placeholder="Provinsi" required>
				<input type="text" name="kab" placeholder="Kabupaten" required>
				<input type="text" name="kec" placeholder="Kecamatan" required>
				<input type="number" name="pos" placeholder="kode pos" required>
				<textarea name="alamat" placeholder="alamat lengkap" required></textarea>
				<!-- <div class="register-check-box">
					<div class="check">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Subscribe to Newsletter</label>
					</div>
				</div> -->
				<h6>Login information</h6>
				<?php 
				$css = !empty($data['message']['email']) ? 'style="border: 1px solid red;"' : '';
				echo !empty($css) ? '<label style="color: red;">'.$data['message']['email'].'</label>' : '';
				?>
				<input type="email" name="email" placeholder="Email Address" required=" " value="<?php echo @$data['email'] ?>" <?php echo $css ?>>
				<?php 
				$css = !empty($data['message']['password']) ? 'style="border: 1px solid red;"' : '';
				echo !empty($css) ? '<label style="color: red;">'.$data['message']['password'].'</label>' : '';
				?>
				<input type="password" name="password" placeholder="Password" required=" " value="<?php echo @$data['password'] ?>" <?php echo $css ?>>
				<input type="password" name="cpassword" placeholder="Password Confirmation" required=" " value="<?php echo @$data['cpassword'] ?>" <?php echo $css ?>>
				<div class="register-check-box">
					<div class="check">
						<label class="checkbox"><input type="checkbox" required name="agree" <?php echo $data['agree'] ?>><i> </i>I accept the terms and conditions</label>
					</div>
				</div>
				<input type="submit" value="Register">
			</div>
		</form>
		<div class="register-home">
			<a href="<?php echo base_url(); ?>">Home</a>
		</div>
	</div>
</div>