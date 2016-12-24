<?php 
session_start();
include '../login/sqlconnect.php';


if(isset($_SESSION['user'])){
	if($_SESSION['thisform']!="1"){
		$user= $_SESSION['user'];
		$oid = $_GET['sys'];
		$reuid = mysqli_query($conn,"select userid from user_details where email='$user'");
		if((mysqli_num_rows($reuid)==1)){
			$uida = mysqli_fetch_assoc($reuid);
			$uid = $uida['userid'];
			
			$query1 = mysqli_query($conn,"select * from order_list where oid='$oid'");
			$res1 = mysqli_fetch_assoc($query1);
			$system= explode('^',$res1['orderstring']);
			$cartcount = count($system);
			$x = 2;
			while($x < $cartcount){
			$carte= $system[$x++];
			$qty = $system[$x++];
			$push = mysqli_query($conn,"insert into shopping_cart(uid,typeofpurchase,pid,qty) values('$uid','s','$carte','$qty')");
			
			if(isset($push)){echo 'successful';}else{echo'shit';}
			$_SESSION['thisform']="1";
			
			}
		}
	}
}

header('location:purchasedsystemviewpage.php');
/*
$fwd = array('motherboard','cabinet','cpu','ram','gpu','hdd','opd','nic','complete');
if(isset($_SESSION['user'])){
	if(isset($_POST['submit'])){
		$user= $_SESSION['user'];
		$reuid = mysqli_query($conn,"select userid from user_details where email='$user'");
		if((mysqli_num_rows($reuid)==1)){
		$uida = mysqli_fetch_assoc($reuid);
		$uid = $uida['userid'];
		$id = $_POST['part'];
		}
		//retreive table name of id
		$rettable = mysqli_query($conn,"select * from inv_id_gen where id='$id'");
		$tentry = mysqli_fetch_assoc($rettable);
		$tablename = $tentry['table'];
		//set idn to aid in  retreival of price
		

		$iquery = ("insert into shopping_cart(uid,pid) values('$uid','$id')");
		$response = mysqli_query($conn,"insert into shopping_cart(uid,pid) values('$uid','$id')");
		if($response){
			$_SESSION['stage']++;
			header('location:customize'.$fwd[$_SESSION['stage']].'.php');
		}else{
			echo'error adding item to shopping cart. ';
		}

			


	}
}*/
?>
<html>
<head>
<title>
		System Build Confirmation page</title>
		</head>
		<body>
		</body>
		</html>

