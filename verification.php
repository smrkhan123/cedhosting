<?php
include('classes/User.php');
$user = new User();
$db = new Dbcon();
if(isset($_SESSION['id'])){
	header("location:index.php");
} elseif(!isset($_GET['mobile']) && !isset($_GET['email']) && !isset($_GET['resend'])){
    header("location:login.php");
}
$val = "verify";
if(isset($_GET['resend'])) { 
    $val = 'Resend'; 
} else { 
    $val = "verify";
}
if(isset($_GET['email']) || isset($_GET['resend'])) {
    $data = $user->select($db->conn);
    $email = '';
    $phone = '';
    foreach($data as $item) {
        if(isset($_GET['email'])) {
            $getEmail = $_GET['email'];
        } elseif(isset($_GET['resend'])) {
            $getEmail = $_GET['resend'];
        }
        if(md5($item['email']) == $getEmail) {
            $email = $item['email'];
            $phone = $item['mobile'];
        }
    }
}
if(isset($_GET['verifyemail'])) {
    require_once('mail.php');
}
if(isset($_GET['mobile'])) {
    $data = $user->select($db->conn);
    $email = '';
    $phone = '';
    if(isset($_GET['mobile'])) {
        $getMobile = $_GET['mobile'];
    }
    foreach($data as $item) {
        if($item['mobile'] == $getMobile) {
            $email = $item['email'];
            $phone = $item['mobile'];
        }
    }
    require_once('otp.php');
}

if(isset($_POST['otpsubmit'])) {
    
    $otp = $_POST['otp'];
    $mobile = $_POST['mobile'];
    if(isset($_SESSION['otp'])) {
        if($_SESSION['otp'] == $otp) {
            $mobileverified = $user->verifymobile($mobile, $db->conn);
        }
    }
}
include('header.php'); ?>
		<!---login--->
			<div class="content">
				<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register" style="padding-bottom: 100px;">
		  	  <form method="get" action="verification.php"> 
				 <div class="register-top-grid">
					<h3>Account Verification</h3>
					 <div>
						<span>Mobile<label>*</label></span>
						<input type="text" name="" value="<?php if(isset($_GET['email']) || isset($_GET['resend']) || isset($_GET['mobile']) ) { echo $phone; } ?>" disabled required> 
                        <input type="hidden" name="mobile" value="<?php if(isset($_GET['email']) || isset($_GET['resend']) || isset($_GET['mobile'])) { echo $phone; } ?>" required> 
                     </div>
                     <div class="clearfix"> </div>
                     <div class="register-but">
                     <?php
                            if(isset($_GET['email']) || isset($_GET['resend']) || isset($_GET['mobile'])) {
                                if(isset($_GET['mobile'])){
                                    $sql = $user->select_phone($phone, $db->conn);
                                } else{
                                    $sql = $user->select_email($email, $db->conn);
                                }
                                $flagval = 0;
                                foreach($sql as $data) {
                                    if($data['phone_approved'] == '1') {
                                        $flagval = 1;
                                    }
                                } 
                                if($flagval == 1) {
                                    ?>
                                    <input type="submit" disabled value="Verified" style="background-color:green; color:white">
                                    <?php
                                } else {
                                    ?>
                                        <input type="submit" value="Verify" name="verifyphone">         
                                    <?php
                                }
                            } else {
                                ?>
                                    <input type="submit" value="Verify" name="verifyphone">         
                                <?php
                            }
                            
                        ?>
                        <div class="clearfix"> </div>
                     </div>
                  </div>
              </form>
              <?php 
                if(isset($_GET['verifyphone'])){
                    ?>
                        <form action="verification.php" method="POST">
                            <h4>Please Enter 5 Digit Code Which is sent to your mobile</h4>
                            <div>
                                <input type="number" name="otp" required> 
                                <input type="hidden" name="mobile" value="<?php echo $phone; ?>">
                                <input type="submit" value="Confirm" name="otpsubmit">
                            </div>
                        </form>
                    <?php
                }
              ?>
              <form method="GET" action="verification.php">
                <div class="register-top-grid">
					 <div>
						 <span>Email Address<label>*</label></span>
						 <input type="email" name="disableemail" value="<?php if(isset($_GET['email']) || isset($_GET['resend']) || isset($_GET['mobile'])) { echo $email; } ?>" disabled required>
                         <input type="hidden" name="email" value="<?php if(isset($_GET['email']) || isset($_GET['resend']) || isset($_GET['mobile'])) { echo $email; } ?>" required> 
					 </div>
					 <div class="clearfix"> </div>
                     <div class="register-but">
                     <?php
                            if(isset($_GET['email']) || isset($_GET['resend']) || isset($_GET['mobile'])) {
                                if(isset($_GET['mobile'])){
                                    $sql = $user->select_phone($phone, $db->conn);
                                } elseif(isset($_GET['email']) || isset($_GET['resend'])){
                                    $sql = $user->select_email($email, $db->conn);
                                }
                                $flag = 0;
                                foreach($sql as $data) {
                                    if($data['email_approved'] == '1') {
                                        $flag = 1;
                                    }
                                } 
                                if($flag == 1) {
                                    ?>
                                    <input type="submit" disabled value="Verified" style="background-color:green; color:white">
                                    <?php ;
                                } else {
                                    ?>
                                        <input type="submit" value="Verify" name="verifyemail">         
                                    <?php
                                ;}
                            } else {
                                ?>
                                    <input type="submit" value="Verify" name="verifyemail">         
                                <?php
                            }
                            
                        ?>
                        <div class="clearfix"> </div>
                     </div>
                </div>
              </form>

              <div class="clearfix"> </div>
              <div class="register-but">
                <!-- <input type="submit" value="Verify" name="submit"> -->
                <div class="clearfix"> </div>
                <div class="clearfix"> </div>
              </div>
		 </div>
	</div>
<!-- registration -->

			</div>
<!-- login -->
<?php include('footer.php'); ?>