<table class="table table-striped">
	<tr>
		<th class="text-center">ID USER</th>
		<th class="text-center">NAMA USER</th>
		<th class="text-center">USERNAME</th>
		<th class="text-center">PASSWORD</th>
		<th class="text-center">LEVEL</th>
		<th colspan="2" class="text-center">ACTION</th>
	</tr>
<?php
	$q	= $link->query("SELECT * FROM user");
	while ($r = $q->fetch_assoc()) {
		echo "
		<tr class='text-center'>
			<td>".$r['id_user']."</td>
			<td>".$r['nama_user']."</td>
			<td>".$r['username']."</td>
			<td>".$r['password']."</td>
			<td>".$r['level']."</td>
			<td><a href='index.php?page=user-edit&id_user=".$r['id_user']."' class='btn btn-success btn-xs'>Edit</a></td>
			<td><a href='user-op.php?del&id_user=".$r['id_user']."' class='btn btn-danger btn-xs' onClick='return checkDel()'>Hapus</a></td>
		</tr>
		";
	}
?>
</table>