<?php
require_once ('Dbcon.php');
if(!isset($_SESSION)){
    session_start();
}

class Product {
    function select_category($conn) {
        $sql = "SELECT * FROM `tbl_product` WHERE `prod_parent_id` = '0'";
        $run = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($run);
        if($rows>0) {
            return $run;
        } else {
            return '0';
        }
    }

    function insert_subcategory($subcategory, $conn) {
        $link = str_replace(" ","",strtolower($subcategory));
        $link = $link.".php";
        $sql = "INSERT INTO `tbl_product`(`prod_parent_id`, `prod_name`, `link`, `prod_available`, `prod_launch_date`) VALUES('1', '$subcategory', '$link', '1', NOW())";
        $run = mysqli_query($conn, $sql);
        if($run == 1) {
            echo "<script>alert('SubCategory Added Successfully');window.location.href = 'createcategory.php';</script>";
        } else {
            echo "<script>alert('Please add a unique category');window.location.href = 'createcategory.php';</script>";
        }  
    }

    function select_subcategory($conn) {
        $sql = "SELECT * FROM `tbl_product` WHERE `prod_parent_id` = '1'";
        $run = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($run);
        if($rows>0) {
            return $run;
        } else {
            return '0';
        }
    }

    function select_parentname($id, $conn) {
        $sql = "SELECT * FROM `tbl_product` WHERE `id` = '$id'";
        $run = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($run);
        if($rows>0) {
            return $run;
        } else {
            return '0';
        }
    }

    function update_product($id, $name, $isavail, $conn) {
        $qry = "UPDATE `tbl_product` SET `prod_name` = '$name', `prod_available` = '$isavail' WHERE `id` = '$id'";
        $run = mysqli_query($conn, $qry);
        if($run == 1) {
            echo "<script>alert('Data Updated successfully');</script>";
            echo "<script>window.location.href = 'createcategory.php'; </script>";
        } else {
            echo "<script>alert('Some error occured!'); </script>";
            echo "<script>window.location.href = 'createcategory.php'; </script>";
        }
    }

    function delete_subcategory($id, $conn) {
        $qry = "DELETE FROM `tbl_product` WHERE `id` = '$id'";
        $run = mysqli_query($conn, $qry);
        if($run == 1) {
            echo "<script>alert('Data Deleted successfully');</script>";
            echo "<script>window.location.href = 'createcategory.php'; </script>";
        } else {
            echo "<script>alert('Some error occured!'); window.location.href = admin/createcategory.php;</script>";
        }
    }

    function insert_product($category, $productname, $pageurl, $monthlyprice, $annualprice, $sku, $featuresEncoded, $conn){

        $prodQuery = mysqli_query($conn, "INSERT INTO `tbl_product`(`prod_parent_id`, `prod_name`, `link`, `prod_available`, `prod_launch_date`) VALUES ('$category', '$productname', '$pageurl', '1', NOW())");
        $id = mysqli_insert_id($conn);
        if($prodQuery){
            $DescQuery = mysqli_query($conn, "INSERT INTO `tbl_product_description`(`prod_id`, `description`, `mon_price`, `annual_price`, `sku`) VALUES ('$id', '$featuresEncoded', '$monthlyprice', '$annualprice', '$sku')");
            if($DescQuery) {
                echo "<script>alert('Product Inserted successfully');</script>";
                echo "<script>window.location.href = 'addproduct.php'; </script>";
            } else {
                echo mysqli_error($conn);
            }
        } else {
            return false;
        }
        
    }
}

?>

