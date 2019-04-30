<?php
	$page = 'Area Page';
    $path='../../';
	include($path.'../FitnessDatabaseWebApp/header.php');

	// If the user is not logged in, they are redirected to the admin page
	if ( !isset( $_SESSION['loggedIn'] ) or ( !$_SESSION['loggedIn'] ) ) {
		header("Location: {$path}views/login/index.php");
	}

	require_once "{$path}classes/ExerciseAccess.class.php";
	$areaDB = new ExerciseAccess();
?>

<?php
    include ($path.'../FitnessDatabaseWebApp/views/area/areaListing.php');
?>

<?php
	include ($path.'../FitnessDatabaseWebApp/footer.php');
?>