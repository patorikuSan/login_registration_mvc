<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>css/auth.css">
	<title>Login</title>
</head>
	<body>
	
		<h1>Login</h1>
		<?= $this->session->flashdata("login_error") ?>
		<form action="students/login" method="post">
		<?php echo validation_errors(); ?>
			<label for="email">Email</label>
			<input type="text" name="email" >
			<label for="password">Password</label>
			<input type="password" name="password">
			<input type="submit" value="Login">
		</form>

		<h1>Register</h1>
		<form action="students/register" method="post">
			<?php echo validation_errors(); ?>
			<label for="first_name">First Name</label>
			<input type="text" name="first_name">
			<label for="last_name">Last Name</label>
			<input type="text" name="last_name" id="">
			<label for="email">Email</label>
			<input type="email" name="email" >
			<label for="password">Password</label>
			<input type="password" name="password">
			<label for="confirm_pass">Confirm Password</label>
			<input type="text" name="confirm_pass" id="">
			<input type="submit" value="Register">
		</form>
	</body>
</html>
