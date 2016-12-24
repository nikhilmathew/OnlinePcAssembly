<html>
<head>
<title>webpage login form</title>
<?php
session_start();
//session variable check
if($_SESSION['user']!='guest'){ 
	echo "A user is already logged in ... please logout first ";
	//sleep(5);
	//header('Location:../pages/index.php');
}
//include 'sqlconnect.php';
$usr=0;
// this page is to check if a user trying to log on is present in the db
if(isset($_POST['logme'])){
	
	$data_missing = array();

	if(empty($_POST['Username'])){

		$data_missing[]='Username';
	}else{

		//trim white spaces
		$u_name =trim($_POST['Username']);

	}

	
	$pass =sha1(trim($_POST['Password']));
	if(empty($data_missing))
	{
		require_once('sqlconnect.php');
		//retrive username to check if such a user is already present in the system 
		$queri=("SELECT password FROM user_details where email='$u_name'");
		//retreive username and password for validation
		$query = ("SELECT password FROM user_details where email='$u_name' and password='$pass'");
		$queryc =("SELECT * FROM user_details where email='$u_name' and password='$pass'");
		$u_resp=mysqli_query($conn,$queri);
		$response = mysqli_query($conn,$query);
		$privchk = mysqli_query($conn,$queryc);
		$rowu= mysqli_num_rows($u_resp);
		$rows= mysqli_num_rows($response);
		$u_data = mysqli_fetch_assoc($privchk);
		$username=$u_data['username'];
		
		if($rowu)
		{
			if($rows==1)
			{
					
				if($u_data['privelage']=='U'){
					echo "username verified proceed to respective page";
					$_SESSION['user']=$u_name;
					$_SESSION['username']=$username;
					$_SESSION['priv']=$u_data['privelage'];
					header('Location:../pages/index.php');

				} elseif ($u_data['privelage']=='A') {
					echo"admin login";
					
					$_SESSION['user']=$u_name;
					
					$_SESSION['priv']=$u_data['privelage'];
					header('Location:../pages/administrator.php');
				}elseif ($u_data['privelage']=='R'){
					echo "retailer login";

					$_SESSION['user']=$u_name;
					$_SESSION['username']=$username;
					$_SESSION['priv']=$u_data['privelage'];
					header('Location:../pages/retailerhome.php');
				}
				exit();
			}
			else
			{
				//echo "invalid password please try again";
				$usr=1;
			}
		}else
		{
			//echo "no such user";
			$usr=2;
		}
	}
}
?>

</head>
<body>
<h3> Login Page </h3>
<form action="loginpagedemo.php" method="post">

<span>enter the email id &nbsp; &nbsp;<input type="text" name="Username" required  style="border-radius:7px; border:2px solid #2B2525;" ><?php if($usr==2){echo "<strong>   no such user </strong> ";}?></span><br><br>
<span>  enter a password  &nbsp;&nbsp;	<input id="pass1" type="password" required name ="Password" placeholder="Enter your password" style="border-radius:7px; border:2px solid #2B2525;"><?php if($usr==1){echo "<strong>   wrong password  </strong>";}?></span><br><br>
<br>

<input type="submit" name="logme" value="Log In" style="border-radius:7px; border:2px solid #2B2525;">
</form>
<h4>New User? <a href="registerform.php"> Register Here.</a></h4>
<h4>Forgot Password? <a href="resetpassword.php"> Forgot My Password?</a></h4>
</body>
</html>

