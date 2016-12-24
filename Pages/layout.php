<?PHP

session_start();

if (!(isset($_SESSION['user']) && $_SESSION['user'] != 'guest')) {

$_SESSION['user']='guest';

}

?>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="../css/layout.css">
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
</head>

<body>

	<div class="topdiv" >

 		<!--<img id="logopic" src="sao.jpg"  alt="pc assembly online logo"/>-->
 		<div id="sitetitle">
 			<p><a href="index.php">Pc Assembly Online</a></p>
 		</div>
 		
 		<div class="login">
 <?php if($_SESSION['user']=='guest')
 {echo'<a href="../login/loginpage2.php" class="button">Login</a>';} 
 else { echo '<div class="dropdown" ><ul><a href="" class="button" >'.$_SESSION['username'].'</a>
  <li class="button"><a href="changepass.php">change password</a></li>   <li class="button"><a href="vieworderscustomer.php">View Order History</a></li>
<li class="button"><a href="../login/logout.php"  onclick="return logout()" >Logout</a></li></ul></div>' ;}?>
 </div>
 <div class="Cart" onload="">
 <a href="cart.php" style="color:white;text-decoration:none;"><img src="../images/checkout-48.png" height="30px" width="40px" alt="Cart" ><?php
 		if($_SESSION['user'] != 'guest'){
 		$user= $_SESSION['user'];
		$reuid = mysqli_query($conn,"select userid from user_details where email='$user'");
		if((mysqli_num_rows($reuid)==1)){
		$uida = mysqli_fetch_assoc($reuid);
		$uid = $uida['userid'];}
		$abc = mysqli_query($conn,"select count(*) from shopping_cart where uid='$uid'");
		$def = mysqli_fetch_assoc($abc);
		echo $def['count(*)'];} ?></a>
 </div>
 	</div>
 	
 <div id="container">
 	<ul id="menubar">
 		<li class="li1"><a href="Desktopcat.php">Desktops</a></li>
 		<!--<li class="li1">Laptops</li>-->
 		<li class="li1"><a href="individualpartspurchase.php">Parts/ Desktop components</a></li>
 		<li class="li1"><a href="accessorypurchase.php"> Accessories</a></li>
 		<li class="li1"><a href="contact.php"> Contact Us</a></li>
 		<li class="li1"><a href="about.php"> About Us</a></li>
 		
 	</ul>
 </div>
 <div></div>
</body>
</html>
