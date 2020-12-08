<?php 
	require_once('classes/User.php');
	$error = '';
	if (isset($_SESSION['id'])) {
		header("location:index.php");
	} else {
		if (isset($_POST['login'])) {
			$email = $_POST['email'];
			$pass = $_POST['password'];
			$user = new User();
			$db = new Dbcon();
			$sql = $user->login($email, $pass, $db->conn);
		}
	
	}
	include('header.php');
?>
		<!---login--->
			<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<div class="col-md-6 login-left">
									 <h3>new customers</h3>
									 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
									 <a class="acount-btn" href="account.php">Create an Account</a>
								</div>
								<div class="col-md-6 login-right">
									<h3>registered</h3>
									<p>If you have an account with us, please log in.</p>
									<form action="login.php" method="post">
									  <div>
										<span>Email Address<label>*</label></span>
										<input type="email" name="email"> 
									  </div>
									  <div>
										<span>Password<label>*</label></span>
										<input type="password" name="password"> 
									  </div>
									  <a class="forgot" href="#">Forgot Your Password?</a>
									  <input type="submit" value="Login" name="login">
									</form>
								</div>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- login -->
<?php include('footer.php'); ?>