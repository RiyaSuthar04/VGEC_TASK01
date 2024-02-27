<?php
session_start();
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $taskId = $_POST['id'];
    $updatedTaskName = $_POST['task_name'];
    $updatedTime = $_POST['time'];

    $stmt = $conn->prepare("UPDATE task SET task_name = ?, time = ? WHERE id = ?");
    $stmt->bind_param("sss", $updatedTaskName, $updatedTime, $taskId);

    if ($stmt->execute()) {
        echo "Task updated successfully";
    } else {
        echo "Error updating task: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>