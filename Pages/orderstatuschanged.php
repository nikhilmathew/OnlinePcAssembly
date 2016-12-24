<?php
include 'sqlconnect.php';

$oid=$_POST['oid'];
$status=$_POST['status'];
$noti =$_POST['noti'];
$sq=mysqli_query($conn,"UPDATE order_list SET status='$status',notification='$noti' where oid='$oid'");
if($sq){
	header('Location:viewacceptedorders.php');
}
else{
	echo 'errrrror'
	;

}
?>