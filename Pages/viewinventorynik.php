<?php
include '../login/sqlconnect.php';
//include 'layout.php';
session_start();
if( (isset ($_SESSION['user'])) && ($_SESSION['priv']=='U'))
{
	echo "customer".$_SESSION['user'];
	}else{
	echo "hack attempt".$_SESSION['user'];
}


	$typesel= array("cab"=>"cab","cpu"=>"cpu","ram"=>"ram","gpu"=>"gpu","hdd"=>"hdd","opd"=>"opd","nic"=>"nic");

	$result=mysqli_query($conn,"select * from motherboard_inventory");
echo "<table border='1'>

<tr>
<th>picture</th>
<th>productname</th>
<th>brand</th>
<th>formfactor</th>
<th>description</th>
<th>socket type</th>
<th>memory type</th>
<th>mem slots</th>
<th>pcieslots</th>
<th>no sata</th>
<th>price</th>
</tr>";	
	while($row=mysqli_fetch_assoc($result))
	{
	echo "<tr>";
	echo '<td><img src="'.$row['picture'].'" width="100px" height="80px" alt="img missing"></td>';
	echo "<td>".$row['productname']."</td>";
	echo "<td>".$row['brand']."</td>";
	echo "<td>".$row['ff']."</td>";
	echo "<td>".$row['description']."</td>";
	echo "<td>".$row['socket']."</td>";
	echo "<td>".$row['memtype']."</td>";
	echo "<td>".$row['memslots']."</td>";
	echo "<td>".$row['pcieslots']."</td>";
	echo "<td>".$row['nsata']."</td>";
	echo "<td>".$row['price']."</td>";
	echo "</tr>";

	
	}
echo "</table>";

foreach($typesel as $x => $x_type) {
	echo "<br><br>";
	$resultp=mysqli_query($conn,"select * from parts_inventory where type='$x_type'");

echo "<table border='1'>

<tr>
<th>picture</th>
<th>productname</th>
<th>brand</th>
<th>formfactor</th>
<th>description</th>
<th>socket type</th>
<th>memory type</th>
<th>price</th>
</tr>";	
	while($row=mysqli_fetch_assoc($resultp))
	{
	echo "<tr>";      
	echo '<td><img src="'.$row['picture'].'" width="100px" height="80px" alt="img missing"></td>';
	echo "<td>".$row['productname']."</td>";
	echo "<td>".$row['brand']."</td>";
	echo "<td>".$row['ff']."</td>";
	echo "<td>".$row['description']."</td>";
	echo "<td>".$row['socket']."</td>";
	echo "<td>".$row['memtype']."</td>";
	echo "<td>".$row['price']."</td>";
	echo "</tr>";

	
	}
echo "</table>";
}

?>
