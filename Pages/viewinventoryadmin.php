<?php
include("layoutadmin.php");
?>
<html>
<head> 
<meta charset="utf-8">
<title>viewinventory</title>
</head>

<body>
<br>
<br><br><br>
<br><br>
<br><br><br>
<B>MOTHERBOARD INVENTORY<B>
<table border=1>
				<tr><td width=5% bgcolor=orange><b><font size=4>Retailer</font></b><td width=10% bgcolor=orange><b><font size=4>mid</font></b><td width=10% bgcolor=orange><b>
				<font size=4>ProductName</font></b><td width=10% bgcolor=orange><b><font size=4>Brand</font></b>
				<td width=10% bgcolor=orange><b><font size=4>FF</font></b><td width=10% bgcolor=orange><b>
				<font size=4>Description</font></b><td width=10% bgcolor=orange><b><font size=4>Socket</font></b>
				<td width=5% bgcolor=orange><b><font size=4>MemType</font></b><td width=10% bgcolor=orange><b>
				<font size=4>MemSlot</font></b><td width=10% bgcolor=orange><b>
				<font size=4>PcieSlot</font></b><td width=10% bgcolor=orange><b>
				<font size=4>Nsata</font></b><td width=10% bgcolor=orange><b>
				<font size=4>Power</font></b><td width=10% bgcolor=orange><b><font size=4>Price</font></b>

<?php
$user=$_SESSION['user'];
$retailer = ("select userid from user_details where email='$user'");
$f_reid = mysqli_query($conn,$retailer);
$reid = mysqli_fetch_assoc($f_reid);
$retid = $reid['userid'];
	$sql=mysqli_query($conn,"SELECT * FROM motherboard_inventory order by reid");
	
		while($row=mysqli_fetch_assoc($sql))
		{
			$dbreid=$row['reid'];
			$dbmid=$row['id'];
			$dbproductname = $row['productname'];
			$dbbrand = $row['brand'];
			$dbff = $row['ff'];
			$dbdescription=$row['description'];
			$dbsocket=$row['socket'];
			$dbmemtype=$row['memtype'];
			$dbmemslots=$row['memslots'];
			$dbpcieslots=$row['pcieslots'];
			$dbnsata=$row['nsata'];
			$dbpower=$row['power'];
			$dbprice=$row['price'];
		
				echo "<tr bgcolor=#a4".$dbreid."".$dbreid."><td>".$dbreid."<td>".$dbmid."<td>".$dbproductname."<td>".$dbbrand."<td>".$dbff."<td>".$dbdescription."<td>".$dbsocket."<td>".$dbmemtype."<td>".$dbmemslots."<td>".$dbpcieslots."<td>".$dbnsata."<td>".$dbpower."<td>".$dbprice."<tr>";
			
		}
?>
</table>
<br><br>
<B>PARTS INVENTORY<B>
<table border=1>
				<tr><td width=5% bgcolor=orange><b><font size=4>Retailer</font></b><td width=10% bgcolor=orange><b><font size=4>Pid</font></b><td width=10% bgcolor=orange><b>
				<font size=4>ProductName</font></b><td width=10% bgcolor=orange><b><font size=4>Brand</font></b>
				<td width=10% bgcolor=orange><b><font size=4>Type</font></b><td width=10% bgcolor=orange><b>
				<font size=4>Description</font></b><td width=10% bgcolor=orange><b><font size=4>FF</font></b>
				<td width=5% bgcolor=orange><b><font size=4>Socket</font></b><td width=10% bgcolor=orange><b>
				<font size=4>MemType</font></b><td width=10% bgcolor=orange><b>
				<font size=4>Power</font></b><td width=10% bgcolor=orange><b><font size=4>Price</font></b>

<?php
include '../login/sqlconnect.php';
$user=$_SESSION['user'];
$retailer = ("select userid from user_details where email='$user'");
$f_reid = mysqli_query($conn,$retailer);
$reid = mysqli_fetch_assoc($f_reid);
$retid = $reid['userid'];
	$sql=mysqli_query($conn,"SELECT * FROM parts_inventory order by reid");
	
		while($row=mysqli_fetch_assoc($sql))
		{
			$dbreid=$row['reid'];
			$dbpid=$row['id'];
			$dbproductname = $row['productname'];
			$dbbrand = $row['brand'];
			$dbtype = $row['type'];
			$dbdescription=$row['description'];
			$dbff=$row['ff'];
			$dbsocket=$row['socket'];
			$dbmemtype=$row['memtype'];
			$dbpower=$row['power'];
			$dbprice=$row['price'];
		
				echo "<tr bgcolor=#a4".$dbreid."".$dbreid."><td>".$dbreid."<td>".$dbpid."<td>".$dbproductname."<td>".$dbbrand."<td>".$dbtype."<td>".$dbdescription."<td>".$dbff."<td>".$dbsocket."<td>".$dbmemtype."<td>".$dbpower."<td>".$dbprice."<tr>";
			
		}
?>
</table>
<br><br>
<B>Accessory INVENTORY<B>
<table border=1>
				<tr><td width=5% bgcolor=orange><b><font size=4>Retailer</font></b><td width=10% bgcolor=orange><b><font size=4>Pid</font></b><td width=10% bgcolor=orange><b>
				<font size=4>ProductName</font></b><td width=10% bgcolor=orange><b><font size=4>Brand</font></b>
				<td width=10% bgcolor=orange><b><font size=4>Type</font></b><td width=10% bgcolor=orange><b>
				<font size=4>Description</font></b>
				<td width=10% bgcolor=orange><b><font size=4>Price</font></b>

<?php
include '../login/sqlconnect.php';
$user=$_SESSION['user'];
$retailer = ("select userid from user_details where email='$user'");
$f_reid = mysqli_query($conn,$retailer);
$reid = mysqli_fetch_assoc($f_reid);
$retid = $reid['userid'];
	$sql=mysqli_query($conn,"SELECT * FROM acc_inventory order by reid");
	
		while($row=mysqli_fetch_assoc($sql))
		{
			$dbreid=$row['reid'];
			$dbpid=$row['id'];
			$dbproductname = $row['productname'];
			$dbbrand = $row['brand'];
			$dbtype = $row['type'];
			$dbdescription=$row['description'];
			$dbprice=$row['price'];
		
				echo "<tr bgcolor=#a4".$dbreid."".$dbreid."><td>".$dbreid."<td>".$dbpid."<td>".$dbproductname."<td>".$dbbrand."<td>".$dbtype."<td>".$dbdescription."<td>".$dbprice."<tr>";
			
		}
?>
</table>
<br><br>
<B>Modifications INVENTORY<B>
<table border=1>
				<tr><td width=5% bgcolor=orange><b><font size=4>Retailer</font></b><td width=10% bgcolor=orange><b><font size=4>Pid</font></b><td width=10% bgcolor=orange><b>
				<font size=4>ProductName</font></b><td width=10% bgcolor=orange><b><font size=4>Brand</font></b>
				<td width=10% bgcolor=orange><b><font size=4>Type</font></b><td width=10% bgcolor=orange><b>
				<font size=4>Description</font></b>
				<td width=10% bgcolor=orange><b><font size=4>Price</font></b>

<?php
include '../login/sqlconnect.php';
$user=$_SESSION['user'];
$retailer = ("select userid from user_details where email='$user'");
$f_reid = mysqli_query($conn,$retailer);
$reid = mysqli_fetch_assoc($f_reid);
$retid = $reid['userid'];
	$sql=mysqli_query($conn,"SELECT * FROM modificationlist order by reid");
	
		while($row=mysqli_fetch_assoc($sql))
		{
			$dbreid=$row['reid'];
			$dbpid=$row['id'];
			$dbproductname = $row['productname'];
			$dbbrand = $row['brand'];
			$dbtype = $row['type'];
			$dbdescription=$row['description'];
			$dbprice=$row['price'];
		
				echo "<tr bgcolor=#a4".$dbreid."".$dbreid."><td>".$dbreid."<td>".$dbpid."<td>".$dbproductname."<td>".$dbbrand."<td>".$dbtype."<td>".$dbdescription."<td>".$dbprice."<tr>";
			
		}
?>
</table>

</body>
</html>