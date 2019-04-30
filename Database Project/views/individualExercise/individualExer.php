<div class="col-sm-1"></div> 

<div class="col-sm-10">

    <?php

        // Gets all exercise information
        $exerciseData = $exerciseDB->getExercise( $_GET['id'] );

        // Loops through all exercises
        for ( $i = 0; $i <= count($exerciseData) - 1; $i++ ) {
            
            // Displays all exercise information
            echo "
                <h2 class='centerHeader'>{$exerciseData[$i][1]}</h2>

                <div class='list-group-item postContainer text-center'>
                    <p>Area: {$exerciseData[$i][2]}</p> 
                    <p>Muscle: {$exerciseData[$i][3]}</p> 
                    <p>Description: {$exerciseData[$i][4]}</p> 
                    <p>Instructions: {$exerciseData[$i][5]}</p>
                    <p>Author: {$exerciseData[$i][6]}</p>
                </div>
            ";

        } // Ends exerciseData for loop

    ?>

</div>

<div class="col-sm-1"></div> 