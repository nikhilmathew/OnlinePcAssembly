<?php
include("layout.php");
?>
<html>
<head> 
<meta charset="utf-8">
<title>Accepted Orders</title>
</head>

<body>
<br>
<br><br><br>
<div class="retlist" style="margin-top:200px;width:80%;margin-left:auto;margin-right:auto;">
    
    	<ul>
        	<li><a href="retailerhome.php">Retailer Home</a></li>
            
        </ul>
     </div>		

<?php
include 'sqlconnect.php';
$oid= $_GET['id'];
$sql=mysqli_query($conn,"SELECT * FROM order_list where oid='$oid'");

		while($row=mysqli_fetch_assoc($sql))
		{
			$dboid = $row['oid'];
			$dbuid=$row['uid'];
			$dbstatus = $row['status'];
			$dbnoti = $row['notification'];
		
?>		
		<form action="orderstatuschanged.php" method="post">
        		<table  border=0 align=center>
				<tr><td>User Id<td><?php echo $dbuid;?>  
				<tr><td>Order id<td><input type="hidden" name="oid" value="<?php echo $dboid;?>"><?php echo $dboid;?> 
				<tr><td>Status<td><select  name="status" >
									<option value="<?php echo $dbstatus;?>" selected="selected"></option>
									<option value="Processing">Processing</option>
									<option value="Shipped">Dispatched</option>
									<option value="complete"> Order Completed</option>
									<option value="cancelled">Cancel Order</option>
									</select>
				<tr><td>Notifications<td><textarea name="noti"  rows="6" cols="50" required="required" autofocus="autofocus"><?php echo $dbnoti;?></textarea>					
				 <tr><td><input type=submit value= submit /><td><input type= reset value= reset />
			</font></b>
			
		<?php
        }
		?>
        </form>

</body>
</html>