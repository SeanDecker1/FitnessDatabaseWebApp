<?php
	$page = 'Trainer Listing';
    $path='../../';
	include($path.'../FitnessDatabaseWebApp/header.php');

	// If the user is not logged in, they are redirected to the admin page
	if ( !isset( $_SESSION['loggedIn'] ) or ( !$_SESSION['loggedIn'] ) ) {
		header("Location: {$path}views/login/index.php");
	}

	require_once "{$path}classes/TrainerAccess.class.php";
	$trainerDB = new TrainerAccess();
?>

<?php
    include ($path.'../FitnessDatabaseWebApp/views/trainer/trainerListing.php');
?>

<?php
	include ($path.'../FitnessDatabaseWebApp/footer.php');
?>