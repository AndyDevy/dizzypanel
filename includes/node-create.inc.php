<?php
if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$ip = mysqli_real_escape_string($conn, $_POST['ip']);
	$ram = mysqli_real_escape_string($conn, $_POST['ram']);
	$limit = mysqli_real_escape_string($conn, $_POST['bot-limit']);
	$code = mysqli_real_escape_string($conn, $_POST['code']);
	$locat = mysqli_real_escape_string($conn, $_POST['locat']);

	// Error Handlers
	// Checks for empty fields
	if (empty($ip) || empty($ram) || empty($limit) || empty($code) || empty($locat)) {
		header("Location: ../admin/node-create.php?create=empty_fields");
		exit();
	} else {
		// Checking if node IP is already stored
		$sql = "SELECT * FROM nodes WHERE node_ip='$ip';";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck != 0) {
			header("Location: ../admin/node-create.php?create=ip_exists");
			exit();
		} else {
			// Insert the node into the Database
			$sql = "INSERT INTO nodes (node_ip, node_ram, node_bots, node_limit, node_code, node_locat) VALUES ('$ip', $ram, 0, $limit, '$code', '$locat');";
			mysqli_query($conn, $sql);
			header ("Location: ../admin/node-create.php?create=success");
		}
	}
} else {
	header("Location: ../admin/node-create.php?create=error");
	exit();
}
