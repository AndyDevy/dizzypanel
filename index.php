<?php
session_start();
if (isset($_SESSION['u_id'])) {
	header("Location: dashboard.php");
} else {
	header("Location: login.php?login");
}
