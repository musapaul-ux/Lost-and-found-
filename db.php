<?php
$conn = new mysqli("localhost", "root", "", "lost_found");
if ($conn->connect_error) {
  die("DB Connection Failed: " . $conn->connect_error);
}
?>
