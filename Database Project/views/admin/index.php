<?php
	$page = 'Admin Page';
    $path='../../';
	include($path.'../FitnessDatabaseWebApp/header.php');

	// If the user is not logged in, they are redirected to the admin page
	if ( !isset( $_SESSION['loggedIn'] ) or ( !$_SESSION['loggedIn'] ) ) {
		header("Location: {$path}views/login/index.php");
	}

	require_once "{$path}classes/ExerciseAccess.class.php";
	$exerciseDB = new ExerciseAccess();
	
	require_once "{$path}classes/AdminAccess.class.php";
	$adminDB = new AdminAccess();
?>

<?php
    include ($path.'../FitnessDatabaseWebApp/views/admin/adminPage.php');
?>

<?php
	include ($path.'../FitnessDatabaseWebApp/footer.php');
?>