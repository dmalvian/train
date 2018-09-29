<?php
	include_once 'conn.php';
	
	if (isset($_POST['op'])) {
		$op = $_POST['op'];
		$id_user	= $_POST['id_user'];
		$nama_user	= $_POST['nama_user'];
		$username	= $_POST['username'];
		$pass		= $_POST['pass'];

		if ($op == "Submit") {
			$level = $_POST['level'];
			$link->query("INSERT INTO user VALUES('".$id_user."', '".$nama_user."', '".$username."', '".$pass."', '".$level."')");
		}
		elseif ($op == "Update") {
			$link->query("UPDATE user SET id_user='".$id_user."', nama_user='".$nama_user."', username='".$username."', password='".$pass."' WHERE id_user='".$id_user."'");
		}
	}
	elseif (isset($_GET['del'])) {
		$id_user = $_GET['id_user'];
		$link->query("DELETE FROM user WHERE id_user='".$id_user."'");
	}
	
	header("location: index.php?page=user");
?>