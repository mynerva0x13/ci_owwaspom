
<nav id="navigation"></nav>
<div class="container">
	<div class="row justify-content-center align-items-center ">
		<div class="col-md-8">
			<div class="text">
				<img src="<?php echo base_url("/assets/images/owwa.png")?>" class="logo" alt="OWWA Logo">

				<h3>Overseas Workers Welfare
					<br> Administration's Scholarship
					<br>Program Online Monitoring
					<br>System (OWWASPOMS)</h3>
			</div>
		</div>

		<div class="col-md-4">

			<div class="card">
				<div class="card-body">
					<h2 class="card-title text-center">Login</h2>
					<?php echo $response ?>
					<form action="" method="POST">

						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name="user_email" required>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="user_pass" required>
						</div>
						<div class="form-group text-center">
							<input type="submit" class="btn btn-primary" name="btnLogin" value="Log in">
						</div>
						<p class="text-center">
							<a href="forgotpassword.php">Forgot Password?</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
