<?php 
include 'layout.php';
include '../login/sqlconnect.php';
if(isset($_SESSION['user'])){
	if(isset($_POST['submit']) && $_SESSION['thisform']!="1"){
		$user= $_SESSION['user'];
		$reuid = mysqli_query($conn,"select userid from user_details where email='$user'");
		if((mysqli_num_rows($reuid)==1)){
			$uida = mysqli_fetch_assoc($reuid);
			$uid = $uida['userid'];
			$_SESSION['system']['psu']=$_POST['part'];
			$hddopdc=count($_SESSION['system']['hddopd']);
			$x=0;
			$cart[$x++]= $_SESSION['system']['motherboard'];
			$cart[$x++]= $_SESSION['system']['cabinet'];
			$cart[$x++]= $_SESSION['system']['cpu'];
			$cart[$x++]= $_SESSION['system']['ram'];
			$cart[$x++]= $_SESSION['system']['gpu'];
			for($y=0;$y<$hddopdc;$y++){
				$cart[$x++] = $_SESSION['system']['hddopd'][$y];// this one's an array
			}
			$cart[$x] = $_SESSION['system']['psu'];
			$x=0;
			$cartcount = count($cart);
			while($x != $cartcount){
			$carte= $cart[$x];
			if($carte!=0){
			$push = mysqli_query($conn,"insert into shopping_cart(uid,typeofpurchase,pid) values('$uid','s','$carte')");
			}
			$x++;
			if(isset($push)){}else{echo'shit';}
			$_SESSION['thisform']="1";
			
			}
		}
	}
}

echo '<script type="text/javascript">
		window.location.href="modificationspurchase.php";
		</script>
		<noscript>
		<meta http-equiv="refresh" content="0;url=modificationspurchase.php"/>
		</noscript>';

//
//header('location:modificationspurchase.php');
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

