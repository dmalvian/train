<table class="table table-striped">
	<tr>
		<th class="text-center">ID</th>
		<th class="text-center">ID SENSOR</th>
		<th class="text-center">WAKTU</th>
		<th class="text-center">X</th>
		<th class="text-center">Y</th>
		<th class="text-center">Z</th>
		<th class="text-center">A</th>
		<th class="text-center">STATUS</th>
	</tr>
<?php
	$node = $_GET['id'];
	$q	= $link->query("SELECT * FROM tabelsensor2 WHERE sensorid = '".$node."' LIMIT 500");
	while ($r = $q->fetch_assoc()) {
		echo "
		<tr class='text-center'>
			<td>".$r['id']."</td>
			<td>".$r['sensorid']."</td>
			<td>".$r['waktu']."</td>
			<td>".$r['x']."</td>
			<td>".$r['y']."</td>
			<td>".$r['z']."</td>
			<td>".$r['a']."</td>
			<td>".$r['status']."</td>
		</tr>
		";
	}
?>
</table>