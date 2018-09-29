<?php
	session_start();
	include_once 'conn.php';
	if (!isset($_SESSION['username'])) {
		header("location: login.php");
	}
	
	$sumbu = $_POST['sumbu'];
	$r = array('n1' => array(),
				'n2' => array(),
				'n3' => array(),
				'n4' => array(),
				'n5' => array(),
				'n6' => array(),
				'n7' => array(),
				'n8' => array());
	$i = 1;
	foreach ($r as $node => $v) {
		$q = $link->prepare("(SELECT id, UNIX_TIMESTAMP(waktu) as waktu, ".$sumbu." FROM tabelsensor2 WHERE sensorid = '".$i."' ORDER BY id DESC LIMIT 100) ORDER BY id");
		if ($q) {
			$q->execute();
			$q->bind_result($id, $dataWaktu, $dataSumbu);
			while ($q->fetch()) {
				$r[$node][] = array($dataWaktu * 1000, $dataSumbu);
			}
		}
		$i += 1;
	}
	
	echo json_encode($r);
?>