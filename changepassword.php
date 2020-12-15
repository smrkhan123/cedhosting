<?php 
require_once('classes/User.php');
$user = new User();
$db = new Dbcon();
if(isset($_POST['changepassword'])) {
    $email= $_POST['email'];
    $secQuestions = $_POST['secQuestions'];
    $secAnswer = $_POST['secAnswer'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    if($password == $confirmpassword) {
        $changePassword = $user->changepassword($email,$password,$secQuestions,$secAnswer,$db->conn);
    } else {
        echo "<script>alert('Password & Confirm Password Did Not Matched!'); window.location.href = 'changepassword.php?email=$email&secQuestions=$secQuestions&secAnswer=$secAnswer&submit=Submit'</script>";
    }
}
if(isset($_GET['submit'])) {
    $email = $_GET['email'];
    $secQuestions = $_GET['secQuestions'];
    $secAnswer = $_GET['secAnswer'];
    $data = $user->select_email($_GET['email'], $db->conn);
    if($data == '0') {
        echo "<script>alert('Security answer did not matched, please try again'); window.location.href = 'forgetpassword.php?email=$email&submit=Submit'</script>";
    } else {
        $flag = 0;
        foreach($data as $item) {
            // echo "helo";
            if($item['security_answer'] == $secAnswer) {
                $flag = $flag+1;
            }
            // echo "helo";
        }
        // echo $flag;
        if($flag == 0) {
            echo "<script>alert('Security answer did not matched, please try again'); window.location.href = 'forgetpassword.php?email=$email&submit=Submit'</script>";
        } else {
include('header.php'); ?>
<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<div class="col-md-3 login-left"></div>
								<div class="col-md-6 login-right">
									<h3>Forgot Password</h3>
                                    <!-- <p>If you have an account with us, please log in.</p> -->
                                    <form action="changepassword.php" method="post">
                                        <div>
                                            <span>New Password<label>*</label></span>
                                            <input type="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$" title="password must contain atleast one Special Character, Capital letter, Small Letter, & Number" required> 
                                        </div>
                                        <div>
                                            <span>Confirm Password<label>*</label></span>
                                            <input type="password" name="confirmpassword" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$" title="password must contain atleast one Special Character, Capital letter, Small Letter, & Number"> 
                                        </div>
                                        <input type="hidden" name="secQuestions" value="<?php echo $secQuestions; ?>">
                                        <input type="hidden" name="secAnswer" value="<?php echo $secAnswer; ?>">
                                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                                        <input type="submit" value="Submit" name="changepassword">
                                    </form>
                                </div>
                                <div class="col-md-3 login-left"></div>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- registration -->

			</div>
<!-- login -->
<?php include('footer.php');
        }    
    }
}
?>