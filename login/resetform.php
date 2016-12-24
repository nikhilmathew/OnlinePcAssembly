<?php 
include '../pages/layout.php';


if(isset($_GET['key'])  )
{
	$key = $_GET['key'];
	$quer = mysqli_query($conn,"select userid from user_details where password='$key'");
	$que = mysqli_fetch_assoc($quer);
	$_SESSION['uid'] = $que['userid'];
	$_SESSION['flag']=2;
}
else{
	$_SESSION['flag']=0;
}
if($_SESSION['flag']==0){
	$key=0;
}else{$key=1;
	}
if(isset($_POST['resetpass'])){
	$pass1 = sha1($_POST['pass1']);
	$eid = $_SESSION['uid'] ;
	$query = mysqli_query($conn,"update user_details set password='$pass1' where userid='$eid'") or die(mysqli_error($conn));
	if($query){
		echo 'password changed successfully';
		echo '<script type="text/javascript">
							window.location.href="loginagain.php";
							</script>
							<noscript>
							<meta http-equiv="refresh" content="0;url=loginagain.php"/>
							</noscript>';
		//header("location:loginagain.php");
	}else{
		echo 'password reset failed';
	}
	
}

?>
<html>
<head>
<title></title>
<script>
 function passcheck() {
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var ok = true;
    if (pass1 != pass2) {
        //alert("Passwords Do not match");
        document.getElementById("pass1").style.borderColor = "#E34234";
        document.getElementById("pass2").style.borderColor = "#E34234";
        ok = false;
		alert("Passwords dont Match!!!");
    }
    else {
            }
    return ok;
}
</script>
<style>
	.resetform{
		margin-top:250px;
		width:80%;
		margin-left: auto;
		margin-right: auto;
	}
</style>
</head>
<body>
	<div class="resetform">

			<?php
					if($key == 0){

							echo'	<form action="resetform.php" method="get">
									<label for="key">Enter the very long password reset key that you received</label>
									<input type="text" name="key" id="key" placeholder="enter reset code">
									<input type="submit" >
									</form>

								';
					}else{

							echo '  <form action="resetform.php" method="post">
									<label for="newpass">Enter new password</label>
									<input type="password" name="pass1" id="pass1" placeholder="new password">
									<input type="password" name="pass2" id="pass2" placeholder="re-enter password">
									<input type="submit" name="resetpass" onclick=" return passcheck();	">
									</form>';
					}
				?>




	</div>
</body>

</html>
