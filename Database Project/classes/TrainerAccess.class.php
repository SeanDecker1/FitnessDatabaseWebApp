<?php

    //*********************************************
    // FILE CONTENTS:
    // 1. DATABASE CONNECTION/CONSTRUCTOR
    // 2. FUNCTIONS FOR TRAINER QUERIES
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
        // 2. BEGINS FUNCTIONS FOR TRAINER QUERIES
        //*********************************************

        // DESCRIPTION: This function returns information for every user that is of type trainer.
        // RETURNS: Array of IDs, names, and emails for every trainer.
        function getTrainers() {

            // Executes query
            try {

                $data = array();
                $stmt = $this->dbh->prepare( "
                    SELECT user.userID, user.userName, user.userEmail
                    FROM user
                    WHERE ( userType = 2 )
                " );
                $stmt->execute();

                while ( $trainer = $stmt->fetch() ) {
                    $data[] = $trainer;
                }

                return $data;

            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            } // Ends try catch

        } // Ends getTrainers()

        //*********************************************
        // ENDS FUNCTIONS FOR TRAINER QUERIES
        //*********************************************

    } // Ends class