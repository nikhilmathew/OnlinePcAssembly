<?php
include 'sqlconnect.php'; 

// this page is to check if a user is already present in the db
if(isset($_POST['register']))
	{		
			$u_name =trim($_POST['Username']);
			$pass = trim($_POST['Password']);
			$passe=sha1($pass);
			$mail = trim($_POST['eml']);
			$query=("select email from user_details where email='$mail'");
			$response= mysqli_query($conn,$query);
			$rowe= mysqli_num_rows($response);
			if($rowe)
			{
				echo "user already present ";
				echo "proceed to login";
			}
			else
			{
				$ipquery=("INSERT INTO user_details(`username`, `password`, `email`, `privelage`) VALUES ('$u_name','$passe','$mail','R')");
				if (mysqli_query($conn, $ipquery)) {
    				echo "New record created successfully";
					echo '<h4>Proceed to  <a href="loginpage.php"> Login</a></h4>';
				} else {
    				echo "Error: " . $ipquery . "<br>" . mysqli_error($conn);
					}
			}
	}
	else
	{
		echo "hack attempt";
	}

?>
<html>
<body onload="timer=setTimeout(function(){ window.location='../pages/viewretailer.php';}, 3000)">
<p> you will be redirected in 3 secs.</p>
</body>
</html>
