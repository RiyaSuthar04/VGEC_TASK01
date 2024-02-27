<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("connection.php");

    $taskId = $_POST['id'];
    $query = "DELETE FROM task WHERE id = '$taskId'";
    $statement = $conn->prepare($query);
    $success = $statement->execute();
    
    if ($success) {
        echo "Task deleted successfully!";
    } else {

        echo "Error deleting task.";
    }
} else {
    echo "Invalid request method.";
}
?>