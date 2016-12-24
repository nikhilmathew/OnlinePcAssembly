<?php
session_start();
if(isset($_POST['addrecd'])){
	
	$address = $_POST['add'];
	$_SESSION['deliveryaddress']=$address;
	header('Location:placeorder.php');
	
}
?>