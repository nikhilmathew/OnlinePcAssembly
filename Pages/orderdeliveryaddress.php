<?php
include 'layout.php';
$user= $_SESSION['user'];

?>
<html>
<head>
<title> System Config Display</title>
<!--<script type="text/javascript">
window.onload = function(){
	setInterval("viewCart();",5000);

}
function timedRefresh(){
	setTimeout("location.reload(true);",1000);
}
</script>-->
<style>


.pagediv{
	margin-left: auto;
	margin-right: auto;
}
#topdiv{
	width:90%;
	margin-top: 200px;

}
#layer2{
	width:56%;
	text-align: center;
	border:1px solid red;
}
</style>
</head>
<body>
<div id ="topdiv" class="pagediv">
	<div id="layer2" class="pagediv">

	<h2> Shopping Cart</h2>
	<div id="cartdata" >
	<?php  
			$user= $_SESSION['user'];
			$sprice=0;$mprice=0;$aprice=0;$pprice=0;$total=0;
			$reuid = mysqli_query($conn,"select * from user_details where email='$user'");
			if((mysqli_num_rows($reuid)==1)){
			$uida = mysqli_fetch_assoc($reuid);
			$uid = $uida['userid'];
			$add = $uida['address'];
			
			echo '<form action="addresstosession.php" method="post">
			<h3>Please Specify the Delivery Address .Proceed if delivery address is same as ur address</h3>
			<textarea name="add"  rows="6" cols="50" required="required" autofocus="autofocus">'.$add.'</textarea>
			<h3><input type="submit" name="addrecd" value="proceed"><input type="reset"></h3>
			</form>';

			}
				
			?>
			</div>
	</div>
</div>	
<script src="../js/updatecart.js"></script>
</body>
</html>
