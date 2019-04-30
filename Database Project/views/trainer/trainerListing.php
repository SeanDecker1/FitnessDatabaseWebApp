<div class="col-sm-1"></div> 

<div class="col-sm-10">
<h2 class="centerHeader">Trainer Listing:</h2>

    <?php

        // Gets all user information
        $trainerData = $trainerDB->getTrainers();

        // Loops through all users
        for ( $i = 0; $i <= count($trainerData) - 1; $i++ ) {
            
            // Displays all user information
            echo "
                <div class='list-group-item postContainer text-center'>
                    <p>Name: {$trainerData[$i][1]}</p>
                    <p>Email: {$trainerData[$i][2]}</p> 
                </div>
            ";

        } // Ends trainerData for loop

    ?>

</div>

<div class="col-sm-1"></div> 