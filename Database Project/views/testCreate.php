<?php

	$page = 'Test Create Page';
    $path='../';
	include($path.'../FitnessDatabaseWebApp/header.php');

    require_once "{$path}classes/AdminAccess.class.php";
	$adminDB = new AdminAccess();

	// Checks to see if record is being added to Users
	if ( isset( $_POST['createUser'] ) ) {

		// Adds the record and relocates
		$adminDB->createUser( $_POST['userName'], $_POST['userEmail'], $_POST['userPassword'], $_POST['userType'] );
		header("Location: {$path}views/admin/index.php");

	}

	// Checks to see if record is being added to exercise
	if ( isset( $_POST['createExercise'] ) ) {

		// Adds the record and relocates
		$adminDB->createExercise( $_POST['exerName'], $_POST['exerArea'], $_POST['exerMuscle'], $_POST['exerDesc'], $_POST['exerInstr'], $_POST['exerAuthor'] );
		header("Location: {$path}views/admin/index.php");

	}

?>

<?php
    
	if ( isset( $_GET['table'] ) ) {
		$selectTable = $_GET['table'];
	}

	// Displays if the record is in the user table
	if ( $selectTable == "user" ) {
?>

		<!--- Begins the form to create a user --->
        <form name="userForm" action="" method="post">
            <div class="form-group">
                <label for="userName">Name:</label>
                <input type="text" class="form-control" id="name" name="userName" required>
            </div>
            <div class="form-group">
                <label for="userEmail">Email:</label>
                <input type="email" class="form-control" id="email" name="userEmail" required>
            </div>
            <div class="form-group">
                <label for="userPassword">Password:</label>
                <input type="text" class="form-control" id="password" name="userPassword" required>
			</div>
			<div class="form-group">
                <label for="userType">Type:</label>
                <input type="number" class="form-control" id="type" name="userType" required>
			</div>
			<input type="hidden" name="createUser" value="create">
            <button type="submit" id="createButton" class="btn blueButton">Create</button>
        </form>
        <!--- Ends the form to create a user --->

<?php
	} else if ( $selectTable == "exercise" ) {
?>

		<!--- Begins the form to create an exercise --->
		<form name="userForm" action="" method="post">
            <div class="form-group">
                <label for="exerName">Name:</label>
                <input type="text" class="form-control" id="name" name="exerName" required>
            </div>
            <div class="form-group">
                <label for="exerArea">Area:</label>
                <input type="number" class="form-control" id="area" name="exerArea" required>
            </div>
            <div class="form-group">
                <label for="exerMuscle">Muscle:</label>
                <input type="number" class="form-control" id="muscle" name="exerMuscle" required>
			</div>
            <div class="form-group">
                <label for="exerDesc">Description:</label>
                <input type="text" class="form-control" id="desc" name="exerDesc" required>
            </div>
            <div class="form-group">
                <label for="exerInstr">Instructions:</label>
                <input type="text" class="form-control" id="instr" name="exerInstr" required>
            </div>
			<div class="form-group">
                <label for="exerAuthor">Author:</label>
                <input type="number" class="form-control" id="author" name="exerAuthor" required>
			</div>
			<input type="hidden" name="createExercise" value="create">
            <button type="submit" id="createButton" class="btn blueButton">Create</button>
        </form>
        <!--- Ends the form to create an exercise --->

<?php
	}		
?>

<?php
	include ($path.'../FitnessDatabaseWebApp/footer.php');
?>