<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="ID-id">

<head>
    <title>Login Akun <?php echo get_site_name(); ?></title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, 
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="<?php echo get_template_uri('custom/login/css/style.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="<?php echo get_template_uri('custom/login/css/fontawesome-all.css'); ?>" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- /google fonts-->

</head>


<body>
    <h1><?php echo get_site_name(); ?></h1>
    <div class=" w3l-login-form">
        <h2>Login Akun</h2>
        <?php if ($flash) : ?>
        <h3 class="hello"><?php echo $flash; ?></h3>
        <?php endif; ?>
        <?php echo form_open('auth/login/do_login'); ?>

            <div class=" w3l-form-group">
                <label for="user">Username:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" class="form-control" <?php echo ($reset_field == 'username') ? 'autofocus="autofocus"' : 'value="'. set_value('username') .'"'; ?>id="user" placeholder="Username..." minlength="6" maxlength="16" required>
                </div>
                <?php echo form_error('username'); ?>
            </div>
            <div class=" w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" name="password" <?php echo ($reset_field == 'password') ? 'autofocus="autofocus"' : ''; ?>class="form-control" placeholder="Password" minlength="6" required>
                </div>
                <?php echo form_error('password'); ?>
            </div>
            <div class="forgot">
                <?php echo anchor('auth/forget_password', 'Lupa password?'); ?>
                <p><input type="checkbox" name="remember_me" value="1">Ingat saya</p>
            </div>
            <button type="submit">Login</button>
        <?php echo form_close(); ?>
        <p class=" w3l-register-p">Belum punya akun? <a href="<?php echo site_url('auth/register'); ?>" class="register">Daftar sekarang!</a></p>
    </div>
    <footer>
        <p class="copyright-agileinfo">&copy; 2019 <?php echo get_team_name(); ?>.</p>
    </footer>

</body>

</html>