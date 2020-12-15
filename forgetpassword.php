<?php 
require_once('classes/User.php');
$user = new User();
$db = new Dbcon();
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
                                    <?php 
                                        if(isset($_GET['email'])) { ?>
                                            <form action="changepassword.php" method="get">
                                                <div>
                                                    <span>Email Address<label>*</label></span>
                                                    <input type="email" name="email" value="<?php echo $_GET['email']; ?>" disabled>
                                                    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
                                                </div>
                                                <div>
                                                    <span>Security Question<label>*</label></span>
                                                    <select name="secQuestions" id="secQuestions">
                                                        <?php 
                                                            $secQuestions = $user->select_email($_GET['email'], $db->conn);
                                                            foreach($secQuestions as $ques) {
                                                                ?>
                                                                    <option value="<?php echo $ques['security_question']; ?>"><?php echo $ques['security_question']; ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                    <input type="text" name="secAnswer">
                                                </div>
                                                <input type="submit" value="Submit" name="submit">
                                            </form>
                                        <?php } else { ?>
                                            <form action="forgetpassword.php" method="get">
                                                <div>
                                                    <span>Email Address<label>*</label></span>
                                                    <input type="email" name="email"> 
                                                </div>
                                                <!-- <div>
                                                    <span>Password<label>*</label></span>
                                                    <input type="password" name="password"> 
                                                </div> -->
                                                <input type="submit" value="Submit" name="submit">
                                            </form> <?php
                                        }?>
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
<?php include('footer.php'); ?>