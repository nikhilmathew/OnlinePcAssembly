<?PHP

session_start();

if (!(isset($_SESSION['user']) && $_SESSION['user'] != 'guest')) {

$_SESSION['user']='guest';

}

?>
<html>
<head>
<meta charset="utf-8">


<style type="text/css">
	#sitetitle{
		position: relative;
		top:300px;
		z-index: 100;
	}
	.topdiv {
    position: fixed;
	background:url(../sao.jpg) opacity:0.5; 
	
	
    top: 0px;
	left:-5px;
    width:105%;
    height: 80px;
    overflow: hidden !important;
        overflow-x: hidden;
        overflow-y: hidden;
   
    
    /*background: none repeat scroll 0% 0% rgba(125,125,125,1);*/
    z-index: 100;
    
 }
 #logopic{
	width:110px;
	height:80px;
	
	position: fixed;
	margin-left: -10px;
}
#sitetitle{
	font-size: 32px;
	top:0px;
		margin-top: -20px;
	text-align: center;
}
#sitetitle p{
	opacity:1;
	color:white;
}
#sitetitle p a{
	text-decoration: none;
	color:white;
}
#menubar {
	position:relative;
	float:right;
	display:block;
	padding-left: 5px;
	left:2px;
	width:105%;
	
	margin-top:10px;
	list-style: none;
	left:60px;
}
.login{
	position: fixed;
	top:25px;
	z-index:200;
	left:88%;
	
	border: transparent;
	border-spacing: 2px;

}
.cart{
	position: fixed;
	top:25px;
	z-index:200;
	left:85%;
	
	border: transparent;
	border-spacing: 2px;
}
#container{
	position:fixed;
	width:105%;
	top:13px;
	
	margin-top:67px;
	margin-left: -8px;
    border: 3px  ;
    padding:0px 200px 0px 175px;
    z-index:20;
    
}
.li1{
	border:1px ;
	background-color: rgba(234,242,150,0.4);
	border-radius: 55px;
	border-spacing: 2px;
	float:left;
	opacity:1;
	display:inline;
	margin-right: 20px;
	margin-left: 20px;
	padding:15px;
	padding-right: 20px;
	padding-left: 20px;
	z-index:20;

}
.li1 a{
	color:white;
}
#tital{
	opacity:1;
}


</style>
<?php

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
 			<p><a id="tital" href="index.php">Pc Assembly Online</a></p>
 		</div>
 		
 		<div class="login">
 <?php if($_SESSION['user']=='guest')
 {echo'<a class="li1" href="../login/loginpage2.php"> Login</a>';} 
 else { echo '<a href="../login/logout.php" class="li1" onclick="return logout()" >'.$_SESSION['username'].'</a>' ;}?>
 </div>
 <div class="Cart" onload="">
 <!--<a href="cart.php"><img src="../login/signup.jpg" height="50px" width="80px" alt="Cart" ><?php/*
 		if($_SESSION['user'] != 'guest'){
 		$user= $_SESSION['user'];
		$reuid = mysqli_query($conn,"select userid from user_details where email='$user'");
		if((mysqli_num_rows($reuid)==1)){
		$uida = mysqli_fetch_assoc($reuid);
		$uid = $uida['userid'];}
		$abc = mysqli_query($conn,"select count(*) from shopping_cart where uid='$uid'");
		$def = mysqli_fetch_assoc($abc);
		echo $def['count(*)'];}*/ ?></a>-->
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
