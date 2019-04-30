<?php 
        $page = 'Test Page';
        $path='./';
        include($path.'../FitnessDatabaseWebApp/header.php');

        require_once "{$path}classes/ExerciseAccess.class.php";
        $exerciseDB = new ExerciseAccess();

        require_once "{$path}classes/AdminAccess.class.php";
        $adminDB = new AdminAccess();
?>

<?php
    include ($path.'../FitnessDatabaseWebApp/views/login/index.php');
?> 

<?php
    include ($path.'../FitnessDatabaseWebApp/footer.php');
?> 