<?php
	$page = 'Test Login Page';
    $path='../';
	include($path.'../FitnessDatabaseWebApp/header.php');
?>

<?php

    require_once "{$path}classes/LoginHandler.class.php";
	$loginDB = new LoginHandler();

	if ( isset( $_GET['id'] ) and isset( $_GET['table'] ) ) {
		$selectID = $_GET['id'];
		$selectTable = $_GET['table'];
	}

	// Checks which action to perform
	if ( isset( $_GET['action'] ) and $_GET['action'] == "login" ) {

		// Logs in the user and relocates
		$loginDB->login( "jeff@email.com", "passjeff" );
		header("Location: {$path}index.php");

	} else if ( isset( $_GET['action'] ) and $_GET['action'] == "logout" ) {

		// Logs out the user and relocates
		$loginDB->logout();
		header("Location: {$path}index.php");

	}

?>

<?php
	include ($path.'../FitnessDatabaseWebApp/footer.php');
?>