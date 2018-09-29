<?php
	session_start();
	include_once 'conn.php';
	
	if (isset($_GET['in'])) {
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		
		$q = $link->query("SELECT * FROM USER WHERE username = '".$user."' AND password = '".$pass."'");
		if ($q->num_rows > 0) {
			$r = $q->fetch_assoc();
			$_SESSION['username']	= $r['username'];
			$_SESSION['level']		= $r['level'];
			header("location: index.php");
		}
		else {
			header("location: login.php");
		}
	}
	elseif (isset($_GET['out'])) {
		unset($_SESSION['username']);
		unset($_SESSION['level']);
		header("location: login.php");
	}
?>