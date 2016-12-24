<?php
session_start();
if( (isset ($_SESSION['user'])) && ($_SESSION['priv']=='R'))
{
	echo "retailer".$_SESSION['user'];
}else{
	echo "haaaaaak".$_SESSION['user'];
}//just some code to check who the hell submitted this page

include '../login/sqlconnect.php';
if(isset($_POST['submit'])){
$type = trim($_POST['type_of_component']);
$proname = trim($_POST['productname']);
$brand = trim($_POST['brand']);
$ff = trim($_POST['formfactor']);
$desc = trim($_POST['description']);
$socket = trim($_POST['socket']);
$mem = trim($_POST['memory']);
$memslots = trim($_POST['memslots']);
$pcie = trim($_POST['pcieslots']);
$sata = trim($_POST['nosata']);
$power = trim($_POST['power']);
$price = trim($_POST['price']);
$user=$_SESSION['user'];
$pic='stupid';
$retailer = ("select userid from user_details where email='$user'");
$f_reid = mysqli_query($conn,$retailer);
$reid = mysqli_fetch_assoc($f_reid);
$retid = $reid['userid'];
if($type == 'mbd')
{
		$query = ("INSERT INTO motherboard_inventory(reid,productname,brand,ff,description,socket,memtype,memslots,pcieslots,nsata,power,price,picture) values ('$retid','$proname','$brand','$ff','$desc','$socket','$mem','$memslots','$pcie','$sata','$power','$price','$pic')");
}else if($type == 'cab'||$type =='cpu' ||$type == 'ram' || $type == 'gpu' || $type == 'hdd' || $type == 'opd' || $type == 'nic'){
		$query = ("INSERT INTO parts_inventory(productname, brand, type, description, ff, socket, memtype, power, price, reid, picture) VALUES ('$proname','$brand','$type','$desc','$ff','$socket','$mem','$power','$price','$retid','$pic')");
}
if (mysqli_query($conn, $query)) {
    				echo "New product  input successful";
					
				} else {
    				echo "Error:  <br>". $query . "<br>" . mysqli_error($conn);
					}


header('Location:2.php');
}
?>
