<?php
include("layoutadmin.php");
?>
<html>
<head> 
<meta charset="utf-8">
<title>build orders</title>
<style>
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
$retailer = ("select userid from user_details where email='$user'");
$f_reid = mysqli_query($conn,$retailer);
$reid = mysqli_fetch_assoc($f_reid);
$retid = $reid['userid'];
	$sql=mysqli_query($conn,"SELECT * FROM order_list where status != 'demo'  order by status");
	if(mysqli_num_rows($sql))
	{	
		echo'<table border=1><tr>
				<td width=10% bgcolor=orange><b><font size=4>Order ID</font></b>
				<td width=10% bgcolor=orange><b><font size=4>User ID</font></b>
				<td width=10% bgcolor=orange><b><font size=4>Retailer ID</font></b>
				<td width=10% bgcolor=orange><b><font size=4>Status</font></b>
				<td width=10% bgcolor=orange><b><font size=4>Order</font></b>
				<td width=10% bgcolor=orange><b><font size=4>Price</font></b>
				';
		while($row=mysqli_fetch_assoc($sql))
		{
			$uid = $row['uid'];
			$order = $row['orderstring'];
			$system = explode('^',$order);

			$price= $row['price'];
			$e = mysqli_fetch_assoc(mysqli_query($conn,"select username from user_details where userid='$uid'"));
				
					
				echo "<tr bgcolor=#ff".$row['uid']."".$row['uid']."><td>".$row['oid']."<td>".$row['uid']."<td>".$row['reid']."<td>".$row['status']."<td>";
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
					if($d['reid']==$retid){
					echo '<p class="has">'.$d['productname'].'</p><br>';
					}else{
						echo '<p class="hasnot">'.$d['productname'].'</p><br>';
					}

				}
				echo   "<td>".$price."";
			
		}
	}
?>
</table>

</div>
</body>
</html>