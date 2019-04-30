<div class="col-sm-1"></div> 

<div class="col-sm-10">

    <h2 class="centerHeader">Muscle Listing:</h2>

    <?php

        // Gets all muscle information
        $muscleData = $muscleDB->getMuscles();

        // Loops through all muscles
        for ( $i = 0; $i <= count($muscleData) - 1; $i++ ) {

            $exerciseData = $muscleDB->getExercisesByMuscle( $muscleData[$i][0] );

            // Displays all muscle information
            echo "
                <h2>Muscle: {$muscleData[$i][1]}</h2>

                <div class='list-group-item postContainer text-center'>
                    <p>Exercise Name: {$exerciseData[0][1]}</p>
                    <a href='../../views/individualExercise/index.php?id={$muscleData[$i][0]}' class='btn blueButton'>View Exercise</a>
                </div>

                <hr/>
            ";

        } // Ends muscleData for loop

    ?>

</div>

<div class="col-sm-1"></div>