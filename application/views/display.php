<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>css/show.css">
	<title>Display Information</title>
</head>
	<body>
		<h1>Welcome <span><?= $this->session->userdata('first_name'); ?></span></h1>
		<?php echo anchor('/', 'Log out'); ?>
			<div id="container">
				<label for="first_name">First Name</label>
				<h2><?= $this->session->userdata('first_name'); ?></h2>
				<label for="last_name">Last Name</label>
				<h2><?= $this->session->userdata('last_name'); ?></h2>
				<label for="email">Email</label>
				<h2><?= $this->session->userdata('email'); ?></h2>
			</div>
	</body>
</html>
