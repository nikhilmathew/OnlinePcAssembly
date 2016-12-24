
<?php
include 'layoutret.php';
$user=$_SESSION['user'];
$retailer = ("select userid from user_details where email='$user'");
$f_reid = mysqli_query($conn,$retailer);
$reid = mysqli_fetch_assoc($f_reid);
$retid = $reid['userid'];
echo $retid;
$orderid = $_GET['id'];
$a = mysqli_query($conn,"update order_list set reid='$retid' where oid='$orderid'");
$b = mysqli_query($conn,"update order_list set status='processing',notification='your order has been accepted' where oid='$orderid'");

if($a && $b)
{
	echo 'success'.$orderid;
	//sleep(2);
	header('Location:viewacceptedorders.php');

}
else {
echo 'error';
}
?>