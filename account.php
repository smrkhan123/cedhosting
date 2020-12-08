<?php 
include('classes/User.php');
if(isset($_SESSION['id'])){
	header("location:login.php");
}
$error = '';
$check = new User();
$db = new Dbcon();
$checksql = $check->select($db->conn);
if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	$phone = $_POST['mobile'];
	$security_question = $_POST['securityquestion'];
	$security_answer = $_POST['securityquestion'];
	foreach ($checksql as $chk) {
		if ($chk['email'] == $email) {
			$error = "Email Already exists";
		}
	}
	if($error == '') {
		if($password != $confirmpassword) {
			$error = "Password and Confrim Password did not matched!";
		} else {
			$obj = new User();
			$db = new Dbcon();
			$sql = $obj->signup($name, $email, $phone, $password, $security_question, $security_answer, $db->conn);
			if($sql == '0'){
				$error = "Email already exists";
			}
		}
	}
}
include('header.php'); ?>
		<!---login--->
			<div class="content">
				<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
		  	  <form method="post" action=""> 
				 <div class="register-top-grid">
					 <?php
					 	if($error != "") {
							 echo "<p style='color:red;'>$error</p>";
						 }
					 ?>
					<h3>personal information</h3>
					 <div>
						<span>Full Name<label>*</label></span>
						<input type="text" name="name" pattern='^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$'> 
					 </div>
					 <div>
						<span>Mobile<label>*</label></span>
						<input type="text" name="mobile" pattern="(([1-9]{1}[0-9]{9})|([0]{1}[0-9]{10}))" title="Mobile number must be 10 digits"> 
					 </div>
					 <div>
						 <span>Email Address<label>*</label></span>
						 <input type="email" name="email" pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$"> 
					 </div>
						<div>
							<span>Security Question<label>*</label></span>
							<select name="securityquestion" id="">
								<option value="">Select Security Question</option>
								<option value="petname">What is your pet name?</option>
								<option value="nickname">What is your pet name?</option>
								<option value="placeofbirth">Place of Birth?</option>
							</select>
							</div>
							<div>
							<span>Security Answer<label>*</label></span>
							<input type="text" name="securityanswer">
						</div>
					</div>
					 <div class="clearfix"> </div>
					 <div class="register-bottom-grid">
							<h3>login information</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$">
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name="confirmpassword">
							 </div>
					 </div>
					 <div class="clearfix"> </div>
						<div class="register-but">
							<input type="submit" value="submit" name="submit">
							<div class="clearfix"> </div>
						</div>
				</form>
		   </div>
		 </div>
	</div>
<!-- registration -->

			</div>
<!-- login -->
<?php include('footer.php'); ?>