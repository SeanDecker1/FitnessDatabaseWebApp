<div class="col-sm-1"></div> 

<div class="col-sm-10">

    <h2 class="centerHeader">Area Listing:</h2>

    <?php

        // Gets all area information
        $areaData = $areaDB->getAreas();

        // Loops through all areass
        for ( $i = 0; $i <= count($areaData) - 1; $i++ ) {
            
            $exerciseData = $areaDB->getExercisesByArea( $areaData[$i][0] );

            // Displays all area information
            echo "
                <h2>Area: {$areaData[$i][1]}</h2>

                <div class='list-group-item postContainer text-center'>
                    <p>Exercise Name: {$exerciseData[0][1]}</p>
                    <a href='../../views/individualExercise/index.php?id={$areaData[$i][0]}' class='btn blueButton'>View Exercise</a>
                </div>

                <hr/>
            ";

        } // Ends areaData for loop

    ?>

</div>

<div class="col-sm-1"></div>