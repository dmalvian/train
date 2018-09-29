<?php
	$id_user = $_GET['id_user'];
	$q = $link->query("SELECT * FROM user WHERE id_user='".$id_user."'");
	$r = $q->fetch_assoc();
?>
<form action="user-op.php" method="POST">
	<div class="form-group">
		<label for="id_user">ID User</label>
		<input type="text" name="id_user" id="id_user" class="form-control" value="<?php echo $r['id_user']; ?>" required>
	</div>
	<div class="form-group">
		<label for="nama_user">Nama User</label>
		<input type="text" name="nama_user" id="nama_user" class="form-control" value="<?php echo $r['nama_user']; ?>" required>
	</div>
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" class="form-control" value="<?php echo $r['username']; ?>" required>
	</div>
	<div class="form-group">
		<label for="pass">Password</label><br>
		<input type="text" name="pass" id="pass" class="form-control" value="<?php echo $r['password']; ?>" required>
	</div>
	<input type="submit" name="op" value="Update" class="btn btn-primary">
</form>