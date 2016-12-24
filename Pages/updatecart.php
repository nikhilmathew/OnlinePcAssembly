<?php 
session_start();
include '../login/sqlconnect.php';

if(isset($_SESSION['user'])){
	if(isset($_GET['id']) && isset($_GET['qty'])){
		$ctel = intval($_GET['id']);
		$qty = intval($_GET['qty']);
		
		$query = mysqli_query($conn,"update shopping_cart set qty='$qty' where cartelement='$ctel'");
		if($query){
			echo 'quantity updated';
		}
		else
		{
			echo 'error';
		}
	}
	
}

?>