<?php
	session_start();
	include_once 'conn.php';
	if (!isset($_SESSION['username'])) {
		header("location: login.php");
	}
	
	$node = $_POST['id'];
	$q = $link->prepare("(SELECT id, UNIX_TIMESTAMP(waktu) as waktu, x, y, z, a FROM tabelsensor2 WHERE sensorid = '".$node."' ORDER BY id DESC LIMIT 100) ORDER BY id");
	$r = array('x' => array(), 'y' => array(), 'z' => array(), 'a' => array());
	if ($q) {
		$q->execute();
		$q->bind_result($id, $dataWaktu, $x, $y, $z, $a);
		while ($q->fetch()) {
			$r['x'][] = array($dataWaktu * 1000, $x);
			$r['y'][] = array($dataWaktu * 1000, $y);
			$r['z'][] = array($dataWaktu * 1000, $z);
			$r['a'][] = array($dataWaktu * 1000, $a);
		}
	}

	echo json_encode($r);
?>