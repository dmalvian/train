<form action="user-op.php" method="POST">
	<div class="form-group">
		<label for="id_user">ID User</label>
		<input type="text" name="id_user" id="id_user" class="form-control" required>
	</div>
	<div class="form-group">
		<label for="nama_user">Nama User</label>
		<input type="text" name="nama_user" id="nama_user" class="form-control" required>
	</div>
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" class="form-control" required>
	</div>
	<div class="form-group">
		<label for="pass">Password</label><br>
		<input type="password" name="pass" id="pass" class="form-control" required>
	</div>
	<div class="form-group">
		<label for="level">Level</label>
		<input type="text" name="level" id="level" class="form-control" required>
	</div>
	<input type="submit" name="op" value="Submit" class="btn btn-primary">
</form>