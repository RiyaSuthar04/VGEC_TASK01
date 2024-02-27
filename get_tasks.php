<?php
session_start();
include("connection.php");

$uid = $_SESSION['uid'];
$sql = "SELECT id, uid, task_name, time FROM task WHERE uid='$uid'";



if ($result = $conn->query($sql)) {
    $tasks = array();
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($tasks);
} else {
    echo json_encode(array('error' => "Error executing query: " . $conn->error));
}

$conn->close();
?>