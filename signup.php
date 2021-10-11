<?php
	session_start();
	require_once('auth.php');
	// if the user is alreay signed in, redirect them to the members_page.php page
	if ($_SESSION['logged'] == "true") {
		header('Location: index.php');
	}
	// use the following guidelines to create the function in auth.php
	// instead of using "die", return a message that can be printed in the HTML page
	// check if the fields are empty
	if(count($_POST)>0) {
		if (!isset($_POST['email'])) {
			die('Invalid: Please enter an email');
		}
		else if (!isset($_POST['password'])) {
			die('Invalid: Please enter a password');
		}
		else {
			echo signup($_POST['email'], $_POST['password']);
		}
	}

	// improve the form
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body style="margin-left: 5%;">
	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Sign Up</li>
		</ol>
	</nav>
	<h1>Sign Up</h1>
	<form method="POST">
		<div class="mb-3 row" style="width: 40%;">
			<label for="inputEmail" class="col-sm-2 col-form-label">E-mail</label>
			<div class="col-sm-10">
				<input name="email" type="email" class="form-control" id="inputEmail">
			</div>
		</div>
		<div class="mb-3 row" style="width: 40%;">
			<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
			<div class="col-sm-10">
				<input name="password" type="password" class="form-control" id="inputPassword">
			</div>
		</div>
		<hr>
		<div class="mb-3 row" style="width: 10%;">
			<button value="submit" type="submit" class="btn btn-primary mb-3">Sign Up</button>
		</div>
	</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
    
  </body>
</html>