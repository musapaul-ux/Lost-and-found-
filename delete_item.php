<?php
session_start();
if (!isset($_SESSION['admin'])) die("Unauthorized");

include 'db.php';
$id = (int)$_GET['id'];

$conn->query("DELETE FROM items WHERE id=$id");
header("Location: admin_dashboard.php");
