<?php
	$page = 'Login Page';
    $path='../../';
	include($path.'../FitnessDatabaseWebApp/header.php');

	require_once "{$path}classes/ExerciseAccess.class.php";
	$muscleDB = new ExerciseAccess();
?>

<?php
    include ($path.'../FitnessDatabaseWebApp/views/login/loginPage.php');
?>

<?php
	include ($path.'../FitnessDatabaseWebApp/footer.php');
?>