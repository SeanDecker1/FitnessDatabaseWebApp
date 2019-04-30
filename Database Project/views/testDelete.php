<?php
	$page = 'Test Delete Page';
    $path='../';
	include($path.'../FitnessDatabaseWebApp/header.php');
?>

<?php

    require_once "{$path}classes/AdminAccess.class.php";
	$adminDB = new AdminAccess();

	if ( isset( $_GET['id'] ) and isset( $_GET['table'] ) ) {
		$selectID = $_GET['id'];
		$selectTable = $_GET['table'];
	}

	// Checks which table to delete from
	if ( isset( $selectTable ) and $selectTable == "user" ) {

		// Deletes the record and relocates
		$adminDB->deleteUser( $selectID );
		header("Location: {$path}views/admin/index.php");

	} else if ( isset( $selectTable ) and $selectTable == "exercise" ) {

		// Deletes the record and relocates
		$adminDB->deleteExercise( $selectID );
		header("Location: {$path}views/admin/index.php");

	}

?>

<?php
	include ($path.'../FitnessDatabaseWebApp/footer.php');
?>