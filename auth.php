<?php
require_once('csv_util.php');
// add parameters
function signup($email, $password) {
	// check if the email is valid
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return 'Error: Invalid Email or Password';
	}
	// check if password length is between 8 and 16 characters
	else if(strlen($password)<8 || strlen($password) > 16) {
		return 'Invalid: Password must be between 8 and 16 characters';
	}
	// check if the file containing users exists
	else if (!file_exists('users.txt')) {
		return 'Internal Error: Please Try Again Later';
	}
	// check if the email is in the database already
	else if (contains('users.txt', $email, 0)) {
		echo 'Email Already Registered';
		return '<a href="signin.php">Sign in?</a>';
	}
	// encrypt password
	// save the user in the database 
	//Redirect to sign in page
	else {
		$encrypted_password = password_hash($password, PASSWORD_DEFAULT);
		$array = array($email, $encrypted_password);
		$handle = fopen('users.txt', 'a+');
		fputcsv($handle, $array, ';');
		fclose($handle);
		header('Location: signin.php');
	}
}

// add parameters
function signin($email, $password) {
	// 1. Check to see if email and password have inputs
	if (!isset($_POST['email']) || !isset($_POST['password'])) {
		echo 'Email or Password is Invalid';
		return false;
	}
	// 2. check if the email is well formatted
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo 'Email or Password is Invalid';
		return false;
	}
	// 3. check if the password is correct length
	else if (strlen($password)<8 || strlen($password) > 16) {
		echo 'Email or Password is Invalid';
		return false;
	}
	// 4. check if the file containing users exists
	else if (!file_exists('users.txt')) {
		echo 'Error';
		return false;
	}
	// 5. check if the email is registered
	else if (!contains('users.txt', $email, 0)) {
		echo 'User Not Found';
		return false;
	}
	// 6. check if the password is correct
	else if (!passwordMatch('users.txt', $password)) {
		echo 'Password is Invalid';
		return false;
	}
	else {
		return true;
	}
}

function signout() {
	// Sign the user out and destroy the current session
	$_SESSION['logged'] = "false";
	session_destroy();
	// Redirect to the index page
	header('Location: Quotes\index.php');
}