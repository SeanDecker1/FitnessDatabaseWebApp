<?php
	$page = 'Test Login Page';
    $path='../';
	include($path.'../FitnessDatabaseWebApp/header.php');

    require_once "{$path}classes/LoginHandler.class.php";
	$loginDB = new LoginHandler();

	// Checks which action to perform
	if ( isset( $_GET['action'] ) and $_GET['action'] == "login" ) {

		// Logs in the user and relocates
		$loginDB->login( $_POST['email'], $_POST['password'] );
		header("Location: {$path}views/exercise/index.php");

	} else if ( isset( $_GET['action'] ) and $_GET['action'] == "logout" ) {

		// Logs out the user and relocates
		$loginDB->logout();
		header("Location: {$path}views/login/index.php");

	}

?>