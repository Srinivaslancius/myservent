<?php 
include "../admin_includes/config.php";
include "../admin_includes/common_functions.php";
//echo "<pre>"; print_r($_POST); die;
//Cart id generating using sessions
if($_SESSION['CART_TEMP_RANDOM'] == "") {

	$_SESSION['CART_TEMP_RANDOM'] = rand(10, 10).sha1(crypt(time())).time();
}

$session_cart_id = $_SESSION['CART_TEMP_RANDOM'];
$category_id = decryptPassword($_POST['services_cat_id']);
$sub_cat_id = $_POST['services_sub_cat_id'];
$group_id = $_POST['services_group_id'];
$service_price = $_POST['service_price'];
$services_service_id = $_POST['services_service_id'];
$service_price_type_id = $_POST['service_price_type_id'];
$created_at = date("Y-m-d h:i:s");

$checkCartItems = "SELECT * FROM services_cart WHERE category_id ='$category_id' AND sub_cat_id='$sub_cat_id' AND group_id = '$group_id' AND  service_id='$services_service_id' ";
$getCartCount = $conn->query($checkCartItems);
$getTotalCount = $getCartCount->num_rows;
if($getTotalCount > 0) {
	echo $getTotalCount;
} else {
	$saveItems = "INSERT INTO `services_cart`(`user_id`, `session_cart_id`, `category_id`, `sub_cat_id`, `group_id`, `service_id`, `services_price_type_id`, `service_price`, `created_at`) VALUES ('$user_id','$session_cart_id','$category_id','$sub_cat_id','$group_id','$services_service_id','$service_price_type_id','$service_price','$created_at')";
	$saveCart = $conn->query($saveItems);
	echo $getTotalCount;
}

?>