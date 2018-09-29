<form action="sensor-op.php" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="id_sensor">ID Sensor</label>
		<input type="text" name="id_sensor" id="id_sensor" class="form-control" required>
	</div>
	<div class="form-group">
		<label for="nama_sensor">Nama Sensor</label>
		<input type="text" name="nama_sensor" id="nama_sensor" class="form-control" required>
	</div>
	<div class="form-group">
		<label for="letak_sensor">Letak Sensor</label>
		<input type="text" name="letak_sensor" id="letak_sensor" class="form-control" required>
	</div>
	<div class="form-group">
		<label for="spek_sensor">Spesifikasi</label><br>
		<textarea name="spek_sensor" id="spek_sensor" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label for="foto">Foto</label>
		<input type="file" name="foto" id="foto">
	</div>
	<input type="submit" name="op" value="Submit" class="btn btn-primary">
</form>