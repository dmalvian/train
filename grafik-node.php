<?php
	session_start();
	include_once 'conn.php';
	if (!isset($_SESSION['username'])) {
		header("location: login.php");
	}
	
	$node = $_GET['id'];
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
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Grafik Per Node</title>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script src="assets/js/jquery-3.2.0.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/highcharts.js"></script>
		<script>
			$(function() {
				Highcharts.setOptions({
					global: {
						useUTC: false
					}
				});
				var nodeData = JSON.parse('<?php echo json_encode($r); ?>');
	
				$('#grafik_sensor').highcharts({
					chart: {
						type: 'line',
						animation: Highcharts.svg,
						marginRight: 10,
						events: {
							load: function () {

								var seriesX = this.series[0],
									seriesY = this.series[1],
									seriesZ = this.series[2],
									seriesA = this.series[3];
								setInterval(function () {
									var node = "<?php echo $node; ?>";
									
									$.ajax({
										type	: 'POST',
										url		: 'get-grafik-node.php',
										data	: {id : node},
										success	: function(response) {
											var dataNode = JSON.parse(response);
											seriesX.setData(dataNode.x, true);
											seriesY.setData(dataNode.y, true);
											seriesZ.setData(dataNode.z, true);
											seriesA.setData(dataNode.a, true);
										}
									});
								}, 5000);
							}
						}
					},
						title: {
						text: 'Data Sensor Getaran'
					},
					subtitle: {
						text: 'Data Sensor Per Node'
					},
					xAxis: {
						type: 'datetime',
						crosshair: true
					},
					yAxis: {
						title: {
							text: 'Nilai Sensor'
						}
					},
					plotOptions: {
						column: {
							pointPadding: 0.2,
							borderWidth: 0
						}
					},
					series: [{
							name: 'X',
							data: nodeData.x
						},
						{
							name: 'Y',
							data: nodeData.y
						},
						{
							name: 'Z',
							data: nodeData.z
						},
						{
							name: 'A',
							data: nodeData.a
						}]
				});
			});
		</script>
	</head>
	<body>
		<div id="grafik_sensor"></div>
	</body>
</html>