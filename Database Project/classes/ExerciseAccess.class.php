<?php

    //*********************************************
    // FILE CONTENTS:
    // 1. DATABASE CONNECTION/CONSTRUCTOR
    // 2. FUNCTIONS FOR EXERCISE QUERIES
    // 3. FUNCTIONS FOR AREA QUERIES
    // 4. FUNCTIONS FOR MUSCLE QUERIES
    //********************************************* 

    class DB {

        private $dbh;

        //*********************************************
        // 1. BEGINS DATABASE CONNECTION/CONSTRUCTOR
        //*********************************************

        // Connects to the database
        function __construct() {

            //*********************************************
            // THIS WILL ALL NEED TO CHANGE
            //*********************************************
            try {
                $this->dbh = new PDO("mysql:host={$_SERVER['DB_SERVER']};dbname={$_SERVER['DB']}",$_SERVER['DB_USER'],$_SERVER['DB_PASSWORD']);
            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            } // Ends try catch

        } // Ends constuctor

        //*********************************************
        // ENDS DATABASE CONNECTION/CONSTRUCTOR
        // 2. BEGINS FUNCTIONS FOR EXERCISE QUERIES
        //*********************************************

        // DESCRIPTION: This function returns information for one exercise.
        // RETURNS: Array of all exercise information in the database for the specified exercise.
        // ARGUMENTS: exerID of the exercise to be returned.
        function getExercise( selectID ) {

            // Executes query
            try {

                $data = array();
                $stmt = $this->dbh->prepare( "
                    SELECT exercise.exerID, exercise.exerName, 
                    area.areaName, muscle.muscleName, 
                    exercise.exerDescription, exercise.exerInstructions
                    FROM exercise
                    JOIN area
                    ON exercise.exerArea = area.areaID
                    JOIN muscle
                    ON exercise.exerMuscle = muscle.muscleName
                    WHERE ( exercise.exerID = {$selectID} )
                " );
                $stmt->execute();

                while ( $exercise = $stmt->fetch() ) {
                    $data[] = $exercise;
                }

                return $data;

            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            } // Ends try catch

        } // Ends getExercise()

        // DESCRIPTION: This function returns all exercise information for all exercises in the database.
        // RETURNS: Array of all exercises and exercise information in the database.
        function getAllExercises() {

            // Executes query
            try {

                $data = array();
                $stmt = $this->dbh->prepare( "
                    SELECT exercise.exerID, exercise.exerName, 
                    area.areaName, muscle.muscleName, 
                    exercise.exerDescription, exercise.exerInstructions
                    FROM exercise
                    JOIN area
                    ON exercise.exerArea = area.areaID
                    JOIN muscle
                    ON exercise.exerMuscle = muscle.muscleName
                " );
                $stmt->execute();

                while ( $exercise = $stmt->fetch() ) {
                    $data[] = $exercise;
                }

                return $data;

            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            } // Ends try catch

        } // Ends getAllExercises()

        // DESCRIPTION: This function returns information of all exercises with the same area that is passed in.
        // RETURNS: Array of all exercise information in the database.
        // ARGUMENTS: exerArea for the exercises that exercise that area.
        function getExercisesByArea( selectArea ) {

            // Executes query
            try {

                $data = array();
                $stmt = $this->dbh->prepare( "
                    SELECT exerID, exerName
                    FROM exercise
                    WHERE ( exerArea = {$selectArea} )
                " );
                $stmt->execute();

                while ( $exercise = $stmt->fetch() ) {
                    $data[] = $exercise;
                }

                return $data;

            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            } // Ends try catch

        } // Ends getExercisesByArea()

        // DESCRIPTION: This function returns information of all exercises with the same muscle that is passed in.
        // RETURNS: Array of all exercise information in the database.
        // ARGUMENTS: exerMuscle for the exercises that exercise that muscle.
        function getExercisesByMuscle( selectMuscle ) {

            // Executes query
            try {

                $data = array();
                $stmt = $this->dbh->prepare( "
                    SELECT exerID, exerName
                    FROM exercise
                    WHERE ( exerMuscle = {$selectMuscle} )
                " );
                $stmt->execute();

                while ( $exercise = $stmt->fetch() ) {
                    $data[] = $exercise;
                }

                return $data;

            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            } // Ends try catch

        } // Ends getExercisesByMuscle()

        //*********************************************
        // ENDS FUNCTIONS FOR EXERCISE QUERIES
        // 3. BEGINS FUNCTIONS FOR AREA QUERIES
        //*********************************************

        // DESCRIPTION: This function returns all area information for each area in the database.
        // RETURNS: Array of all area information in the database.
        function getAreas() {

            // Executes query
            try {

                $data = array();
                $stmt = $this->dbh->prepare( "
                    SELECT areaID, areaName
                    FROM area
                " );
                $stmt->execute();

                while ( $area = $stmt->fetch() ) {
                    $data[] = $area;
                }

                return $data;

            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            } // Ends try catch

        } // Ends getAreas()

        //*********************************************
        // ENDS FUNCTIONS FOR AREA QUERIES
        // 4. BEGINS FUNCTIONS FOR MUSCLE QUERIES
        //*********************************************

        // DESCRIPTION: This function returns all muscle information for each muscle in the database.
        // RETURNS: Array of all muscle information in the database.
        function getMuscles() {

            // Executes query
            try {

                $data = array();
                $stmt = $this->dbh->prepare( "
                    SELECT muscleID, muscleName
                    FROM muscle
                " );
                $stmt->execute();

                while ( $muscle = $stmt->fetch() ) {
                    $data[] = $muscle;
                }

                return $data;

            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            } // Ends try catch

        } // Ends getMuscles()

        //*********************************************
        // ENDS FUNCTIONS FOR MUSCLE QUERIES
        //*********************************************

    } // Ends class