<?php
    // include_once("config.php");
    $conn = new mysqli('db', 'root', 'example', 'mysql');
    if (isset($_POST['save'])) {
        $name = $_POST['task'];

        $conn->query("INSERT INTO tasks (task_name) values('$name')") or 
                die($conn->error);
    }
    header('location: index.php');
