<?php
session_start();
include_once 'dbh.inc.php';
$id = $_POST['id'];
$sql = "DELETE FROM nodes WHERE node_id=$id";
$result = mysqli_query($conn, $sql);
header("Location: ../admin/node-delete.php?delete=success");
exit();
