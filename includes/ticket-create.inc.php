<?php
if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';
  session_start();

  $sender = $_SESSION['u_id'];
	$subj = mysqli_real_escape_string($conn, $_POST['subject']);
  $msg = mysqli_real_escape_string($conn, $_POST['message']);

	// Error Handlers
	// Checks for empty fields
	if (empty($subj) || empty($msg)) {
		header("Location: ../ticket-submit.php?create=empty_fields");
		exit();
	}
			// Insert the ticket into the Database
			$sql = "INSERT INTO tickets (ticket_subject, ticket_sender, ticket_status) VALUES ('$subj', $sender, 'Open');";
			mysqli_query($conn, $sql);

      // Get the ticket's ID for later uses
      $sql = "SELECT ticket_id FROM tickets WHERE ticket_sender = $sender AND ticket_subject = '$subj';";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $ticket_id = $row['ticket_id'];

			// Insert the message into the Database
      $sql = "INSERT INTO messages (msg_ticket, msg_sender, msg_content) VALUES ($ticket_id, $sender, '$msg');";
      mysqli_query($conn, $sql);

      // Terminate
      header("Location: ../ticket-review.php?ticket_id=$ticket_id");
      exit();
} else {
	header("Location: ../ticket-submit.php?submit=error");
	exit();
}
