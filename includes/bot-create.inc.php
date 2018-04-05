<?php
if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$name = mysqli_real_escape_string($conn, $_POST['name']);
  $desc = mysqli_real_escape_string($conn, $_POST['desc']);
	$owner = mysqli_real_escape_string($conn, $_POST['owner']);
	$lang = mysqli_real_escape_string($conn, $_POST['lang']);
	$node = mysqli_real_escape_string($conn, $_POST['node']);

	// Error Handlers
	// Checks for empty fields
	if (empty($owner) || empty($name) || empty($desc) || empty($lang) || empty($node)) {
		header("Location: ../admin/bot-create.php?create=empty_fields");
		exit();
	} else {
		// Checking if Node exists
		$sql = "SELECT * FROM nodes WHERE node_id=$node;";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck == 0) {
			header("Location: ../admin/bot-create.php?create=node_false");
			exit();
		}
		// Checking if owner ID exists
		$sql = "SELECT * FROM users WHERE user_id=$owner;";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck == 0) {
			header("Location: ../admin/bot-create.php?create=owner_false");
			exit();
		} elseif ($resultCheck >= 1) {
			// Insert the user into the Database
			$sql = "INSERT INTO bots (bot_name, bot_desc, bot_owner, bot_lang, bot_node) VALUES ('$name', '$desc', $owner, '$lang', $node);";
			mysqli_query($conn, $sql);
			// Add a count to the Node database
			$sql = "SELECT node_bots FROM nodes WHERE node_id=$node;";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			$oldCount = $row['node_bots'];
			$newCount = $oldCount + 1;
			$sql = "UPDATE nodes SET node_bots=$newCount WHERE node_id=$node;";
			mysqli_query($conn, $sql);
			header("Location: ../admin/bot-create.php?create=success");
			exit();
			}
	}
} else {
	header("Location: ../admin/bot-create.php?create=error");
	exit();
}
