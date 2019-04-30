<div class="col-sm-1"></div> 

<div class="col-sm-10">

    <h2 class="centerHeader">Exercise Listing:</h2>

    <?php

        // Gets all exercise information
        $exerciseData = $exerciseDB->getAllExercises();

        // Loops through all exercises
        for ( $i = 0; $i <= count($exerciseData) - 1; $i++ ) {
            
            // Displays all exercise information
            echo "
                <div class='list-group-item postContainer text-center'>
                    <p>Name: {$exerciseData[$i][1]}</p>
                    <p>Author: {$exerciseData[$i][6]}</p>
                    <a href='../../views/individualExercise/index.php?id={$exerciseData[$i][0]}' class='btn blueButton'>View Exercise</a>
                </div>
            ";

        } // Ends exerciseData for loop

    ?>

</div>

<div class="col-sm-1"></div> 