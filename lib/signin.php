<?php
if (isset($_POST['loginid'])) {
	require 'dbcon.php';

	$loginid = $_POST['loginid'];
	$loginpass = $_POST['loginpass'];

	$sql = "SELECT * FROM `tbl_users` WHERE username = '{$_POST['loginid']}' OR email = '{$_POST['loginid']}'";
	$result = $conn->query($sql);
	$num_row = $result->num_rows;
		
	if ($num_row == 1) {
		$row = $result->fetch_assoc();
		$pwdchk = password_verify($loginpass, $row['password']);
		if ($pwdchk == false) {
			header("Location: ../login?wrongpass");
		}elseif ($pwdchk == true) {
			session_start();
			$_SESSION['userid'] = $row['id'];
			$_SESSION['user_name'] = $row['username'];
			$_SESSION['user_email'] = $row['email'];
			header("Location: ../home");
		}
	}else{
		header("Location: ../login?nouser");
	}	
}