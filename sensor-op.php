<?php
	include_once 'conn.php';
	
	function delFoto($link, $id) {
		$q = $link->query("SELECT foto FROM tambah WHERE id_sensor = '".$id."'");
		$r = $q->fetch_assoc();
		$path = "foto/" . $r['foto'];
		if (file_exists($path)) {
			unlink($path);
		}
	}

	if (isset($_POST['op'])) {
		$op				= $_POST['op'];
		$nama_sensor	= $_POST['nama_sensor'];
		$id_sensor		= $_POST['id_sensor'];
		$letak_sensor	= $_POST['letak_sensor'];
		$spek_sensor	= $_POST['spek_sensor'];
		$gambar			= $_FILES['foto'];
		$target_path	= "assets/upload/";
	
		if ($op == "Submit") {
			if (!empty($gambar['tmp_name'])) {
				$tmp			= explode(".", basename($gambar['name']));
				$ext			= end($tmp);
				
				$new_name		= md5(uniqid()) . "." .$ext;
				$target_path	= $target_path . $new_name;
				move_uploaded_file($gambar['tmp_name'], $target_path);
			}
			else {
				$target_path = "";
				$new_name = "";
			}
			$link->query("INSERT INTO tambah VALUES('$nama_sensor', '$id_sensor', '$letak_sensor', '$spek_sensor', '$new_name')");	
		}
		
		elseif ($op == "Update") {
			if (!empty($gambar['tmp_name'])) {
				$tmp			= explode(".", basename($gambar['name']));
				$ext			= end($tmp);
				
				$new_name		= md5(uniqid()) . "." .$ext;
				$target_path	= $target_path . $new_name;
			}
			else {
				$new_name = "";
				$target_path = "";
			}
			
			if (isset($_POST['change'])) {
				if ($_POST['change'] == "yes") {
					delFoto($link, $id_sensor);
					if (!empty($gambar['tmp_name'])) move_uploaded_file($gambar['tmp_name'], $target_path);
					$link->query("UPDATE tambah SET nama_sensor='$nama_sensor', id_sensor='$id_sensor', letak_sensor='$letak_sensor', spek_sensor='$spek_sensor', foto='$new_name' WHERE id_sensor='$id_sensor'");
				}
				else {
					$link->query("UPDATE tambah SET nama_sensor='$nama_sensor', id_sensor='$id_sensor', letak_sensor='$letak_sensor', spek_sensor='$spek_sensor' WHERE id_sensor='$id_sensor'");
				}
			}
			else {
				if (!empty($gambar['tmp_name'])) move_uploaded_file($gambar['tmp_name'], $target_path);
				$link->query("UPDATE tambah SET nama_sensor='$nama_sensor', id_sensor='$id_sensor', letak_sensor='$letak_sensor', spek_sensor='$spek_sensor', foto='$new_name' WHERE id_sensor='$id_sensor'");
			}
		}
	}
	elseif (isset($_GET['del'])) {
		$id_sensor = $_GET['id_sensor'];
		$link->query("DELETE FROM tambah WHERE id_sensor='".$id_sensor."'");
		delFoto($link, $id_sensor);
	}
	
	header("location: index.php?page=sensor");
?>