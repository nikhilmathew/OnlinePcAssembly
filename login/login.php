<?php
include 'sqlconnect.php';

// this page is to check if a user trying to log on is present in the db
if(isset($_POST['logme'])){
	
	$data_missing = array();

	if(empty($_POST['Username'])){

		$data_missing[]='Username';
	}else{

		//trim white spaces
		$u_name =trim($_POST['Username']);

	}

	/*if(empty($_POST['Password'])){

		$data_missing[] = 'Password';

	}else{

		//encrypt pass
		
		$pass =trim($_POST['Password']);
	}*/
	$pass =sha1(trim($_POST['Password']));
	if(empty($data_missing))
	{
		require_once('sqlconnect.php');
		//retrive username to check if such a user is already present in the system 
		$queri=("SELECT password FROM user_details where email='$u_name'");
		//retreive username and password for validation
		$query = ("SELECT password FROM user_details where email='$u_name' and password='$pass'");
		
		$u_resp=mysqli_query($conn,$queri);
		$response = mysqli_query($conn,$query);
		$rowu= mysqli_num_rows($u_resp);
		$rows= mysqli_num_rows($response);
		
		
		if($rowu)
		{
			if($rows==1)
			{
				echo "username verified proceed to respective page";
				header('Location:../pages/index.php');
				exit();
			}
			else
			{
				echo "invalid password please try again";
			}
		}else
		{
			echo "no such user";
		}
	}
}
?>
