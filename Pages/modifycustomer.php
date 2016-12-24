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
<div class="retlist" style="margin-top:150px">
    
    	<ul>
        	<li><a href="viewexistingcustomer.php">View Existing Customer</a></li>
            <li><a href="modifycustomer.php">Modify Existing Customer</a></li>
            <li><a href="deletecustomer.php">Delete Customer</a></li>
            <!--viewbuildorders.php-->
        </ul>
     </div>  
<B>Retailers List<B>
<table border=1>
				<tr><td width=10% bgcolor=orange><b><font size=4>User Id</font></b><td width=10% bgcolor=orange><b>
				<font size=4>User Name</font></b><td width=10% bgcolor=orange><b><font size=4>Email</font></b>
				

<?php
include 'sqlconnect.php';

if(isset($_GET['userid'])&&isset($_GET['username'])&&isset($_GET['email'])){
	$userid=$_GET['userid'];
	$username=$_GET['username'];
	$email=$_GET['email'];

	$sq=mysqli_query($conn,"UPDATE user_details SET username='$username', email='$email' where userid='$userid'");
}

	$sql=mysqli_query($conn,"SELECT * FROM user_details where privelage='U'");
	
		while($row=mysqli_fetch_assoc($sql))
		{
			$dbuserid=$row['userid'];
			$dbusername = $row['username'];
			$dbemail = $row['email'];
			
		
				echo "<tr ><td>".$dbuserid."<td>".$dbusername."<td>".$dbemail."<td width=10%><a href=modify.php?selected_id=".$dbuserid."&from=modifycustomer.php>MODIFY </a>";
			
		}
?>
</table>

</body>
</html>