<?php
$conn = mysqli_connect("localhost", "root", "", "vgec_task01");
if (mysqli_connect_errno()) {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>