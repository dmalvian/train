<?php
	$id_sensor = $_GET['id_sensor'];
	$q = $link->query("SELECT * FROM tambah WHERE id_sensor='".$id_sensor."'");
	$r = $q->fetch_assoc();
?>
<form action="sensor-op.php" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="id_sensor">ID Sensor</label>
		<input type="text" name="id_sensor" id="id_sensor" class="form-control" value="<?php echo $r['id_sensor']; ?>" required>
	</div>
	<div class="form-group">
		<label for="nama_sensor">Nama Sensor</label>
		<input type="text" name="nama_sensor" id="nama_sensor" class="form-control" value="<?php echo $r['nama_sensor']; ?>" required>
	</div>
	<div class="form-group">
		<label for="letak_sensor">Letak Sensor</label>
		<input type="text" name="letak_sensor" id="letak_sensor" class="form-control" value="<?php echo $r['letak_sensor']; ?>" required>
	</div>
	<div class="form-group">
		<label for="spek_sensor">Spesifikasi</label><br>
		<textarea name="spek_sensor" id="spek_sensor" class="form-control"><?php echo $r['spek_sensor']; ?></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
	<?php
		if (!empty($r['foto'])) {
			echo "
				<img src='assets/upload/".$r['foto']."' width='150px' height='150px' class='thumbnail'>
			</div>
			<div class='form-group'>
				<label>Ubah Foto</label>
				<div class='radio'>
					<label class='radio-inline'>
						<input type='radio' name='change' value='yes'>
						Ya
					</label>
					<label class='radio-inline'>
						<input type='radio' name='change' value='no' checked>
						Tidak
					</label>
				</div>
				<input type='file' name='foto' id='foto'>
			";
		}
		else {
			echo "
			<input type='file' name='foto' id='foto'>
			";
		}
	?>
	</div>
	<input type="submit" name="op" value="Update" class="btn btn-primary">
</form>