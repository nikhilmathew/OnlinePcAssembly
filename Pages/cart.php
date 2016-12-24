<?php
include 'layout.php';
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
			$reuid = mysqli_query($conn,"select userid from user_details where email='$user'");
			if((mysqli_num_rows($reuid)==1)){
			$uida = mysqli_fetch_assoc($reuid);
			$uid = $uida['userid'];
			
			

			
				$query1 = mysqli_query($conn,"select * from shopping_cart where uid='$uid'");
				$x = mysqli_num_rows($query1);
				
				if ($x==0){
					echo '<p> CART EMPTY</p>';
				}else{
					$query2 =mysqli_query($conn,"select * from shopping_cart where uid='$uid'and typeofpurchase='s'");
					if(mysqli_num_rows($query2)){
						echo '<div style="border:1px solid black;margin:10px 10px 10px 10px;padding:20px 20px 20px 40px;"><h4 >SYSTEM CONFIGURATION</h4>';
						echo '<table border="3px solid black" style="align:center;"><tr ><th width="40%">productname</th><th width="7%">qty</th><th></th><th width="15%">price/unit</th><th width="15%">total price</th></tr>';
							
					while($row1 = mysqli_fetch_assoc($query2)){
						//$ptype = $row1['typeofpurchase'];
						//if($ptype == 's'){
						
							$cid = $row1['cartelement'];
							$pid = $row1['pid'];
							$rettable = mysqli_query($conn,"select * from inv_id_gen where id='$pid'");
							$tentry = mysqli_fetch_assoc($rettable);
							$tablename = $tentry['table'];
							$fetch_det = mysqli_query($conn,"select * from $tablename t,shopping_cart s where cartelement='$cid' and s.pid=t.id and typeofpurchase='s' ");
													
							///display the system configuration here///
							// and the total price and taxes and everything else
							$fetch = mysqli_fetch_assoc($fetch_det);
							$sprice =  $sprice+($fetch['price']*$fetch['qty']);
							
									//echo'<li style="text-align:left;"><span>'.$fetch['productname'].'------$'.$fetch['price'].'</span></li>';
									echo'<tr style="text-align:left;"><td width="40%">'.$fetch['productname'].'</td><td id="res'.$fetch['cartelement'].'" ><input style="width:40px;"  id="qty'.$fetch['cartelement'].'" type="number" min="1" max="20" name="quanty" value="'.$fetch['qty'].'"></td><td><input type="submit" value="update" onclick="updateCart('.$fetch['cartelement'].')"></td><td>'.$fetch['price'].'</td><td>'.$fetch['price']*$fetch['qty'].'</td><td><input type="submit" value="delete from cart" onclick="delCart('.$fetch['cartelement'].')"></td></tr></li>';
													
							
							}
							echo '</table>';
							echo "<br>total price of the system is $sprice";
							echo '</div>';
					}





					$query3 =mysqli_query($conn,"select * from shopping_cart where uid='$uid'and typeofpurchase='m'");
					if(mysqli_num_rows($query3)){
						echo '<div style="border:1px solid black;margin:10px 10px 10px 10px;padding:20px 20px 20px 40px;"><h4 >MODIFICATIONS</h4>';
						echo '<table border="3px solid black" style="align:center;"><tr ><th width="40%">productname</th><th width="7%">qty</th><th></th><th width="15%">price/unit</th><th width="15%">total price</th></tr>';
					while($row1 = mysqli_fetch_assoc($query3)){
						
							$cid = $row1['cartelement'];
							$pid = $row1['pid'];
							$rettable = mysqli_query($conn,"select * from inv_id_gen where id='$pid'");
							$tentry = mysqli_fetch_assoc($rettable);
							$tablename = $tentry['table'];
							$fetch_det = mysqli_query($conn,"select * from $tablename t,shopping_cart s where cartelement='$cid' and s.pid=t.id and typeofpurchase='m' ");
													
							///display the system configuration here///
							// and the total price and taxes and everything else
							$fetch = mysqli_fetch_assoc($fetch_det);
							$mprice =  $mprice+($fetch['price']*$fetch['qty']);
							
									//echo'<li style="text-align:left;"><span>'.$fetch['productname'].'------$'.$fetch['price'].'</span></li>';
									echo'<tr style="text-align:left;"><td width="40%">'.$fetch['productname'].'</td><td id="res'.$fetch['cartelement'].'" ><input style="width:40px;"  id="qty'.$fetch['cartelement'].'" type="number" min="1" max="20" name="quanty" value="'.$fetch['qty'].'"></td><td><input type="submit" value="update" onclick="updateCart('.$fetch['cartelement'].')"></td><td>'.$fetch['price'].'</td><td>'.$fetch['price']*$fetch['qty'].'</td><td><input type="submit" value="delete from cart" onclick="delCart('.$fetch['cartelement'].')"></td></tr></li>';
													
							
							}
							echo '</table>';
							echo "total cost of system modification is $mprice";
							echo '</div>';
					}
					
					$query4 =mysqli_query($conn,"select * from shopping_cart where uid='$uid'and typeofpurchase='p'");
					if(mysqli_num_rows($query4)){
						echo '<div style="border:1px solid black;margin:10px 10px 10px 10px;padding:20px 20px 20px 40px;"><h4 >INDIVIDUAL PARTS PURCHASE</h4>';
						echo '<table border="3px solid black" style="align:center;"><tr ><th width="40%">productname</th><th width="7%">qty</th><th></th><th width="15%">price/unit</th><th width="15%">total price</th></tr>';
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
									echo'<tr style="text-align:left;"><td width="40%">'.$fetch['productname'].'</td><td id="res'.$fetch['cartelement'].'" ><input style="width:40px;"  id="qty'.$fetch['cartelement'].'" type="number" min="1" max="20" name="quanty" value="'.$fetch['qty'].'"></td><td><input type="submit" value="update" onclick="updateCart('.$fetch['cartelement'].')"></td><td>'.$fetch['price'].'</td><td>'.$fetch['price']*$fetch['qty'].'</td><td><input type="submit" value="delete from cart" onclick="delCart('.$fetch['cartelement'].')"></td></tr></li>';
													
							
							}
							echo '</table>';
							echo "total cost of Individual Parts is $pprice";
							echo '</div>';
					}
					
					$query5 =mysqli_query($conn,"select * from shopping_cart where uid='$uid'and typeofpurchase='a'");
					if(mysqli_num_rows($query5)){
						echo '<div style="border:1px solid black;margin:10px 10px 10px 10px;padding:20px 20px 20px 40px;"><h4 >ACCESSORIES</h4>';
						echo '<table border="3px solid black" style="align:center;"><tr ><th width="40%">productname</th><th width="7%">qty</th><th></th><th width="15%">price/unit</th><th width="15%">total price</th></tr>';
						
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
									echo'<tr style="text-align:left;"><td width="40%">'.$fetch['productname'].'</td><td id="res'.$fetch['cartelement'].'" ><input style="width:40px;"  id="qty'.$fetch['cartelement'].'" type="number" min="1" max="20" name="quanty" value="'.$fetch['qty'].'"></td><td><input type="submit" value="update" onclick="updateCart('.$fetch['cartelement'].')"></td><td>'.$fetch['price'].'</td><td>'.$fetch['price']*$fetch['qty'].'</td><td><input type="submit" value="delete from cart" onclick="delCart('.$fetch['cartelement'].')"></td></tr></li>';
													
							
							}
							echo '</table>';
							echo "total cost of Accessories is $aprice";
							echo '</div>';
					}
				
				echo '<div> 
							<p><a href="index.php">Continue Shopping</a></p>
							<p><a href="orderdeliveryaddress.php"> Place Order</a></p>';	
				}
				echo '<div style="border:1px solid black;margin:10px 10px 10px 10px;padding:20px 20px 20px 40px;">';
						$total=$sprice+$pprice+$mprice+$aprice;
						echo "<h3>Sum Total Cost is $total</h3>";
						echo'</div>';
			}
			?>
			</div>
	</div>
</div>	
<script src="../js/updatecart.js"></script>
</body>
</html>
