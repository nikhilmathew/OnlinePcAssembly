<?php
include '../login/sqlconnect.php';
include 'layout.php';

if( (isset ($_SESSION['user'])) && ($_SESSION['priv']=='U'))
{
	echo "customer".$_SESSION['user'];
}else{
	echo "hack attempt".$_SESSION['user'];
}

$result=mysqli_query($conn,"select * from parts_inventory");

while($row=mysqli_fetch_assoc($result))
{
	if($row['type'] == 'cab')
	{
		echo "<table border='1'>

<tr>
<th>pid</th>
<th>productname</th>
<th>brand</th>
<th>type</th>
<th>description</th>
<th>ff</th>
<th>price</th>
</tr>";	


echo "<tr>";
	echo "<td>".$row['pid']."</td>";
	echo "<td>".$row['productname']."</td>";
	echo "<td>".$row['brand']."</td>";
	echo "<td>".$row['type']."</td>";
	echo "<td>".$row['description']."</td>";
	echo "<td>".$row['ff']."</td>";
	echo "<td>".$row['price']."</td>";


	echo "</table>";
	}


	else if($row['type'] == 'cpu')
	{
		echo "<table border='1'>

	<tr>
	<th>pid</th>
	<th>productname</th>
	<th>brand</th>
	<th>type</th>
	<th>description</th>
	<th>socket</th>
	<th>power</th>
	<th>price</th>
	</tr>";


	echo "<tr>";
	echo "<td>".$row['pid']."</td>";
	echo "<td>".$row['productname']."</td>";
	echo "<td>".$row['brand']."</td>";
	echo "<td>".$row['type']."</td>";
	echo "<td>".$row['description']."</td>";
	echo "<td>".$row['socket']."</td>";
    echo "<td>".$row['power']."</td>";
	echo "<td>".$row['price']."</td>";

	echo "</table>";


	}


	else if($row['type'] == 'ram')
	{
		echo "<table border='1'>

	<tr>
	<th>pid</th>
	<th>productname</th>
	<th>brand</th>
	<th>type</th>
	<th>description</th>
	<th>memtype</th>
	<th>power</th>
	<th>price</th>
	</tr>";


	echo "<tr>";
	echo "<td>".$row['pid']."</td>";
	echo "<td>".$row['productname']."</td>";
	echo "<td>".$row['brand']."</td>";
	echo "<td>".$row['type']."</td>";
	echo "<td>".$row['description']."</td>";
	echo "<td>".$row['memtype']."</td>";
    echo "<td>".$row['power']."</td>";
	echo "<td>".$row['price']."</td>";

echo "</table>";

	}

	else if($row['type'] == 'gpu')

	{
		echo "<table border='1'>

	<tr>
	<th>pid</th>
	<th>productname</th>
	<th>brand</th>
	<th>type</th>
	<th>description</th>
	<th>power</th>
	<th>price</th>
	</tr>";


	echo "<tr>";
	echo "<td>".$row['pid']."</td>";
	echo "<td>".$row['productname']."</td>";
	echo "<td>".$row['brand']."</td>";
	echo "<td>".$row['type']."</td>";
	echo "<td>".$row['description']."</td>";
    echo "<td>".$row['power']."</td>";
	echo "<td>".$row['price']."</td>";

	echo "</table>";
	}
	else if($row['type'] == 'hdd')
	{
		echo "<table border='1'>

	<tr>
	<th>pid</th>
	<th>productname</th>
	<th>brand</th>
	<th>type</th>
	<th>description</th>
	<th>power</th>
	<th>price</th>
	</tr>";


	echo "<tr>";
	echo "<td>".$row['pid']."</td>";
	echo "<td>".$row['productname']."</td>";
	echo "<td>".$row['brand']."</td>";
	echo "<td>".$row['type']."</td>";
	echo "<td>".$row['description']."</td>";
    echo "<td>".$row['power']."</td>";
	echo "<td>".$row['price']."</td>";

	echo "</table>";
	}

	else if($row['type'] == 'opd')
	{
		echo "<table border='1'>

	<tr>
	<th>pid</th>
	<th>productname</th>
	<th>brand</th>
	<th>type</th>
	<th>description</th>
	<th>power</th>
	<th>price</th>
	</tr>";


	echo "<tr>";
	echo "<td>".$row['pid']."</td>";
	echo "<td>".$row['productname']."</td>";
	echo "<td>".$row['brand']."</td>";
	echo "<td>".$row['type']."</td>";
	echo "<td>".$row['description']."</td>";
    echo "<td>".$row['power']."</td>";
	echo "<td>".$row['price']."</td>";

	echo "</table>";
	}

	else if($row['type'] == 'nic')
	{
		echo "<table border='1'>

	<tr>
	<th>pid</th>
	<th>productname</th>
	<th>brand</th>
	<th>type</th>
	<th>description</th>
	<th>power</th>
	<th>price</th>
	</tr>";


	echo "<tr>";
	echo "<td>".$row['pid']."</td>";
	echo "<td>".$row['productname']."</td>";
	echo "<td>".$row['brand']."</td>";
	echo "<td>".$row['type']."</td>";
	echo "<td>".$row['description']."</td>";
    echo "<td>".$row['power']."</td>";
	echo "<td>".$row['price']."</td>";

	echo "</table>";
	}






}
