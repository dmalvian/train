<?php
	$q = $link->query("SELECT id_sensor FROM tambah");
?>
<div class="row">
	<div class="col-md-12 pnl-box">
		<h2 class="pnl-title text-center">MONITORING SENSOR</h2>
	</div>
</div>
<div class="row">
	<?php
		while ($r = $q->fetch_assoc()) {
			echo "
			<div class='col-md-3'  align='center'>
				<h2 class='green text-center'>Node ".$r['id_sensor']."</h2>
				<a href='grafik-node.php?id=".$r['id_sensor']."'><img src='assets/img/node.png' width='45%'></a>
				<a href='index.php?page=node-tabel&id=".$r['id_sensor']."'><img src='assets/img/tabel.jpg' width='45%'></a>
			</div>
			";
		}
	?>
</div>