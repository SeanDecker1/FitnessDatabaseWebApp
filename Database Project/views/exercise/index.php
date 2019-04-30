<?php
	$page = 'Exercise Page';
    $path='../../';
	include($path.'../FitnessDatabaseWebApp/header.php');

	// If the user is not logged in, they are redirected to the admin page
	if ( !isset( $_SESSION['loggedIn'] ) or ( !$_SESSION['loggedIn'] ) ) {
		header("Location: {$path}views/login/index.php");
	}

	require_once "{$path}classes/ExerciseAccess.class.php";
	$exerciseDB = new ExerciseAccess();
?>

<?php
    include ($path.'../FitnessDatabaseWebApp/views/exercise/exerciseListing.php');
?>

<?php
	include ($path.'../FitnessDatabaseWebApp/footer.php');
?>