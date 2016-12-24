<?php
include("layout.php");
?>
<html>
<head> 
<meta charset="utf-8">
<title>build orders</title>
<style>
	body{
		background-color: darkgreen;
	}
	.iner{
		width:80%;
		margin-left: auto;
		margin-right: auto;
	}
	.has{
		color:white;
	}
	.hasnot{
		color:black;
	}
</style>
</head>

<body>
<br>
<br><br><br>
<br><br>
<br><br><br>
<br><br>
<B>Processing   Orders<B>
			
<div class="iner">
<?php
include '../login/sqlconnect.php';
$user=$_SESSION['user'];
$customer = ("select userid from user_details where email='$user'");
$c_id = mysqli_query($conn,$customer);
$cid = mysqli_fetch_assoc($c_id);
$custid = $cid['userid'];
	$sql=mysqli_query($conn,"SELECT * FROM order_list where status != 'demo' and uid='$custid'  order by orderdate DESC");
	if(mysqli_num_rows($sql))
	{	
		echo'<table border=1><tr>
				
				<td width=10% bgcolor=orange><b><font size=4>ID</font></b>
				<td width=10% bgcolor=orange><b><font size=4>Retailer Assigned</font></b>
				<td width=10% bgcolor=orange><b><font size=4>Status</font></b>
				<td width=10% bgcolor=orange><b><font size=4>Order</font></b>
				<td width=10% bgcolor=orange><b><font size=4>Order Date</font></b>
				<td width=10% bgcolor=orange><b><font size=4>Notification</font></b>
				<td width=10% bgcolor=orange><b><font size=4>Price</font></b>
				';
				$count=1;
		while($row=mysqli_fetch_assoc($sql))
		{
			$uid = $row['uid'];
			$order = $row['orderstring'];
			$system = explode('^',$order);
			if($row['reid']==0){$row['reid']='pending';}

			$price= $row['price'];
			$e = mysqli_fetch_assoc(mysqli_query($conn,"select username from user_details where userid='$uid'"));
				
					
				echo "<tr bgcolor=#366B12 class=has ><td>".$row['oid']."<td>".$row['reid']."<td>".$row['status']."<td>";
				for($x=1;$x<count($system);$x=$x+2){
					if($system[$x]=='M'){
						$x--;
						continue;
					}
					$a = mysqli_query($conn,"select * from inv_id_gen where id='$system[$x]'");
					$b = mysqli_fetch_assoc($a);
					$table= $b['table'];
					$idd = $b['id'];
					$c = mysqli_query($conn,"select * from $table where id='$idd'");
					$d = mysqli_fetch_assoc($c);
					
					echo '<p class="has">'.$d['productname'].'</p><br>';
					

				}
				echo   "<td>".$row['orderdate']."<td>".$row['notification']."<td>".$price."";
			
		}
	}
?>
</table>

</div>
</body>
</html>