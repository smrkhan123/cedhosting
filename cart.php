<?php 
include_once("classes/Product.php");
$product = new Product();
$db = new Dbcon();
if(isset($_SESSION['id'])) {
	if($_SESSION['is_admin'] == '1') {
	header("location: admin/index.php");
	}
}
include('header.php');?>
<div class="content">
    <div class="about-section">
        <div class="container">
            <h2>Cart</h2>
            <div class="about-grids text-center">
                <table>
                    <thead>
                        <tr>
                        <th>PRODUCT SKU</th>
                        <th>PRODUCT NAME</th>
                        <th>MONTHLY SUBSCRIPTION</th>
                        <th>ANNUAL SUBSCRIPTION</th>
                        <th>TOTAL DISK SPACE</th>
                        <th>TOTAL DATA TRANSFER</th>
                        <th>TOTAL DOMAIN</th>
                        <th>TOTAL TECHNOLOGY</th>
                        <th>MAIL BOX</th>
                        <th>REMOVE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        print_r($_SESSION['cart']);
                            $cart = $product->select_product($db->conn);
                            foreach($cart as $data) {
                                foreach($_SESSION['cart'] as $key => $value) {
                                    // echo $data['id'];
                                    // die();
                                    if($value['id'] == $data['prod_id']) {
                                        // echo $data['id'];
                                        // die();
                                        $decodeData = json_decode($data);
                                        ?>
                                            <td><?php echo $data['sku']; ?></td>
                                            <td><?php echo $data['prod_name']; ?></td>
                                            <td><?php echo $data['mon_price']; ?></td>
                                            <td><?php echo $data['annual_price']; ?></td>
                                            <td><?php echo $decodeData->webspaces; ?></td>
                                            <td><?php echo $decodeData->bandwidth; ?></td>
                                            <td><?php echo $decodeData->domain; ?></td>
                                            <td><?php echo $decodeData->language; ?></td>
                                            <td><?php echo $decodeData->mailbox; ?></td>
                                            <td>REMOVE</td>
                                        <?php
                                    }
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <!-- <h3>Looks like the cart is empty!</h3>
                <p>Not a problem, let's find a plan that will fit your project best. <a href="pricing.php">Click Here</a> </p> -->
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php include('footer.php');?>