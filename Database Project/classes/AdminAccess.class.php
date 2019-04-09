<?php

    //*********************************************
    // FILE CONTENTS:
    // 1. DATABASE CONNECTION/CONSTRUCTOR
    // 2. FUNCTIONS FOR USER QUERIES
    // 3. FUNCTIONS FOR EXERCISE QUERIES
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
        // 1. BEGINS FUNCTIONS FOR USER QUERIES
        //*********************************************

        // DESCRIPTION: This function returns all user information for all users in the database.
        // RETURNS: Array of all users and user information in the database
        function getUsers() {

            // Executes query
            try {

                $data = array();
                $stmt = $this->dbh->prepare( "
                    SELECT user.userID, user.userName, user.userEmail, user.userPassword, user_type.typeName
                    FROM user
                    JOIN user_type
                    ON user.userType = user_type.typeID
                " );
                $stmt->execute();

                while ( $user = $stmt->fetch() ) {
                    $data[] = $user;
                }

                return $data;

            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            } // Ends try catch

        } // Ends getUsers

        // DESCRIPTION: This function returns all data for on user.  
        // RETURNS: Array with information on one user
        // ARGUMENTS: userID for user that will be displayed
        function getUser( selectedID ) {

            // Executes query
            try {

                $data = array();
                $stmt = $this->dbh->prepare( "
                    SELECT user.userID, user.userName, user.userEmail, user.userPassword, user_type.typeName
                    FROM user
                    JOIN user_type
                    ON user.userType = user_type.typeID
                    WHERE ( userID = {$selectedID} ) 
                " );
                $stmt->execute();

                while ( $user = $stmt->fetch() ) {
                    $data[] = $user;
                }

                return $data;

            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            } // Ends try catch

        } // Ends getUser

        // DESCRIPTION: This function updates a user record in the database. 
        // ARGUMENTS: Takes in userID of user to be updated along with
        // the updated userName, userPassword, userEmail, and userType.   
        function editUser( updateID, updateName, updatePassword, updateEmail, updateType ) {

            // Executes query
            try {

                $stmt = $this->dbh->prepare( "
                    UPDATE user
                    SET userName = '{$updateName}', userPassword = '{$updatePassword}', 
                    userEmail = '{$updateEmail}', userType = {$updateType}
                    WHERE ( userID = {$updateID} ) 
                " );
                $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            } // Ends try catch

        } // Ends editUser()

        // DESCRIPTION: This function adds a user to the database.
        // ARGUMENTS: Takes in userName, userPassword, userEmail, and userType for new user.   
        function createUser( createName, createPassword, createEmail, createType ) {

            // Executes query
            try {

                $stmt = $this->dbh->prepare( "
                    INSERT INTO user
                    ( userName, userPassword, userEmail, userType )
                    VALUES
                    ( '{$createName}', '{$createPassword}', '{$createEmail}', {$createType} )
                " );
                $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            } // Ends try catch

        } // Ends createUser()

        // DESCRIPTION: This function deletes a user record from the database.
        // ARGUMENTS: Takes in userID of the user that is to be deleted.   
        function deleteUser( deleteID ) {

            // Executes query
            try {

                $stmt = $this->dbh->prepare( "
                    DELETE FROM user
                    WHERE( userID = {$deleteID} )
                " );
                $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            } // Ends try catch

        } // Ends deleteUser()

        //*********************************************
        // ENDS FUNCTIONS FOR USER QUERIES
        // 2. BEGINS FUNCTIONS FOR EXERCISE QUERIES
        //*********************************************

        // DESCRIPTION: This function updates an exercise record in the database. 
        // ARGUMENTS: Takes in exerID of exercise to be updated along with
        // the updated exerName, exerArea, exerMuscle, exerDescription, exerInstructions, and authorUser.   
        function editExercise( editID, editName, editArea, editMuscle, editDescription, editInstructions, editAuthor ) {

            // Executes query
            try {

                // Updates record in exercise table
                $stmt = $this->dbh->prepare( "
                    UPDATE exercise
                    SET exerName = '{$editName}', exerArea = {$editArea}, 
                    exerMuscle = {$editMuscle}, exerDescription = {$editDescription},
                    exerInstructions = {$editInstructions}
                    WHERE ( exerID = {$editID} ) 
                " );
                $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            } // Ends try catch

        } // Ends editExercise()

        // DESCRIPTION: This function adds an exercise to the database. 
        // ARGUMENTS: Takes in exerName, exerArea, exerMuscle, exerDescription, exerInstructions,
        // and authorUser for an exercise to be created.   
        function createExercise( createName, createArea, createMuscle, createDesc, createInstr, createAuthor ) {

            // Executes query
            try {

                // Adds record to the exercise table
                $stmt = $this->dbh->prepare( "
                    INSERT INTO exercise
                    ( exerName, exerArea, exerMuscle, exerDescription, exerInstructions )
                    VALUES
                    ( '{$createName}', {$createArea}, {$createMuscle}, '{$createDesc}', '{$createInstr}' )
                " );
                $stmt->execute();

                // Gets the ID of the query
                $authorID = $dbh->lastInsertId();

                // Adds record to author table
                $stmt = $this->dbh->prepare( "
                    INSERT INTO author
                    ( authorUser, authorExer )
                    VALUES
                    ( {$authorID}, {$createAuthor} )
                " );
                $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            } // Ends try catch

        } // Ends createExercise()

        // DESCRIPTION: This function deletes an exercise record from the database.
        // ARGUMENTS: Takes in exerID of the exercise that is to be deleted.   
        function deleteExercise( deleteID ) {

            // Executes query
            try {

                // Deletes the record for the exercise table
                $stmt = $this->dbh->prepare( "
                    DELETE FROM exercise
                    WHERE( exerID = {$deleteID} )
                " );
                $stmt->execute();

                // Deletes the record from the author table
                $stmt = $this->dbh->prepare( "
                    DELETE FROM author
                    WHERE( authorExer = {$deleteID} )
                " );
                $stmt->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            } // Ends try catch

        } // Ends deleteExercise()

        //*********************************************
        // ENDS FUNCTIONS FOR EXERCISE QUERIES
        //*********************************************

    } // Ends class