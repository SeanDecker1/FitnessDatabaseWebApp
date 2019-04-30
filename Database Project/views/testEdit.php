<?php

	$page = 'Test Edit Page';
    $path='../';
	include($path.'../FitnessDatabaseWebApp/header.php');

	require_once "{$path}classes/AdminAccess.class.php";
    $adminDB = new AdminAccess();
    
    require_once "{$path}classes/ExerciseAccess.class.php";
    $exerciseDB = new ExerciseAccess();

	// Checks to see if user is being updated
	if ( isset( $_POST['editUser'] ) ) {

		// Updates record and relocates
        $adminDB->editUser( $_POST['userID'], $_POST['userName'], $_POST['userEmail'], $_POST['userPassword'], $_POST['userType'] );
		header("Location: {$path}views/admin/index.php");

	}

	// Checks to see if exercise is being updated
	if ( isset( $_POST['editExercise'] ) ) {

		// Updates record and relocates
        $adminDB->editExercise( $_POST['exerID'], $_POST['exerName'], $_POST['exerArea'], $_POST['exerMuscle'],
        $_POST['exerDesc'], $_POST['exerInstr'], $_POST['exerAuthor'] );
		header("Location: {$path}views/admin/index.php");

	}

?>

<?php

	if ( isset( $_GET['id'] ) and isset( $_GET['table'] ) ) {
		$selectID = $_GET['id'];
		$selectTable = $_GET['table'];
	}

	// DISPLAYS WHEN EDITING USER RECORD
	if ( isset( $selectTable ) and ( $selectTable == "user" ) ) {
		
		$userData = $adminDB->getUser( $selectID );
?>

		<!--- Begins the form to edit user --->
        <form name="userForm" action="" method="post">
			<input type="hidden" name="userID" value="<?php echo $userData[0][0]; ?>">
            <div class="form-group">
                <label for="userName">Name:</label>
                <input type="text" class="form-control" id="name" name="userName" value="<?php echo $userData[0][1]; ?>" required>
            </div>
            <div class="form-group">
                <label for="userEmail">Email:</label>
                <input type="text" class="form-control" id="email" name="userEmail" value="<?php echo $userData[0][2]; ?>" required>
			</div>
            <div class="form-group">
                <label for="userPassword">Password:</label>
                <input type="text" class="form-control" id="password" name="userPassword" value="<?php echo $userData[0][3]; ?>" required>
			</div>
			<div class="form-group">
                <label for="userType">Type:</label>
                <input type="number" class="form-control" id="type" name="userType" value="<?php echo $userData[0][5]; ?>" required>
			</div>
			<input type="hidden" name="editUser" value="edit">
            <button type="submit" id="editButton" class="btn blueButton">Edit</button>
        </form>
        <!--- Ends the form to edit user --->

<?php
	} else if ( isset( $selectTable ) and ( $selectTable == "exercise" ) ) {
		// DISPLAYS WHEN EDITING EXERCISE RECORD
		$exerciseData = $exerciseDB->getExercise( $selectID );
?>

		<!--- Begins the form to edit exercise --->
        <form name="exerciseForm" action="" method="post">
			<input type="hidden" name="exerID" value="<?php echo $exerciseData[0][0]; ?>">
            <div class="form-group">
                <label for="exerName">Name:</label>
                <input type="text" class="form-control" id="name" name="exerName" value="<?php echo $exerciseData[0][1]; ?>" required>
            </div>
            <div class="form-group">
                <label for="exerArea">Area:</label>
                <input type="number" class="form-control" id="area" name="exerArea" value="<?php echo $exerciseData[0][7]; ?>" required>
			</div>
            <div class="form-group">
                <label for="exerMuscle">Muscle:</label>
                <input type="number" class="form-control" id="muscle" name="exerMuscle" value="<?php echo $exerciseData[0][8]; ?>" required>
			</div>
            <div class="form-group">
                <label for="exerDesc">Description:</label>
                <input type="text" class="form-control" id="decr" name="exerDesc" value="<?php echo $exerciseData[0][4]; ?>" required>
			</div>
            <div class="form-group">
                <label for="exerInstr">Instructions:</label>
                <input type="text" class="form-control" id="instr" name="exerInstr" value="<?php echo $exerciseData[0][5]; ?>" required>
			</div>
            <div class="form-group">
                <label for="exerAuthor">Author:</label>
                <input type="number" class="form-control" id="author" name="exerAuthor" value="<?php echo $exerciseData[0][9]; ?>" required>
			</div>
			<input type="hidden" name="editExercise" value="edit">
            <button type="submit" id="editButton" class="btn blueButton">Edit</button>
        </form>
        <!--- Ends the form to edit exercise --->

<?php
	}
?>

<?php
	include ($path.'../FitnessDatabaseWebApp/footer.php');
?>