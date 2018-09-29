<?php
	session_start();
	include_once 'conn.php';
	if (!isset($_SESSION['username'])) {
		header("location: login.php");
	}
	
	$sumbu = $_GET['sumbu'];
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
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Grafik Sumbu <?php echo $sumbu; ?></title>
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
								var series1 = this.series[0],
									series2 = this.series[1],
									series3 = this.series[2],
									series4 = this.series[3],
									series5 = this.series[4],
									series6 = this.series[5],
									series7 = this.series[6],
									series8 = this.series[7];

								setInterval(function () {
									var s = "<?php echo $sumbu; ?>";
									
									$.ajax({
										type	: 'POST',
										url		: 'get-grafik-sumbu.php',
										data	: {sumbu : s},
										success	: function(response) {
											var dataSumbu = JSON.parse(response);
											series1.setData(dataSumbu.n1, true);
											series2.setData(dataSumbu.n2, true);
											series3.setData(dataSumbu.n3, true);
											series4.setData(dataSumbu.n4, true);
											series5.setData(dataSumbu.n5, true);
											series6.setData(dataSumbu.n6, true);
											series7.setData(dataSumbu.n7, true);
											series8.setData(dataSumbu.n8, true);
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
						text: 'Data Sensor Per Sumbu'
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
							name: 'Node 1',
							data: nodeData.n1
						},
						{
							name: 'Node 2',
							data: nodeData.n2
						},
						{
							name: 'Node 3',
							data: nodeData.n3
						},
						{
							name: 'Node 4',
							data: nodeData.n4
						},
						{
							name: 'Node 5',
							data: nodeData.n5
						},
						{
							name: 'Node 6',
							data: nodeData.n6
						},
						{
							name: 'Node 7',
							data: nodeData.n7
						},
						{
							name: 'Node 8',
							data: nodeData.n8
						}]
				});
			});
		</script>
	</head>
	<body>
		<div id="grafik_sensor"></div>
	</body>
</html>