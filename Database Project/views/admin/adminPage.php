<div class="col-sm-1"></div> 

<div class="col-sm-10">

    <?php

        // If the user is an admin, they are able to modify user information
        if  ( $_SESSION['userPermissions'] == 3 ) {
            
            // Gets all user information
            $adminData = $adminDB->getUsers();

            // Loops through all users
            for ( $i = 0; $i <= count($adminData) - 1; $i++ ) {
                
                // Displays all user information
                echo ("
                    <h2 class='centerHeader'>User Information:</h2>

                    <div class='list-group-item postContainer text-center'>
                        <p>ID: <b>{$adminData[$i][0]}</b></p>
                        <p>Name: {$adminData[$i][1]}</p>
                        <p>Email: {$adminData[$i][2]}</p> 
                        <p>Password: {$adminData[$i][3]}</p> 
                        <p>Type: {$adminData[$i][4]}</p> 

                        <a href='{$path}views/testDelete.php?id={$adminData[$i][0]}&table=user' class='btn redButton'>Delete</a> 
                        <a href='{$path}views/testEdit.php?id={$adminData[$i][0]}&table=user' class='btn greenButton'>Edit</a>
                    </div>
                ");

            } // Ends adminData for loop

            // Button to create a new user
            echo ("
                <hr />
                <a href='<?php echo $path; ?>views/testCreate.php?table=user' class='btn blueButton'>Create User</a>
                <hr />
            ");

        } //Ends if permissions check
 
        // Gets all exercise information
        $exerciseData = $exerciseDB->getAllExercises();

        // Loops through all exercises
        for ( $i = 0; $i <= count($exerciseData) - 1; $i++ ) {
            
            // If the user is an admin, or if the user is a trainer and wrote the article, they are able to view, edit and create exercises
            if ( ( $_SESSION['userPermissions'] == 3 ) or ( ( $_SESSION['userPermissions'] == 2 ) and ( $_SESSION['userID'] == $exerciseData[$i][0] ) ) ) {

                // Displays all exercise information
                echo ("
                    <h2 class='centerHeader'>Exercise Information:</h2>

                    <div class='list-group-item postContainer text-center'>
                        <p>ID: <b>{$exerciseData[$i][0]}</b></p>
                        <p>Name: {$exerciseData[$i][1]}</p>
                        <p>Area: {$exerciseData[$i][2]}</p> 
                        <p>Muscle: {$exerciseData[$i][3]}</p> 
                        <p>Description: {$exerciseData[$i][4]}</p> 
                        <p>Instructions: {$exerciseData[$i][5]}</p>
                        <p>Author: {$exerciseData[$i][6]}</p>

                        <a href='{$path}views/testDelete.php?id={$exerciseData[$i][0]}&table=exercise' class='btn redButton'>Delete</a> 
                        <a href='{$path}views/testEdit.php?id={$exerciseData[$i][0]}&table=exercise' class='btn greenButton'>Edit</a>
                    </div>
                ");

            } // Ends if userID check

        } // Ends exerciseData for loop

        echo ("
            <hr />
            <a href='<?php echo $path; ?>views/testCreate.php?table=exercise' class='btn blueButton'>Create Exercise</a>
            <hr />
        ");

    ?>

</div>

<div class="col-sm-1"></div> 