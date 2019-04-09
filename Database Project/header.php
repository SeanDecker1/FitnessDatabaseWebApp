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

                    <li><a class="navSpace" href="<?php echo $path; ?>views/Admin.php">Admin</a></li>
                    <li><a class="navSpace" href="<?php echo $path; ?>views/ExerciseListing.php">Exercises</a></li>
                    <li><a class="navSpace" href="<?php echo $path; ?>views/Areas.php">Areas</a></li>
                    <li><a class="navSpace" href="<?php echo $path; ?>views/Muscles.php">Muscles</a></li>
                    <li><a class="navSpace" href="<?php echo $path; ?>views/Trainers.php">Trainers</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li><a id="logout" class="navSpace" href="<?php echo $path; ?>logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>    

                </ul>
            </div>
        </nav>
        <!--- Ends Navbar --->
        