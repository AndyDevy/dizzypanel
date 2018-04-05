<?php
if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';
  session_start();

  $sender = $_SESSION['u_id'];
  $t_id = $_GET['ticket_id'];

      // Update the ticket's status depending on the user's rank
      $sql = "UPDATE tickets SET ticket_status='Closed' WHERE ticket_id=$t_id;";
      mysqli_query($conn, $sql);
      // Terminate
      header("Location: ../ticket-review.php?ticket_id=$t_id&close=success");
      exit();
} else {
	header("Location: ../ticket-review.php?ticket_id=$t_id&close=error");
	exit();
}
