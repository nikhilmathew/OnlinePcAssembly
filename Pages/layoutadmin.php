<?PHP

session_start();

if ($_SESSION['priv']!='A') {
    if ($_SESSION['priv']=='R') {
header('Location:retailerhome.php');
}else{
header('Location:index.php');
}
}

?>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="../css/layout.css">

<?php
//session_id('');
$conn = mysqli_connect("localhost", "root","","pcassembly") or die("Connection failed: " . mysqli_connect_error()) ;
// Check connection
?>

<script>
function logout() {
    var x;
    if (confirm("do you want to log out??") == true) {
        x = "You pressed OK!";
        return true;
    } else {
        x = "You pressed Cancel!";
        return false;
        
    }
     
}
</script>
<style>

.button {
   border: 2px solid #0a3c59;
   background: #821212;
   background: -webkit-gradient(linear, left top, left bottom, from(#ed1717), to(#821212));
   background: -webkit-linear-gradient(top, #ed1717, #821212);
   background: -moz-linear-gradient(top, #ed1717, #821212);
   background: -ms-linear-gradient(top, #ed1717, #821212);
   background: -o-linear-gradient(top, #ed1717, #821212);
   background-image: -ms-linear-gradient(top, #ed1717 0%, #821212 100%);
   padding: 13.5px 27px;
   -webkit-border-radius: 24px;
   -moz-border-radius: 24px;
   border-radius: 24px;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   text-shadow: #7ea4bd 0 1px 0;
   color: #ffffff;
   font-size: 16px;
   font-family: helvetica, serif;
   text-decoration: none;
   vertical-align: middle;
   }
.button:hover {
   border: 2px solid #0a3c59;
   text-shadow: #1e4158 0 1px 0;
   background: #d4ed13;
   background: -webkit-gradient(linear, left top, left bottom, from(#f01818), to(#d4ed13));
   background: -webkit-linear-gradient(top, #f01818, #d4ed13);
   background: -moz-linear-gradient(top, #f01818, #d4ed13);
   background: -ms-linear-gradient(top, #f01818, #d4ed13);
   background: -o-linear-gradient(top, #f01818, #d4ed13);
   background-image: -ms-linear-gradient(top, #f01818 0%, #d4ed13 100%);
   color: #fff;
   }
.button:active {
   text-shadow: #1e4158 0 1px 0;
   border: 2px solid #0a3c59;
   background: #33571b;
   background: -webkit-gradient(linear, left top, left bottom, from(#4fe016), to(#d4ed13));
   background: -webkit-linear-gradient(top, #4fe016, #33571b);
   background: -moz-linear-gradient(top, #4fe016, #33571b);
   background: -ms-linear-gradient(top, #4fe016, #33571b);
   background: -o-linear-gradient(top, #4fe016, #33571b);
   background-image: -ms-linear-gradient(top, #4fe016 0%, #33571b 100%);
   color: #fff;
   }
</style>
</head>

<body>

	<div class="topdiv" >

 		<!--<img id="logopic" src="sao.jpg"  alt="pc assembly online logo"/>-->
 		<div id="sitetitle">
 			<p><a href="index.php">Pc Assembly Online</a></p>
 		</div>
 		<div class="md-modal md-effect-18" id="modal-18">
			<div class="md-content">
				<h3>Modal Dialog</h3>
				<div>
					<p>This is a modal window. You can do the following things with it:</p>
					<ul>
						<li><strong>Read:</strong> modal windows will probably tell you something important so don't forget to read what they say.</li>
						<li><strong>Look:</strong> a modal window enjoys a certain kind of attention; just look at it and appreciate its presence.</li>
						<li><strong>Close:</strong> click on the button below to close the modal.</li>
					</ul>
					<button class="md-close">Close me!</button>
				</div>
			</div>
		</div>
 		<div class="login2">
 <?php if($_SESSION['user']=='guest')
 {echo'<a href="../login/loginpage2.php"><img src="../images/guest-48.png" height="30px" width="40px" alt="Login/SignUp"></a>';} 
 else { echo '<a href="../login/logout.php" class="button" onclick="return logout()">'.$_SESSION['user'].'</a>' ;}?>
 </div>
 
 	</div>
 	
 <div id="container">
 	<ul id="menubar">
 		<li class="li1"><a href="viewretailer.php">Retailer Management</a></li>
 		<!--<li class="li1">Laptops</li>-->
 		<li class="li1"><a href="viewcustomer.php">Customer Management</a></li>
 		<li class="li1"><a href="viewinventoryadmin.php"> Inventory</a></li>
 		<li class="li1"><a href="viewordersadmin.php"> Orders</a></li>
 		
 		
 	</ul>
 </div>
 <div></div>
</body>
</html>
