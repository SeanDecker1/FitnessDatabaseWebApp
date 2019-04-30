<?php 
        $page = 'Test Page';
        $path='./';
        include($path.'../FitnessDatabaseWebApp/header.php');

        require_once "{$path}classes/AdminAccess.class.php";
        $adminDB = new AdminAccess();
        
        require_once "{$path}classes/ExerciseAccess.class.php";
        $exerciseDB = new ExerciseAccess();
                
        require_once "{$path}classes/TrainerAccess.class.php";
        $trainerDB = new TrainerAccess();

    ?>

    <div class="col-sm-1"></div> 

    <div class="col-sm-10">
        <h1 class="centerHeader">Test Functions</h1>

        <!-- Tests getUser -->
        <h3 class="centerHeader">Tests getUser(1)</h3>
        <?php

            // Gets all user information
            $testData = $adminDB->getUser( 1 );

            // Loops through all users
            for ( $i = 0; $i <= count($testData) - 1; $i++ ) {
                
                // Displays all user information
                echo "
                    <div class='list-group-item postContainer text-center'>
                        <p>ID: <b>{$testData[$i][0]}</b></p>
                        <p>Name: {$testData[$i][1]}</p>
                        <p>Email: {$testData[$i][2]}</p> 
                        <p>Password: {$testData[$i][3]}</p> 
                        <p>Type: {$testData[$i][4]}</p> 
                    </div>
                ";

            } // Ends testData for loop

        ?>

        <hr />

        <!-- Tests getUsers -->
        <h3 class="centerHeader">Tests getUsers()</h3>
        <?php

            // Gets all user information
            $testData = $adminDB->getUsers();

            // Loops through all users
            for ( $i = 0; $i <= count($testData) - 1; $i++ ) {
                
                // Displays all user information
                echo "
                    <div class='list-group-item postContainer text-center'>
                        <p>ID: <b>{$testData[$i][0]}</b></p>
                        <p>Name: {$testData[$i][1]}</p>
                        <p>Email: {$testData[$i][2]}</p> 
                        <p>Password: {$testData[$i][3]}</p> 
                        <p>Type: {$testData[$i][4]}</p> 

                        <a href='views/testDelete.php?id={$testData[$i][0]}&table=user' class='btn redButton'>Delete</a> 
                        <a href='views/testEdit.php?id={$testData[$i][0]}&table=user' class='btn greenButton'>Edit</a>
                    </div>
                ";

            } // Ends testData for loop

        ?>

        <hr />

        <!-- Tests createUser -->
        <h3 class="centerHeader">Tests createUser</h3>
        <a href='views/testCreate.php?table=user' class='btn blueButton'>Create User</a>

        <hr />

        <!-- Tests getExercise -->
        <h3 class="centerHeader">Tests getExercise(1)</h3>
        <?php

            // Gets all exercise information
            $testData = $exerciseDB->getExercise( 1 );

            // Loops through all exercises
            for ( $i = 0; $i <= count($testData) - 1; $i++ ) {
                
                // Displays all exercise information
                echo "
                    <div class='list-group-item postContainer text-center'>
                        <p>ID: <b>{$testData[$i][0]}</b></p>
                        <p>Name: {$testData[$i][1]}</p>
                        <p>Area: {$testData[$i][2]}</p> 
                        <p>Muscle: {$testData[$i][3]}</p> 
                        <p>Description: {$testData[$i][4]}</p> 
                        <p>Instructions: {$testData[$i][5]}</p>
                        <p>Author: {$testData[$i][6]}</p>
                    </div>
                ";

            } // Ends testData for loop

        ?>

        <hr />

        <!-- Tests getAllExercises() -->
        <h3 class="centerHeader">Tests getAllExercises()</h3>
        <?php

            // Gets all exercise information
            $testData = $exerciseDB->getAllExercises();

            // Loops through all exercises
            for ( $i = 0; $i <= count($testData) - 1; $i++ ) {
                
                // Displays all exercise information
                echo "
                    <div class='list-group-item postContainer text-center'>
                        <p>ID: <b>{$testData[$i][0]}</b></p>
                        <p>Name: {$testData[$i][1]}</p>
                        <p>Area: {$testData[$i][2]}</p> 
                        <p>Muscle: {$testData[$i][3]}</p> 
                        <p>Description: {$testData[$i][4]}</p> 
                        <p>Instructions: {$testData[$i][5]}</p>
                        <p>Author: {$testData[$i][6]}</p>

                        <a href='views/testDelete.php?id={$testData[$i][0]}&table=exercise' class='btn redButton'>Delete</a> 
                        <a href='views/testEdit.php?id={$testData[$i][0]}&table=exercise' class='btn greenButton'>Edit</a>
                    </div>
                ";

            } // Ends testData for loop

        ?>

        <hr />

        <!-- Tests createExercise -->
        <h3 class="centerHeader">Tests createExercise</h3>
        <a href='views/testCreate.php?table=exercise' class='btn blueButton'>Create Exercise</a>

        <hr />

        <!-- Tests getExercisesByArea -->
        <h3 class="centerHeader">Tests getExercisesByArea(1)</h3>
        <?php

            // Gets all exercise information
            $testData = $exerciseDB->getExercisesByArea( 1 );

            // Loops through all exercises
            for ( $i = 0; $i <= count($testData) - 1; $i++ ) {
                
                // Displays all exercise information
                echo "
                    <div class='list-group-item postContainer text-center'>
                        <p>ID: <b>{$testData[$i][0]}</b></p>
                        <p>Name: {$testData[$i][1]}</p>
                    </div>
                ";

            } // Ends testData for loop

        ?>

        <hr />

        <!-- Tests getExercisesByMuscle -->
        <h3 class="centerHeader">Tests getExercisesByMuscle(1)</h3>
        <?php

            // Gets all exercise information
            $testData = $exerciseDB->getExercisesByMuscle( 1 );

            // Loops through all exercises
            for ( $i = 0; $i <= count($testData) - 1; $i++ ) {
                
                // Displays all exercise information
                echo "
                    <div class='list-group-item postContainer text-center'>
                        <p>ID: <b>{$testData[$i][0]}</b></p>
                        <p>Name: {$testData[$i][1]}</p>
                    </div>
                ";

            } // Ends testData for loop

        ?>

        <hr />

        <!-- Tests getAreas -->
        <h3 class="centerHeader">Tests getAreas()</h3>
        <?php

            // Gets all exercise information
            $testData = $exerciseDB->getAreas();

            // Loops through all exercises
            for ( $i = 0; $i <= count($testData) - 1; $i++ ) {
                
                // Displays all exercise information
                echo "
                    <div class='list-group-item postContainer text-center'>
                        <p>ID: <b>{$testData[$i][0]}</b></p>
                        <p>Name: {$testData[$i][1]}</p>
                    </div>
                ";

            } // Ends testData for loop

        ?>

        <hr />

        <!-- Tests getMuscles -->
        <h3 class="centerHeader">Tests getMuscles()</h3>
        <?php

            // Gets all exercise information
            $testData = $exerciseDB->getMuscles();

            // Loops through all exercises
            for ( $i = 0; $i <= count($testData) - 1; $i++ ) {
                
                // Displays all exercise information
                echo "
                    <div class='list-group-item postContainer text-center'>
                        <p>ID: <b>{$testData[$i][0]}</b></p>
                        <p>Name: {$testData[$i][1]}</p>
                    </div>
                ";

            } // Ends testData for loop

        ?>

        <hr />

        <!-- Tests getTrainers -->
        <h2 class="centerHeader">Tests getTrainers()</h2>
        <?php

            // Gets all user information
            $testData = $trainerDB->getTrainers();

            // Loops through all users
            for ( $i = 0; $i <= count($testData) - 1; $i++ ) {
                
                // Displays all user information
                echo "
                    <div class='list-group-item postContainer text-center'>
                        <p>ID: <b>{$testData[$i][0]}</b></p>
                        <p>Name: {$testData[$i][1]}</p>
                        <p>Email: {$testData[$i][2]}</p> 
                    </div>
                ";

            } // Ends testData for loop

        ?>

        <hr />

        <!-- Tests login -->
        <h3 class="centerHeader">Tests login( "jeff@email.com", "passjeff" )</h3>
        <h3 class="centerHeader">Logged In:
        <?php 
            if ( isset( $_SESSION['loggedIn'] ) and ( $_SESSION['loggedIn'] ) ) {
                echo ( "TRUE" );
            } else {
                echo ( "FALSE" );
            }
        ?>
        </h3>
        <a href='views/testLogin.php?action=login' class='btn blueButton'>Login</a>

        <hr />

        <!-- Tests login -->
        <h3 class="centerHeader">Tests logout()</h3>
        <a href='views/testLogin.php?action=logout' class='btn redButton'>Logout</a>

        <hr />


    </div>

    <div class="col-sm-1"></div>

    <?php
	    include ($path.'../FitnessDatabaseWebApp/footer.php');
    ?> 