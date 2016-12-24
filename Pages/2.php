<?php
include '../login/sqlconnect.php';

$result=mysqli_query($conn,"select * from motherboard_inventory");
echo "<table border='1'>

<tr>
<th>mid</th>
<th>reid</th>
<th>productname</th>
<th>brand</th>
<th>ff</th>
<th>description</th>
<th>socket</th>
<th>memtype</th>
<th>memslots</th>
<th>pcieslots</th>
<th>nsata</th>
<th>power</th>
<th>price</th>
<th>picture</th>
</tr>";

while($row=mysqli_fetch_assoc($result))
{
	echo "<tr>";
	echo "<td>".$row['mid']."</td>";
	echo "<td>".$row['reid']."</td>";
	echo "<td>".$row['productname']."</td>";
	echo "<td>".$row['brand']."</td>";
	echo "<td>".$row['ff']."</td>";
	echo "<td>".$row['description']."</td>";
	echo "<td>".$row['socket']."</td>";
	echo "<td>".$row['memtype']."</td>";
	echo "<td>".$row['memslots']."</td>";
	echo "<td>".$row['pcieslots']."</td>";
	echo "<td>".$row['nsata']."</td>";
	echo "<td>".$row['power']."</td>";
	echo "<td>".$row['price']."</td>";
	echo "<td>".$row['picture']."</td>";
}
echo "</table>";
?>
