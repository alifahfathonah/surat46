<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
<title>Buat Akun <?php echo get_site_name(); ?> dan Mulai Mencintai Lingkungan!</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Interior Register Form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<link href="<?php echo get_template_uri('custom/register/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo get_template_uri('custom/register/css/style.css'); ?>" rel="stylesheet" type="text/css" media="all"/>
<link href="//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900" rel="stylesheet">
</head>
<body>
<div class="signupform">
<h1>Buat Akun</h1>
	<div class="container">
		
		<div class="agile_info">
			<div class="w3l_form">
				<div class="left_grid_info">
					<h3>SIMPATI Maps</h3>
					<h4>Tahukah anda?</h4>
					<p style="text-align: justify;">Hari ini, setiap orang menghasilkan 0,7 kg sampah per hari, atau 255,5 kg per tahun. Dengan jumlah penduduk Indonesia yang mencapai 267 juta jiwa, artinya dalam satu tahun Indonesia menghasilkan 68 juta ton sampah.</p>
					<ul class="social_section_1info">
						<li><a href="#" class="w3_facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="w3_twitter"><i class="fa fa-at"></i></a></li>
						<li><a href="#" class="w3_instagram"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="w3_info">
        <h2>Buat Akun</h2>
        <?php if ($flash) : ?>
          <p><?php echo $flash; ?></p>
        <?php else : ?>
        <p>Buat Akun <?php echo get_site_name(); ?> dan Mulai Mencintai Lingkungan!</p>
        <?php endif; ?>
						<?php echo form_open('auth/register/do_register'); ?>
						<div class="input-group">
							<span><i class="fa fa-user" aria-hidden="true"></i></span>
              <input type="text" name="profile[full_name]" value="<?php echo set_value('profile[full_name]'); ?>" class="fullname" placeholder="Nama Lengkap" minlength="6" maxlength="32" required>
            </div>
            <?php echo form_error('profile[full_name]'); ?>

						<div class="input-group">
							<span><i class="fa fa-envelope" aria-hidden="true"></i></span>
              <input type="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email" minlength="12" maxlength="64" required>
            </div>
            <?php echo form_error('email'); ?>

            <div class="input-group">
							<span><i class="fa fa-user" aria-hidden="true"></i></span>
              <input type="text" name="username" value="<?php echo set_value('username'); ?>" placeholder="Nama Pengguna" minlength="6" maxlength="16" required>
            </div>
            <?php echo form_error('username'); ?>
						<div class="input-group">
							<span><i class="fa fa-lock" aria-hidden="true"></i></span>
              <input type="Password" name="password" placeholder="Password" minlength="6" required>
            </div>
            <?php echo form_error('password'); ?>

						<div class="input-group">
							<span><i class="fa fa-list" aria-hidden="true"></i></span>
							<select name="user_type">
                				<option disabled selected>Jenis Pengguna</option>
               						<?php if ( count($user_types) > 0) : ?>
			   							<?php foreach ($user_types as $type) : ?>
			   					<option value="<?php echo $type->ID; ?>"<?php echo set_select('user_type', $type->ID); ?>><?php echo $type->type; ?></option>
			   							<?php endforeach; ?>
			   						<?php endif; ?>
              				</select>
						</div>
						<?php echo form_error('user_type'); ?>

							<button class="btn btn-danger btn-block" type="submit">Buat Akun</button >                
					<?php echo form_close(); ?>
			</div>
			<div class="clear"></div>
			</div>
			
		</div>
		<div class="footer">

 <p>&copy; 2019 <?php echo get_team_name(); ?>.</p>
 </div>
	</div>
	</body>
</html>