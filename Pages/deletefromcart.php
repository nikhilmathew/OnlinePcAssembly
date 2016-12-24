<?php 
session_start();
include '../login/sqlconnect.php';

if(isset($_SESSION['user'])){
	
	if(isset($_GET['delid'])){
		$ctel = intval($_GET['delid']);
		
		
		$query = mysqli_query($conn,"delete from shopping_cart  where cartelement='$ctel'");
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