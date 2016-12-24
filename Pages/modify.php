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
	

<?php
include 'sqlconnect.php';
$dbselected_id= $_GET['selected_id'];
$redir=$_GET['from'];
$sql=mysqli_query($conn,"SELECT * FROM user_details where userid='$dbselected_id'");

		while($row=mysqli_fetch_assoc($sql))
		{
			$dbusername = $row['username'];
			$dbemail=$row['email'];
		}
		
?>		
	<div style="margin: 200px auto 10px auto;width:75%;">
	<div class="retlist" >
    
    	<ul>
        	<li><a href="viewexistingretailer.php">View Existing Retailer</a></li>
            <li><a href="modifyretailer.php">Modify Existing Retailer</a></li>
            <li><a href="deleteretailer.php">Delete Retailer</a></li>
            <!--viewbuildorders.php-->
        </ul>
     </div>	
		<form action=<?php echo "$redir" ;?>>
        		<table  border=0 align=center>
				<tr><td>User Id<td><input type=text disabled=disabled value=<?php echo $dbselected_id;?>  /><input type=hidden name=userid value=<?php echo $dbselected_id;?>  />
				<tr><td>User Name<td><input type= text name=username value=<?php echo $dbusername;?> />
				<tr><td>Email<td><textarea name=email><?php echo $dbemail;?> </textarea>
				 <tr><td><input type= submit value= submit /><td><input type= reset value= reset />
			</font></b>
			
		</div>
        </form>

</body>
</html>