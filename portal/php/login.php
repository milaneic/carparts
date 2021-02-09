<?php

if (isset($_POST['submit'])) {

	require 'dbConfig.php';

	$emailUid = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE email=? OR username=?";
	$stmt = mysqli_stmt_init($db);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("Location:../index.php?error=sqlerror");
		exit();
	} else {
		mysqli_stmt_bind_param($stmt, "ss", $emailUid, $emailUid);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($result)) {
			$pwdCheck = password_verify($password, $row['password']);

			if ($pwdCheck == false) {
				header("Location:../index.php?error==wrongpasswor");
				exit();
			} else {
				session_start();
				$_SESSION['userId'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['ime'] = $row['ime'];
				$_SESSION['prezime'] = $row['prezime'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['telefon'] = $row['telefon'];
				$_SESSION['adresa'] = $row['adresa'];
				$_SESSION['role'] = $row['role'];
				if ($row['role'] == 1) {
					header("Location:../admin.php");
				} else {
					header("Location:../index.php?login=success");
				}
			}
		} else {
			header("Location:../index.php?login_error");
		}
	}
} else {
	header("Location:../index.php?dsadada");
}
