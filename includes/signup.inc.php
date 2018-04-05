<?php
if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	// Error Handlers
	// Checks for empty fields

	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
		header("Location: ../admin/user-manage.php?create=empty_fields");
		exit();
	} else {
		// Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
			header("Location: ../admin/user-manage.php?create=invalid");
			exit();
		} else {
			// Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../admin/user-manage.php?create=email_not_valid");
				exit();
			} else {
				$sql = "SELECT * FROM users WHERE user_uid='$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: ../admin/user-manage.php?create=user_taken");
					exit();
				} else {
					// Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					// Generating a random token
					$token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM()';
					$token = str_shuffle($token);
					$token = substr($token, 0, 12);

					// Insert the user into the Database
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd, user_rank) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd', 0);";
					mysqli_query($conn, $sql);

					header("Location: ../admin/user-manage.php?user_creation=success");
					exit();
				}
			}
		}
	}

} else {
	header("Location: ../admin/user-manage.php?user_creation=error");
	exit();
}
