<?php
require_once ('Dbcon.php');
if(!isset($_SESSION)){
    session_start();
}

class User {
    function signup($name, $email, $phone, $pass, $security_question, $security_answer, $conn) {
        $qry = "INSERT INTO `tbl_user` (`id`, `email`, `name`, `mobile`, `email_approved`, `phone_approved`, `active`, `is_admin`, `sign_up_date`, `password`, `security_question`, `security_answer`) VALUES (NULL, '$email', '$name', '$phone', '0', '0', '0', '0', current_timestamp(), '$pass', '$security_question', '$security_answer')";
        $run = mysqli_query($conn, $qry);
        if ($run == true) {
            echo "<script>alert('You are successfully registered! Please verify your email or phone');</script>";
            echo "<script>window.location.href = 'verification.php?email=".md5($email)."';</script>";
        } else {
            echo "<script>alert('Some error occured, Please try again.');</script>";
        }
    }

    function login($email, $password, $conn){
        // $enc_password = md5($password);
        $qry = "SELECT * FROM tbl_user WHERE `email` = '$email' AND `password` = '$password'";
        $run = mysqli_query($conn, $qry);
        $row = mysqli_num_rows($run);
        if ($row>0) {
            $data = mysqli_fetch_assoc($run);
            if($data['active']=='0'){
                // $enc_email = md5($email);
                echo "<script>alert('You are not active right now, Please verify your Email or Phone');</script>";
                echo "<script>window.location.href = 'verification.php?email=".md5($email)."';</script>";
            } else{
                $_SESSION['id'] = $data['id'];
                $_SESSION['is_admin'] = $data['is_admin'];
                $_SESSION['name'] = $data['name'];
                if($_SESSION['is_admin'] == '1') {
                    header("location:admin/index.php");
                } else {
                    header("location:index.php");
                }
            }
        } else {
            echo "<script>alert('Please enter a valid username or password.');</script>";
        }
    }
    
    function select($conn) {
        $sql = "SELECT * FROM `tbl_user`";
        $run = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($run);
        if($rows>0) {
            return $run;
        }
    }
    function userunblock($email, $conn){
        $sql = "UPDATE `tbl_user` SET `email_approved` = '1', `active` = '1' WHERE `email` = '$email'";
        $run = mysqli_query($conn, $sql);
        if($run == 1) {
            echo "<script>alert('Account verified successfully.'); window.location.href = 'login.php';</script>";
        } else {
            echo "<script>alert('Some error occured!');</script>";
            echo "<script>window.location.href = account.php;</script>";
        }
    }

    function checkVerification($email, $conn) {
        // 
    }
    function select_email($email, $conn) {
        $sql = "SELECT * FROM `tbl_user` WHERE `email` = '$email'";
        $run = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($run);
        if($rows>0) {
            return $run;
        }
    }

    function select_phone($phone, $conn) {
        $sql = "SELECT * FROM `tbl_user` WHERE `mobile` = '$phone'";
        $run = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($run);
        if($rows>0) {
            return $run;
        }
    }

    function verifymobile($mobile, $conn) {
        $sql = "UPDATE `tbl_user` SET `phone_approved` = '1', `active` = '1' WHERE `mobile` = '$mobile'";
        $run = mysqli_query($conn, $sql);
        if($run == 1) {
            unset($_SESSSION['otp']);
            echo "<script>alert('Mobile verified successfully.'); window.location.href = 'login.php';</script>";
        } else {
            unset($_SESSSION['otp']);
            echo "<script>alert('Some error occured!'); window.location.href = account.php;</script>";
        }
    }

}

?>

