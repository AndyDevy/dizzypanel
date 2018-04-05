<?php
if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';
  session_start();
	// Getting user's rank
	$uid = $_SESSION['u_uid'];
	$sql = "SELECT * FROM users WHERE user_uid='$uid'";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	if (!resultCheck < 1) {
	    if ($row = mysqli_fetch_assoc($result)) {
	        $userRank = $row['user_rank'];
	    }
	}

  $sender = $_SESSION['u_id'];
  $t_id = $_GET['ticket_id'];
  $msg = mysqli_real_escape_string($conn, $_POST['message']);

	// Error Handlers
	// Checks for empty fields
	if (empty($msg)) {
		header("Location: ../ticket-review.php?ticket_id=$t_id&reply=empty_fields");
		exit();
	}
			// Insert the message into the Database
			$sql = "INSERT INTO messages (msg_ticket, msg_sender, msg_content) VALUES ($t_id, $sender, '$msg');";
			mysqli_query($conn, $sql);

			// Update the ticket's status depending on the user's rank
			if ($userRank >= 1) {
				$sql = "UPDATE tickets SET ticket_status='Answered by Staff' WHERE ticket_id=$t_id;";
				mysqli_query($conn, $sql);
			} elseif ($userRank == 0) {
				$sql = "UPDATE tickets SET ticket_status='Answered by User' WHERE ticket_id=$t_id;";
				mysqli_query($conn, $sql);
			}

      // Terminate
      header("Location: ../ticket-review.php?ticket_id=$t_id&reply=success");
      exit();
} else {
	header("Location: ../ticket-review.php?ticket_id=$t_id&reply=error");
	exit();
}
