<?php 
session_start();
include '../login/sqlconnect.php';

if(isset($_SESSION['user'])){
	if(isset($_GET['id'])){
		$user= $_SESSION['user'];
		$reuid = mysqli_query($conn,"select userid from user_details where email='$user'");
		if((mysqli_num_rows($reuid)==1)){
		$uida = mysqli_fetch_assoc($reuid);
		$uid = $uida['userid'];
		$pid = intval($_GET['id']);
		$ret = mysqli_query($conn,"select * from inv_id_gen where id='$pid'");
		$reta = mysqli_fetch_assoc($ret);
		if($reta['table']==='acc_inventory'){$top='a';}else if($reta['table']==='modificationlist'){$top='m';}else{$top='p';}
		$qty = intval($_GET['qty']);
		
		}
		$query = mysqli_query($conn,"insert into shopping_cart(uid,typeofpurchase,pid,qty) values('$uid','$top','$pid','$qty')");
		if($query){
			echo 'Item added to Cart';
		}
		else
		{
			echo 'error';
		}
	}
}
?>