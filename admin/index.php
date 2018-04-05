<?php
	session_start();
	if (isset($_SESSION['u_id'])) {
		header("Location: home.php");
	} else {
		header("Location: ../index.php");
	}