<?php
session_start();
include_once 'dbh.inc.php';
$id = $_POST['id'];
$sql = "SELECT * FROM users WHERE user_id = $id;";
$result = mysqli_query($conn, $mysql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck > 0) {
  $sql = "DELETE FROM users WHERE user_id=$id";
  mysqli_query($conn, $sql);
  header("Location: ../admin/user-manage.php?delete=success");
  exit();
} else {
  header("Location: ../admin/user-manage.php?delete=no_user");
  exit();
}
