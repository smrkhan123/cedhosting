<?php
require_once ('Dbcon.php');
if(!isset($_SESSION)){
    session_start();
}

class User {
    function signup($name, $email, $phone, $pass, $security_question, $security_answer, $conn) {
        $qry = "INSERT INTO `tbl_user` (`id`, `email`, `name`, `mobile`, `email_approved`, `phone_approved`, `active`, `is_admin`, `sign_up_date`, `password`, `security_question`, `security_answer`) VALUES (NULL, '$email', '$name', '$phone', '1', '1', '1', '0', current_timestamp(), '$pass', '$security_question', '$security_answer')";
        $run = mysqli_query($conn, $qry);
        if ($run == true) {
            echo "<script>alert('You are successfully registered!');</script>";
            echo "<script>window.location.href = 'login.php';</script>";
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
            $_SESSION['id'] = $data['id'];
            $_SESSION['is_admin'] = $data['is_admin'];
            $_SESSION['name'] = $data['name'];
            if($_SESSION['is_admin'] == '1') {
                header("location:index.php");
            } else {
                    header("location:index.php");
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
}

?>

