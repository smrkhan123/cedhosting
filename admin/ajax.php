<?php
session_start();
$id = $_POST['id'];
include('../classes/Product.php');
if (!isset($_SESSION['id'])) {
  header("location: ../login.php");
} elseif(isset($_SESSION['id'])){
    if($_SESSION['is_admin'] == '0') {
        header("location:../index.php");
    }
}
$product = new Product();
$db = new Dbcon();
$subcategory = $_POST['subcategory'];
$insert = $product->update_product_status($id, $db->conn);
if($insert == '0') {
    echo "Unavailable";
} else {
    echo "Available";
}

?>