<?php

    // define('DB_HOST', 'docker-php_db_1');
    // define('DB_USERNAME', 'root');
    // define('DB_PASSWORD', 'example');
    // define('DB_NAME', 'mysql');
    // $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $conn = mysqli_connect('db', 'root', 'example', 'mysql');
    
    // Check Connection
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

?>