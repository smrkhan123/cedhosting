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
		} elseif ($email == '' || $name == '' || $password == '' || $phone == '') {
			$error = 'Please complete the form and then submit';
		}  else {
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
						<input type="text" name="name" pattern='^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$' required> 
					 </div>
					 <div>
						<span>Mobile<label>*</label></span>
						<input type="text" name="mobile" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" required> 
					 </div>
					 <div>
						 <span>Email Address<label>*</label></span>
						 <input type="email" name="email" pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$" required> 
					 </div>
						<div>
							<span>Security Question<label>*</label></span>
							<select name="securityquestion" id="" required>
								<option value="">Select Security Question</option>
								<option value="petname">What is your pet name?</option>
								<option value="nickname">What is your pet name?</option>
								<option value="placeofbirth">Place of Birth?</option>
							</select>
							</div>
							<div>
							<span>Security Answer<label>*</label></span>
							<input type="text" name="securityanswer" pattern='^([A-Za-z0-9]+ )+[A-Za-z0-9]+$|^[A-Za-z0-9]+$' required>
						</div>
					</div>
					 <div class="clearfix"> </div>
					 <div class="register-bottom-grid">
							<h3>login information</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$" title="password must contain atleast one Special Character, Capital letter, Small Letter, & Number" required>
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