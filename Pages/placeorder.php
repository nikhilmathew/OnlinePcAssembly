<?php
include 'layout.php';
?>
<html>
<head>
<title> System Order Confirm</title>
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
			$reuid = mysqli_query($conn,"select * from user_details where email='$user'");
			if((mysqli_num_rows($reuid)==1)){
			$uida = mysqli_fetch_assoc($reuid);
			$uid = $uida['userid'];
			$deladd = $_SESSION['deliveryaddress'];
			
			

			
				$query1 = mysqli_query($conn,"select * from shopping_cart where uid='$uid'");
				$x = mysqli_num_rows($query1);
				
				if ($x==0){
					echo 'Cart empty';
				}else{
					
						$query2 = mysqli_query($conn,"select * from shopping_cart where uid='$uid' and typeofpurchase= 's' or typeofpurchase='m'");
						$x2 = mysqli_num_rows($query2);
						if($x2>0)
						{
							$orders = 'S';
							$orderm = 'M';
							$mflag=0;
							$sprice=0;
							while($row1 = mysqli_fetch_assoc($query2))
							{
								$ptype = $row1['typeofpurchase'];

								if($ptype == 's'){
								$pid = $row1['pid'];
								$orders.='^'.$pid.'^'.$row1['qty'];
								}
								if($ptype == 'm'){
									$mflag=1;
								$pid = $row1['pid'];
								$orderm.='^'.$pid.'^'.$row1['qty'];	
								}
								$rettable = mysqli_query($conn,"select * from inv_id_gen where id='$pid'");
								$tentry = mysqli_fetch_assoc($rettable);
								$tablename = $tentry['table'];
							
								$fetch_det = mysqli_query($conn,"select * from $tablename where id='$pid'");
							

								$fetch = mysqli_fetch_assoc($fetch_det);
								$price =  $price+($fetch['price']*$row1['qty']);
							}
							//////system display
							$query2 =mysqli_query($conn,"select * from shopping_cart where uid='$uid'and typeofpurchase='s'");
							if(mysqli_num_rows($query2)){
								echo '<div style="border:1px solid black;margin:10px 10px 10px 10px;padding:20px 20px 20px 40px;"><h4 >SYSTEM CONFIGURATION</h4>';
								echo '<table border="3px solid black" style="align:center;"><tr ><th width="40%">productname</th><th width="7%">qty</th><th width="15%">price/unit</th><th width="15%">total price</th></tr>';
							
							while($row1 = mysqli_fetch_assoc($query2)){
							//$ptype = $row1['typeofpurchase'];
							//if($ptype == 's'){
						
							$cid = $row1['cartelement'];
							$pid = $row1['pid'];
							$rettable = mysqli_query($conn,"select * from inv_id_gen where id='$pid'");
							$tentry = mysqli_fetch_assoc($rettable);
							$tablename = $tentry['table'];
							$fetch_det = mysqli_query($conn,"select * from $tablename t,shopping_cart s where cartelement='$cid' and s.pid=t.id and typeofpurchase='s' ");
													
							$fetch = mysqli_fetch_assoc($fetch_det);
							$sprice =  $sprice+($fetch['price']*$fetch['qty']);
							
									//echo'<li style="text-align:left;"><span>'.$fetch['productname'].'------$'.$fetch['price'].'</span></li>';
									echo'<tr style="text-align:left;"><td width="40%">'.$fetch['productname'].'</td><td id="res'.$fetch['cartelement'].'" >'.$fetch['qty'].'</td><td>'.$fetch['price'].'</td><td>'.$fetch['price']*$fetch['qty'].'</td></tr></li>';
													
							
							}
							echo '</table>';
							echo "<br>total price of the system is $sprice";
							echo '</div>';
							}

							////modification display
							$mprice=0;
							$query3 =mysqli_query($conn,"select * from shopping_cart where uid='$uid'and typeofpurchase='m'");
							if(mysqli_num_rows($query3)){
								
								echo '<div style="border:1px solid black;margin:10px 10px 10px 10px;padding:20px 20px 20px 40px;"><h4 >MODIFICATIONS</h4>';
								echo '<table border="3px solid black" style="align:center;"><tr ><th width="40%">productname</th><th width="7%">qty</th><th width="15%">price/unit</th><th width="15%">total price</th></tr>';
							while($row1 = mysqli_fetch_assoc($query3)){
						
							$cid = $row1['cartelement'];
							$pid = $row1['pid'];
							$rettable = mysqli_query($conn,"select * from inv_id_gen where id='$pid'");
							$tentry = mysqli_fetch_assoc($rettable);
							$tablename = $tentry['table'];
							$fetch_det = mysqli_query($conn,"select * from $tablename t,shopping_cart s where cartelement='$cid' and s.pid=t.id and typeofpurchase='m' ");
													
							
							$fetch = mysqli_fetch_assoc($fetch_det);
							$mprice =  $mprice+($fetch['price']*$fetch['qty']);
							
									//echo'<li style="text-align:left;"><span>'.$fetch['productname'].'------$'.$fetch['price'].'</span></li>';
									echo'<tr style="text-align:left;"><td width="40%">'.$fetch['productname'].'</td><td id="res'.$fetch['cartelement'].'" >'.$fetch['qty'].'</td><td>'.$fetch['price'].'</td><td>'.$fetch['price']*$fetch['qty'].'</td></tr></li>';
													
							
							}
							echo '</table>';
							echo "total cost of system modification is $mprice";
							echo '</div>';
							}	
							/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
							
							$price = $price +($price*0.10);
							if($mflag==1){
							$orders.='^'.$orderm;
							}
							echo 'Additional Assembly Charges - 10%<br>';

							echo "total price of the system is $price";

							$ins = ("INSERT INTO order_list(uid,status,orderstring,price,deliveryadd)  VALUES     ('$uid','pending','$orders','$price','$deladd')");
							if(mysqli_query($conn,$ins)){
								echo '<p>order placed successfully</p>';
								$del = mysqli_query($conn,"delete from shopping_cart where uid='$uid' and typeofpurchase='s' or typeofpurchase='m'");
							}else{
								echo '<p> could not place order...</p><p>there seems to be some problem with the cross dimension teleporter...</p><p>please have patience as spiderman tries to fix the problem</p>';
							}	
						}



						$query3 = mysqli_query($conn,"select * from shopping_cart where uid='$uid' and typeofpurchase= 'a' ");
						$x3 = mysqli_num_rows($query3);
						if($x3>0)
						{
							$ordera = 'A';
							$aprice=0;
							$acprice=0;
							while($row1 = mysqli_fetch_assoc($query3))
							{
								$ptype = $row1['typeofpurchase'];

								if($ptype == 'a'){
								$pid = $row1['pid'];
								$ordera.='^'.$pid.'^'.$row1['qty'];
								}
								
								$rettable = mysqli_query($conn,"select * from inv_id_gen where id='$pid'");
								$tentry = mysqli_fetch_assoc($rettable);
								$tablename = $tentry['table'];
							
								$fetch_det = mysqli_query($conn,"select * from $tablename where id='$pid'");
							

								$fetch = mysqli_fetch_assoc($fetch_det);
								$acprice =  $acprice+($fetch['price']*$row1['qty']);
							}
							//////acc display
								$query5 =mysqli_query($conn,"select * from shopping_cart where uid='$uid'and typeofpurchase='a'");
							if(mysqli_num_rows($query5)){
								echo '<div style="border:1px solid black;margin:10px 10px 10px 10px;padding:20px 20px 20px 40px;"><h4 >ACCESSORIES</h4>';
								echo '<table border="3px solid black" style="align:center;"><tr ><th width="40%">productname</th><th width="7%">qty</th><th width="15%">price/unit</th><th width="15%">total price</th></tr>';
						
							while($row1 = mysqli_fetch_assoc($query5)){
								//$ptype = $row1['typeofpurchase'];
								//if($ptype == 's'){
						
							$cid = $row1['cartelement'];
							$pid = $row1['pid'];
							$rettable = mysqli_query($conn,"select * from inv_id_gen where id='$pid'");
							$tentry = mysqli_fetch_assoc($rettable);
							$tablename = $tentry['table'];
							$fetch_det = mysqli_query($conn,"select * from $tablename t,shopping_cart s where cartelement='$cid' and s.pid=t.id and typeofpurchase='a' ");
													
							///display the system configuration here///
							// and the total price and taxes and everything else
							$fetch = mysqli_fetch_assoc($fetch_det);
							$aprice =  $aprice+($fetch['price']*$fetch['qty']);
							
									//echo'<li style="text-align:left;"><span>'.$fetch['productname'].'------$'.$fetch['price'].'</span></li>';
									echo'<tr style="text-align:left;"><td width="40%">'.$fetch['productname'].'</td><td id="res'.$fetch['cartelement'].'" >'.$fetch['qty'].'</td><td>'.$fetch['price'].'</td><td>'.$fetch['price']*$fetch['qty'].'</td></tr></li>';
													
							
							}
							echo '</table>';
							echo "total cost of Accessories is $aprice";
							echo '</div>';
							}	
							
							

							$ins = ("INSERT INTO order_list(uid,status,orderstring,price,deliveryadd)  VALUES     ('$uid','pending','$ordera','$acprice','$deladd')");
							if(mysqli_query($conn,$ins)){
								echo '<p>order placed successfully</p>';
								$del = mysqli_query($conn,"delete from shopping_cart where uid='$uid' and typeofpurchase='a'");
							}else{
								echo '<p> could not place order...</p><p>there seems to be some problem with the cross dimension teleporter...</p><p>please have patience as spiderman tries to fix the problem</p>';
							}			
						}
							
						$query4 = mysqli_query($conn,"select * from shopping_cart where uid='$uid' and typeofpurchase= 'p' ");
						$x4 = mysqli_num_rows($query4);
						if($x4>0)
						{
							$orderp = 'P';
							$pprice=0;
							$paprice=0;
							while($row1 = mysqli_fetch_assoc($query4))
							{
								$ptype = $row1['typeofpurchase'];

								if($ptype == 'p'){
								$pid = $row1['pid'];
								$orderp.='^'.$pid.'^'.$row1['qty'];
								}
								
								$rettable = mysqli_query($conn,"select * from inv_id_gen where id='$pid'");
								$tentry = mysqli_fetch_assoc($rettable);
								$tablename = $tentry['table'];
							
								$fetch_det = mysqli_query($conn,"select * from $tablename where id='$pid'");
							

								$fetch = mysqli_fetch_assoc($fetch_det);
								$paprice =  $paprice+($fetch['price']*$row1['qty']);
							}
							//////parts display
								$query4 =mysqli_query($conn,"select * from shopping_cart where uid='$uid'and typeofpurchase='p'");
							if(mysqli_num_rows($query4)){
								echo '<div style="border:1px solid black;margin:10px 10px 10px 10px;padding:20px 20px 20px 40px;"><h4 >INDIVIDUAL PARTS PURCHASE</h4>';
								echo '<table border="3px solid black" style="align:center;"><tr ><th width="40%">productname</th><th width="7%">qty</th><th width="15%">price/unit</th><th width="15%">total price</th></tr>';
								while($row1 = mysqli_fetch_assoc($query4)){
								//$ptype = $row1['typeofpurchase'];
								//if($ptype == 's'){
						
							$cid = $row1['cartelement'];
							$pid = $row1['pid'];
							$rettable = mysqli_query($conn,"select * from inv_id_gen where id='$pid'");
							$tentry = mysqli_fetch_assoc($rettable);
							$tablename = $tentry['table'];
							$fetch_det = mysqli_query($conn,"select * from $tablename t,shopping_cart s where cartelement='$cid' and s.pid=t.id and typeofpurchase='p' ");
													
							///display the system configuration here///
							// and the total price and taxes and everything else
							$fetch = mysqli_fetch_assoc($fetch_det);
							$pprice =  $pprice+($fetch['price']*$fetch['qty']);
							
									//echo'<li style="text-align:left;"><span>'.$fetch['productname'].'------$'.$fetch['price'].'</span></li>';
									echo'<tr style="text-align:left;"><td width="40%">'.$fetch['productname'].'</td><td id="res'.$fetch['cartelement'].'" >'.$fetch['qty'].'</td><td>'.$fetch['price'].'</td><td>'.$fetch['price']*$fetch['qty'].'</td></tr></li>';
													
							
							}
							echo '</table>';
							echo "total cost of Individual Parts is $pprice";
							echo '</div>';
							}
							

							$ins = ("INSERT INTO order_list(uid,status,orderstring,price,deliveryadd)  VALUES     ('$uid','pending','$orderp','$paprice','$deladd')");
							if(mysqli_query($conn,$ins)){
								echo '<p>order placed successfully</p>';
								$del = mysqli_query($conn,"delete from shopping_cart where uid='$uid' and typeofpurchase='p'");
							}else{
								echo '<p> could not place order...</p><p>there seems to be some problem with the cross dimension teleporter...</p><p>please have patience as spiderman tries to fix the problem</p>';
							}			
						}
					
				}	
				
				}
			
			?>

	</div>
</div>	

</body>
</html>
