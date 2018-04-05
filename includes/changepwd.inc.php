<?php
session_start();
	if (isset($_POST['submit'])) {
		include_once 'dbh.inc.php';
		$id = $_SESSION['u_id'];
		$oldPwd = mysqli_real_escape_string($_POST['oldPwd']);
		$newPwd = mysqli_real_escape_string($_POST['newPwd']);
		// De-hashing the old password
		$sql = "SELECT * FROM users WHERE user_id=$id";
		$result = mysqli_query($conn, $sql);
		if ($row = mysqli_fetch_assoc($result)) {
			$hashedPwdCheck = password_verify($oldPwd, $row['user_pwd']);
	 			if ($hashedPwdCheck == false) {
	 				header("Location: ../account.php?pwd_change=error");
					exit();
	 		} elseif ($hashedPwdCheck == true) {
	 			// Update the data in DB
	 			$hashedNewPwd = password_hash($newPwd, PASSWORD_DEFAULT);
	 			$sql = "UPDATE users SET user_pwd='$hashedNewPwd' WHERE user_id=$id";
				$result = mysqli_query($conn, $sql);
				header("Location: ../account.php?pwd_change=success");
				session_unset();
				session_destroy();
				exit();
	 		}
		}
	}
