<?php
require_once('classes/User.php');
$user = new User();
$db = new Dbcon();
$error = '';
if (isset($_SESSION['id'])) {
    header("location:index.php");
} else {
        $data = $user->select($db->conn);
        $email = '';
        $phone = '';
        foreach($data as $item) {
            $getEmail = $_GET['email'];
            if(md5($item['email']) == $getEmail) {
                $email = $item['email'];
                $phone = $item['mobile'];
            }
        }
        $sql = $user->userunblock($email, $db->conn);
        if($sql != '0') {
            echo "<script>alert('Account verified successfully.');</script>";
            echo "<script>window.location.href = login.php;</script>";
        } else {
            echo "<script>alert('Some error occured!');</script>";
            echo "<script>window.location.href = account.php;</script>";
        }
    }
?>