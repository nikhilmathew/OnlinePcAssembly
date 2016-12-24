<?php 
require '../mail/PHPMailerAutoload.php';
include '../pages/layout.php';
$_SESSION['flag']=0;/*require('includes/config.php'); 

//if logged in redirect to members page
if( $user->is_logged_in() ){ header('Location: memberpage.php'); } 

//if form has been submitted process it
if(isset($_POST['submit'])){
*/
	//email validation
	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$_SESSION['emailforresetrequest'] = $email;
		$stmt = ("SELECT * FROM user_details WHERE email = '$email'");
		$query = mysqli_query($conn,$stmt);

	    if(mysqli_num_rows($query)==1){
	    	$row = mysqli_fetch_assoc($query);
	    	$_SESSION['flag'] = 0;
			$token = $row['password'];
				//send email
				
				$mail = new PHPMailer;
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'onlinepcassembly@gmail.com';                 // SMTP username
				$mail->Password = 'nejmitainu';                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    // TCP port to connect to

				$mail->From = 'onlinepcassembly@gmail.com';
				$mail->FromName = 'opa';
				$mail->addAddress($email);     // Add a recipient
				$mail->isHTML(true);                                  // Set email format to HTML

				$mail->Subject = 'Password Reset';
				$mail->Body    = "Someone requested that the password be reset. \n\nIf this was a mistake, just ignore this email and nothing will happen.\n\nTo reset your password, visit the following address: localhost/onlinepcassembly/login/resetform.php?key='$token'";
				$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				if(!$mail->send()) {
    					echo '<div style="margin-top:200px;width:80%;margin-left:auto;margin-right:auto;">Message could not be sent.Please check you internet connection</div>';
    					echo 'Mailer Error: ' . $mail->ErrorInfo;
					} else {
    					echo '<div style="margin-top:200px;width:80%;margin-left:auto;margin-right:auto;">Message has been sent.redirecting....<div>';
    					echo '<script type="text/javascript">
							window.location.href="resetform.php";
							</script>
							<noscript>
							<meta http-equiv="refresh" content="2;url=resetform.php"/>
							</noscript>';
					}	
					
					//redirect to index page
					//header('Location: resetform.php');				
		
					
	    		} else {
	    	$_SESSION['flag'] = 1;
			}
	}



//define page title
$title = 'Reset Account';


?>
<html>
<head>
<style>
.container{
	
	margin-top:200px;
}
</style>
</head>
<body>
<div class="container" >

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="resetpassword.php" autocomplete="off">
				<h2>Reset Password</h2>
				<p><a href='loginpagedemo.php'>Back to login page</a></p>
				

				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" value="" tabindex="1">
				</div>
				
				
				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Sent Reset Link" class="btn btn-primary btn-block btn-lg" tabindex="2"></div>
					<div > <p><?php if($_SESSION['flag']==1){echo'Invalid Email id Please Check the Data u have entered';}?></p></div>
				</div>
			</form>
		</div>
	</div>


</div>

<?php 
