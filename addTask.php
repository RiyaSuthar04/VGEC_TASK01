// addTask.php
<?php
session_start();

if (file_exists("connection.php")) {
    include("connection.php");
} else {
    echo "Error: Could not find connection.php";
    exit();
}

if (isset($_POST['add']) && isset($_POST['date']) && isset($_SESSION['uid'])) {
    $task_name = $_POST['add'];
    $task_time = $_POST['date'];
    $uid = $_SESSION['uid'];

    $stmt = $conn->prepare("INSERT INTO task (uid, task_name, time) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $uid, $task_name, $task_time);

    if ($stmt->execute()) {
        echo "Task Added Successfully";
    } else {
        echo "Error adding task: " . $stmt->error; 
    }

    $stmt->close();
} else {
    echo "Invalid Request";
}

$conn->close();
?>
