<?php
include("layoutret.php");
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
<br><br>
<B>PARTS INVENTORY<B>
<table border=1>
				<tr><td width=10% bgcolor=orange><b><font size=4>Pid</font></b><td width=10% bgcolor=orange><b><font size=4>TYPE</font></b><td width=10% bgcolor=orange><b>
				<font size=4>ProductName</font></b><td width=10% bgcolor=orange><b><font size=4>Brand</font></b>
				

<?php
include '../login/sqlconnect.php';
$user=$_SESSION['user'];
$retailer = ("select userid from user_details where email='$user'");
$f_reid = mysqli_query($conn,$retailer);
$reid = mysqli_fetch_assoc($f_reid);
$retid = $reid['userid'];
	$sql=mysqli_query($conn,"SELECT * FROM parts_inventory where reid='$retid'");
	
		while($row=mysqli_fetch_assoc($sql))
		{
			$dbpid=$row['id'];
			$dbproductname = $row['productname'];
			$type= $row['type'];
			$dbbrand = $row['brand'];
					
				echo "<tr ><td>".$dbpid."<td>".$type."<td>".$dbproductname."<td>".$dbbrand."<td width=10% bgcolor=red><a href=selectparts_del.php?selected_id=".$dbpid.">DELETE</a>";
			
		}
?>
</table>
<br><br>
<B>MOTHER INVENTORY<B>
<table border=1>
				<tr><td width=10% bgcolor=orange><b><font size=4>mid</font></b><td width=10% bgcolor=orange><b>
				<font size=4>ProductName</font></b><td width=10% bgcolor=orange><b><font size=4>Brand</font></b>

<?php

$user=$_SESSION['user'];
$retailer = ("select userid from user_details where email='$user'");
$f_reid = mysqli_query($conn,$retailer);
$reid = mysqli_fetch_assoc($f_reid);
$retid = $reid['userid'];
	$sql=mysqli_query($conn,"SELECT * FROM motherboard_inventory where reid='$retid'");
	
		while($row=mysqli_fetch_assoc($sql))
		{
			$dbmid=$row['id'];
			$dbproductname = $row['productname'];
			$dbbrand = $row['brand'];
					
				echo "<tr ><td>".$dbmid."<td>".$dbproductname."<td>".$dbbrand."<td width=10% bgcolor=red><a href=selectmot_del.php?selected_id=".$dbmid.">DELETE</a>";
			
		}
?>
</table>
<br><br>
<B>Accessories INVENTORY<B>
<table border=1>
				<tr><td width=10% bgcolor=orange><b><font size=4>Pid</font></b><td width=10% bgcolor=orange><b><font size=4>TYPE</font></b><td width=10% bgcolor=orange><b>
				<font size=4>ProductName</font></b><td width=10% bgcolor=orange><b><font size=4>Brand</font></b>
				

<?php
include '../login/sqlconnect.php';
$user=$_SESSION['user'];
$retailer = ("select userid from user_details where email='$user'");
$f_reid = mysqli_query($conn,$retailer);
$reid = mysqli_fetch_assoc($f_reid);
$retid = $reid['userid'];
	$sql=mysqli_query($conn,"SELECT * FROM acc_inventory where reid='$retid'");
	
		while($row=mysqli_fetch_assoc($sql))
		{
			$dbpid=$row['id'];
			$dbproductname = $row['productname'];
			$type= $row['type'];
			$dbbrand = $row['brand'];
					
				echo "<tr ><td>".$dbpid."<td>".$type."<td>".$dbproductname."<td>".$dbbrand."<td width=10% bgcolor=red><a href=selectacc_del.php?selected_id=".$dbpid.">DELETE</a>";
			
		}
?>
</table>
<br><br>
<B>Modifiactions INVENTORY<B>
<table border=1>
				<tr><td width=10% bgcolor=orange><b><font size=4>Pid</font></b><td width=10% bgcolor=orange><b><font size=4>TYPE</font></b><td width=10% bgcolor=orange><b>
				<font size=4>ProductName</font></b><td width=10% bgcolor=orange><b><font size=4>Brand</font></b>
				

<?php
include '../login/sqlconnect.php';
$user=$_SESSION['user'];
$retailer = ("select userid from user_details where email='$user'");
$f_reid = mysqli_query($conn,$retailer);
$reid = mysqli_fetch_assoc($f_reid);
$retid = $reid['userid'];
	$sql=mysqli_query($conn,"SELECT * FROM modificationlist where reid='$retid'");
	
		while($row=mysqli_fetch_assoc($sql))
		{
			$dbpid=$row['id'];
			$dbproductname = $row['productname'];
			$type= $row['type'];
			$dbbrand = $row['brand'];
					
				echo "<tr ><td>".$dbpid."<td>".$type."<td>".$dbproductname."<td>".$dbbrand."<td width=10% bgcolor=red><a href=selectmod_del.php?selected_id=".$dbpid.">DELETE</a>";
			
		}
?>
</table>
</body>
</html>