<?php
include'layout.php';
$_SESSION['system']['gpu']=$_POST['part'];
$retpower = mysqli_query($conn,'select power from parts_inventory where id='.$_POST['part'].'');
$power = mysqli_fetch_assoc($retpower);
$_SESSION['power'] += $power['power'];


?>
<html>
<head>
<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="../css/default.css" />
		<link rel="stylesheet" type="text/css" href="../css/customization.css"/>
		<link rel="stylesheet" type="text/css" href="../css/component.css" />
		
		<script type="javascript">
		function checknum(){
				var limit = <?php echo $_SESSION['mbd']['nsata'];?>;
				var max = <?php $result=mysqli_query($conn,"select * from parts_inventory where type='hdd' or type='opd'");
							$maxval= mysqli_num_rows($result); echo $maxval;?>;
				var count=0;
				for(i=0; i<max;i++)
				{
					if(document.hddopd.part[i].checked)
					{
						count= count+1;
					}
				}
				if( count == limit)
				{
					alert("maximum selection limit reached.please uncheck some item to select this option")
					document.hddopd; return false;
				}
			}
		</script>
		<script src="../js/modernizr.custom.js"></script>

</head>
<body>
<div class="container">
<div class="main">
				<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<h3 style="float:left;">Hard Disk and Optical Drives <?php echo$_SESSION['mbd']['nsata'];?></h3><div class="cbp-vm-options">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list">List View</a>
					</div>
					<form name="hddopd" action="customizepsu.php" method="post">
					<ul>
						<?php

					
					$result=mysqli_query($conn,"select * from parts_inventory where type='hdd'");
					while($row=mysqli_fetch_assoc($result))
					{
							echo '	<label for="'.$row['id'].'">
							<li style="border:1px solid orange; margin-top:2px;margin-bottom:2px;">
							<a class="cbp-vm-image" href="#"><img src="'.$row['picture'].'"></a>
							<h3 class="cbp-vm-title">'.$row['productname'].'</h3>
							<div class="cbp-vm-price">'.$row['price'].'</div>
							<div class="cbp-vm-details">'.$row['description'].'</div>
							<input type="checkbox" name="part[]" value="'.$row['id'].'" id="'.$row['id'].'" onclick="return checknum();">
							<h4 style="font-size:1.5em;">Select</h4>
							</li></label>';}
					$result=mysqli_query($conn,"select * from parts_inventory where type='opd'");
					while($row=mysqli_fetch_assoc($result))
					{
							echo '	<label for="'.$row['id'].'">
							<li style="border:1px solid orange; margin-top:2px;margin-bottom:2px;">
							<a class="cbp-vm-image" href="#"><img src="'.$row['picture'].'"></a>
							<h3 class="cbp-vm-title">'.$row['productname'].'</h3>
							<div class="cbp-vm-price">'.$row['price'].'</div>
							<div class="cbp-vm-details">'.$row['description'].'</div>
							<input type="checkbox" name="part[]" value="'.$row['id'].'" id="'.$row['id'].'" onclick="return checknum()">
							<h4 style="font-size:1.5em;">Select</h4>
							</li></label>';}		
						?>
					
						
					</ul>
					<input  class="nextbut" type="submit" name="submit" value="proceed to next category">
					</form>
				</div>
			</div>
				</div>
			<script src="../js/classie.js"></script>
		<script src="../js/cbpViewModeSwitch.js"></script>
</body>
</html>