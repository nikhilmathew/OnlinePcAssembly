<?php
include("layoutadmin.php");
?>
<html>
<head> 
<meta charset="utf-8">
<title>viewexistingretailer</title>
</head>

<body>
<br>
<br><br><br>
<div class="retlist" >
    
    	<ul>
        	<li><a href="viewexistingretailer.php">View Existing Retailer</a></li>
            <li><a href="modifyretailer.php">Modify Existing Retailer</a></li>
            <li><a href="deleteretailer.php">Delete Retailer</a></li>
            <!--viewbuildorders.php-->
        </ul>
     </div>  
<B>Retailers List<B>
<table border=1>
				<tr><td width=10% bgcolor=orange><b><font size=4>User Id</font></b><td width=10% bgcolor=orange><b>
				<font size=4>User Name</font></b><td width=10% bgcolor=orange><b><font size=4>Email</font></b>
				

<?php
include 'sqlconnect.php';
$userid=$_GET['selected_id'];
	$sq1=mysqli_query($conn,"delete from user_details where userid='$userid'");
	$sq2=mysqli_query($conn,"delete from parts_inventory where reid='$userid'");
	$sq3=mysqli_query($conn,"delete from motherboard_inventory where reid='$userid'");
	
	$sq=mysqli_query($conn,"SELECT * FROM user_details where privelage='R'");
	
	while($row=mysqli_fetch_assoc($sq))
		{
			$dbuserid=$row['userid'];
			$dbusername = $row['username'];
			$dbemail = $row['email'];
			
		
								
				echo "<tr ><td>".$dbuserid."<td>".$dbusername."<td>".$dbemail."<td width=10%><a href=delete_retailer.php?selected_id=".$dbuserid.">DELETE </a>";
		}
	
		
?>
</table>

</body>
</html>