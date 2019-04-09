<?php

    //*********************************************
    // FILE CONTENTS:
    // 1. DATABASE CONNECTION/CONSTRUCTOR
    // 2. FUNCTIONS FOR LOGGING
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
        // 2. BEGINS FUNCTIONS FOR LOGGING
        //*********************************************

        // DESCRIPTION: This function checks to see if the information entered is crrect to login a user.
        // RETURNS: Boolean of true if information matches, or false if information does not match any record.
        // ARGUMENTS: userEmail and userPassword entered in from a form.
        function login( $inputEmail, $inputPassword ) {

            // Executes query
            try {

                $data = array();
                $stmt = $this->dbh->prepare( "
                    SELECT userID 
                    FROM user 
                    WHERE ( userEmail LIKE '{$inputEmail}' )
                    AND ( userPassword LIKE '{$inputPassword}' )
                " );
                $stmt->execute();

                while ( $user = $stmt->fetch() ) {
                   $data[] = $user;
                }

                if ( count($data) == 1 ) {
                    return true;
                } else {
                    return false;
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            } // Ends try catch

        } // Ends login()

        // DESCRIPTION: This function logs the user out and returns them to the login page.
        function logout() {

            $_SESSION['loggedIn'] = false;
            session_unset();
            session_destroy();
            header("Location: {$path}index.php");

        } // Ends logout()

        //*********************************************
        // ENDS FUNCTIONS FOR LOGGING
        //*********************************************

    } // Ends class