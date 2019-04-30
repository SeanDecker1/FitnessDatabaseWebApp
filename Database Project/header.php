<!DOCTYPE html>
<html lang="en">
    <head>

        <?php 
            // Initiate the session
            session_start();
        ?>

        <meta charset="utf-8">

        <!-- Imports bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Imports styles -->
        <link rel="stylesheet" href="<?php echo $path; ?>assets/css/style.css">
        
        <title>Exercise Site</title>
    </head>
    <body>

        <!--- Begins Navbar --->
        <nav class="navbar navbarCustom">
            <div class="container-fluid">
                <div class="navbar-header">
                    <div class="navbar-brand navSpace"><?php echo $page; ?></div>
                </div>
                <ul class="nav navbar-nav">

                    <?php 
                        // If the user is a trainer or admin, they have access to the admin page
                        if ( isset( $_SESSION['userPermissions'] ) and ( ( $_SESSION['userPermissions'] == 2 ) or ( $_SESSION['userPermissions'] == 3 ) ) ) {
                            echo ("
                                <li><a class='navSpace' href='{$path}views/admin/index.php'>Admin</a></li>
                            ");
                        }
                    ?>  
                    <li><a class="navSpace" href="<?php echo $path; ?>views/exercise/index.php">Exercises</a></li>
                    <li><a class="navSpace" href="<?php echo $path; ?>views/area/index.php">Areas</a></li>
                    <li><a class="navSpace" href="<?php echo $path; ?>views/muscle/index.php">Muscles</a></li>
                    <li><a class="navSpace" href="<?php echo $path; ?>views/trainer/index.php">Trainers</a></li>

                </ul>

                <?php 
                    // Logout button appears if the user has logged in
                    if ( isset( $_SESSION['loggedIn'] ) and ( $_SESSION['loggedIn'] ) ) {
                        echo ("
                            <ul class='nav navbar-nav navbar-right'>
                                <li><a id='logout' class='navSpace' href='{$path}views/testLogin.php?action=logout'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>
                            </ul>
                        ");
                    }
                ?>

            </div>
        </nav>
        <!--- Ends Navbar --->
        