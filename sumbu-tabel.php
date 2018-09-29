<?php
	$sumbu = $_GET['sumbu'];
?>
<table class="table table-striped">
	<tr>
		<th class="text-center">ID</th>
		<th class="text-center">ID SENSOR</th>
		<th class="text-center">WAKTU</th>
		<th class="text-center"><?php echo $sumbu; ?></th>
		<th class="text-center">STATUS</th>
	</tr>
<?php
	$q	= $link->query("SELECT * FROM tabelsensor2 LIMIT 500");
	while ($r = $q->fetch_assoc()) {
		echo "
		<tr class='text-center'>
			<td>".$r['id']."</td>
			<td>".$r['sensorid']."</td>
			<td>".$r['waktu']."</td>
			<td>".$r[$sumbu]."</td>
			<td>".$r['status']."</td>
		</tr>
		";
	}
?>
</table>