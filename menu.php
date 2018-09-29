<?php
	if ($_SESSION['level'] == "admin") {
		echo "
		<ul class='nav nav-pills nav-stacked'>
			<li role='presentation'><a href='index.php'>Profil PT. KAI (Persero)</a></li>
			<li role='presentation' class='dropdown'>
				<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
				  Monitoring Sensor Sampel Data <span class='caret'></span>
				</a>
				<ul class='dropdown-menu'>
					<li><a href='index.php?page=node'>Monitoring Sensor Per Node</a></li>
					<li><a href='index.php?page=sumbu'>Monitoring Sensor Per Sumbu</a></li>
				</ul>
			</li>
			<li role='presentation' class='dropdown'>
				<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
				  Node Sensor <span class='caret'></span>
				</a>
				<ul class='dropdown-menu'>
					<li><a href='index.php?page=sensor-add'>Tambah Node</a></li>
					<li><a href='index.php?page=sensor'>View Node</a></li>
				</ul>
			</li>
			<li role='presentation' class='dropdown'>
				<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
				  Kelola User <span class='caret'></span>
				</a>
				<ul class='dropdown-menu'>
					<li><a href='index.php?page=user-add'>Tambah User</a></li>
					<li><a href='index.php?page=user'>Edit User</a></li>
				</ul>
			</li>
			<li role='presentation'><a href='log.php?out'>Logout</a></li>
		</ul>
		";
	}
	else {
		echo "
		<ul class='nav nav-pills nav-stacked'>
			<li role='presentation'><a href='index.php'>Profil PT. KAI (Persero)</a></li>
			<li role='presentation' class='dropdown'>
				<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
				  Monitoring Sensor Sampel Data <span class='caret'></span>
				</a>
				<ul class='dropdown-menu'>
					<li><a href='index.php?page=node'>Monitoring Sensor Per Node</a></li>
					<li><a href='index.php?page=sumbu'>Monitoring Sensor Per Sumbu</a></li>
				</ul>
			</li>
			<li role='presentation' class='dropdown'>
				<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
				  Node Sensor <span class='caret'></span>
				</a>
				<ul class='dropdown-menu'>
					<li><a href='index.php?page=sensor'>View Node</a></li>
				</ul>
			</li>
			<li role='presentation'><a href='log.php?out'>Logout</a></li>
		</ul>
		";
	}
?>

