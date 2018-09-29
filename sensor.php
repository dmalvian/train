<table class="table table-striped">
	<tr>
		<th class="text-center">ID SENSOR</th>
		<th class="text-center">NAMA SENSOR</th>
		<th class="text-center">LETAK SENSOR</th>
		<th class="text-center">SPEK SENSOR</th>
		<th class="text-center">FOTO SENSOR</th>
		<?php echo $_SESSION['level'] == "admin" ? "<th colspan='2' class='text-center'>ACTION</th>" : ""; ?>
	</tr>
<?php
	$q	= $link->query("SELECT * FROM tambah");
	while ($r = $q->fetch_assoc()) {
		echo "
		<tr>
			<td>".$r['id_sensor']."</td>
			<td>".$r['nama_sensor']."</td>
			<td>".$r['letak_sensor']."</td>
			<td>".$r['spek_sensor']."</td>
			<td><img src='assets/upload/".$r['foto']."' width='150px' height='150px'></td>
		";
		if ($_SESSION['level'] == "admin") {	
			echo "
			<td><a href='index.php?page=sensor-edit&id_sensor=".$r['id_sensor']."' class='btn btn-success btn-xs'>Edit</a></td>
			<td><a href='sensor-op.php?del&id_sensor=".$r['id_sensor']."' class='btn btn-danger btn-xs' onClick='return checkDel()'>Hapus</a></td>
			";
		}
		echo "
		</tr>
		";
	}
?>
</table>