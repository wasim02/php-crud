<?php
    $conn = new mysqli('db', 'root', 'example', 'mysql');
    if (isset($_GET['id'])) {
        $taskId = $_GET['id'];
        $conn->query("DELETE FROM tasks WHERE task_id=$taskId") or die($conn->error);
    }
    header("location: index.php");
