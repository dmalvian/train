<?php
	session_start();
	include_once 'conn.php';
	if (!isset($_SESSION['username'])) {
		header("location: login.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script src="assets/js/jquery-3.2.0.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script>
			function checkDel(){
				return confirm('Are you sure?');
			}
		</script>
	</head>
	<body>
		<header class="jumbotron blue">
			<div class="container">
				<h2 class="title">Sistem Informasi Data Logger Sensor Getaran</h2>	
			</div>
		</header>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					<?php include_once 'menu.php';?>
				</div>
				<div class="col-md-offset-1 col-md-7">
					<?php
					if (isset($_GET['page'])){
						$page = $_GET['page'];
						$page .= ".php";
						include_once $page;
					}
					else {
						include_once "profil.php";
					}
					?>
				</div>
			</div>
			<footer class="row">
				<div class="col-md-12 footer text-center">
					copyright &copy; 2017 Bismillah sedang berjuang untuk Lulus  - SEMANGAT TA -				
				</div>
			</footer>
		</div>
	</body>
</html>