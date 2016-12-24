<?php 
session_start();
include ('../login/sqlconnect.php');
if(isset($_POST['changeretpass'])){
$user=$_SESSION['user'];
$oldpass =sha1(trim($_POST['oldpass']));
$newpass = sha1(trim($_POST['newpass']));
$newpass1 = sha1(trim($_POST['newpass1']));
$uname=$_SESSION['user'];
		$queri=("SELECT * FROM user_details where email='$uname' and password='$oldpass'");
		$u_resp=mysqli_query($conn,$queri);
		
		$rown= mysqli_num_rows($u_resp);
		if($rown==1){
			echo 'Please Login Again.....';

			//
			$query=("update user_details set password='$newpass' where email='$uname'");
			if(mysqli_query($conn,$query)){
				echo "password changed successfully";
				session_destroy();
				header("Location:..\Pages\index.php");
			}else{echo"password change not successful please try again";}
		}else{
			echo 'wrong password entered';
		}
}else{
	echo "Unauthorised Page Jumping ......please return to parent page and try again";
}
		
?>