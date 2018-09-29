<?php
	session_start();
	if (isset($_SESSION['username'])) {
		header("location: index.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login Pengguna</title>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	</head>
	<body>
		<div class="container top">
			<div class="row top">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title pnl-title">Login Pengguna</h3>
						</div>
						<div class="panel-body">
							<form action="log.php?in" method="POST">
								<div class="form-group">
									<label for="user">Username</label>
									<input type="text" class="form-control" name="user" id="user" required>
								</div>
								<div class="form-group">
									<label for="pass">Password</label>
									<input type="password"  class="form-control" name="pass" id="pass" required>
								</div>
								<input type="submit" name="login" value="Login" class="btn btn-primary">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>