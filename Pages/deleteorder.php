<?php
include 'layout.php';
?>
<html>
<head>
<title> System Config Display</title>
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

	<h2> System Configuration</h2>
	<?php 
			$user= $_SESSION['user'];
			$price=0;
			$reuid = mysqli_query($conn,"select userid from user_details where email='$user'");
			if((mysqli_num_rows($reuid)==1)){
			$uida = mysqli_fetch_assoc($reuid);
			$uid = $uida['userid'];
			
			mysqli_query($conn,"delete from shopping_cart where uid='$uid' and typeofpurchase='b'");

			
				$query1 = mysqli_query($conn,"select * from shopping_cart where uid='$uid'");
				$x = mysqli_num_rows($query1);
				
				if ($x==0){
					echo '<p> CART EMPTY</p>';
				}else{
					
					while($row1 = mysqli_fetch_assoc($query1)){
						$ptype = $row1['typeofpurchase'];

						if($ptype == 's'){
							$pid = $row1['pid'];
							
							$rettable = mysqli_query($conn,"select * from inv_id_gen where id='$pid'");
							$tentry = mysqli_fetch_assoc($rettable);
							$tablename = $tentry['table'];
							$fetch_det = mysqli_query($conn,"select * from $tablename where id='$pid'");
													
							///display the system configuration here///
							// and the total price and taxes and everything else
							echo '<ul>';
							$fetch = mysqli_fetch_assoc($fetch_det);
							$price =  $price+$fetch['price'];
							
									echo'<li style="text-align:left;"><span>'.$fetch['productname'].'------$'.$fetch['price'].'</span></li>';
													
							echo '</ul>';
							


						}
					}
					
				echo "total price of the system is $price";
				echo '<div> <p><a href="deleteorder.php">cancel this order</a></p>
							<p><a href="placeorder.php"> Buy this Configuration</a></p>';	
				}
			}
			?>

	</div>
</div>	

</body>
</html>
