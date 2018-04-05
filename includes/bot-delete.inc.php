<?php
session_start();
include 'dbh.inc.php';
// Deleting from bot DB
$id = $_POST['id'];
$sql = "SELECT bot_node FROM bots WHERE bot_id=$id;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck > 0) {
  $row = mysqli_fetch_assoc($result);
  $nodeId = $row['bot_node'];
  $sql = "DELETE FROM bots WHERE bot_id=$id";
  mysqli_query($conn, $sql);
  // Substracting the bot to the node's bot count.
  $sql = "SELECT node_bots FROM nodes WHERE node_id=$nodeId";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $oldCount = $row['node_bots'];
  $newCount = $oldCount - 1;
  $sql = "UPDATE nodes SET node_bots=$newCount WHERE node_id=$nodeId;";
  mysqli_query($conn, $sql);
  header("Location: ../admin/bot-manage.php?delete=success");
  exit();
} else {
  header("Location: ../admin/bot-manage.php?delete=no_bot");
  exit();
}
