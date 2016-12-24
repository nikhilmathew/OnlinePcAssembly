<?php
include'layout.php';

$_SESSION['thisform']=0;
?>
<html>
<head>
<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="../css/customization.css"/>
		<link rel="stylesheet" type="text/css" href="../css/default.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />-->
		<script src="../js/modernizr.custom.js"></script>

</head>
<body>
<div class="container">
<div class="main">
				<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options"><h3 style="float:left;">motherboard</h3><form action="customizecabinet.php" method="post">
						<input class="nextbuttop" type="submit" name="submit" value="proceed to next category">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list">List View</a>
					</div>
					
					<ul>
						<?php

					
					$result=mysqli_query($conn,"select * from motherboard_inventory");
					while($row=mysqli_fetch_assoc($result))
	{
					echo '	<label for="'.$row['id'].'">
							<li style="border:1px solid orange; margin-top:2px;margin-bottom:2px;">
							<a class="cbp-vm-image" href="#"><img src="'.$row['picture'].'"></a>
							<h3 class="cbp-vm-title">'.$row['productname'].'</h3>
							<div class="cbp-vm-price">'.$row['price'].'</div>
							<div class="cbp-vm-details">'.$row['description'].'</div>
							<input type="radio" name="part" required="required" value="'.$row['id'].'" id="'.$row['id'].'">
							<h4 style="font-size:1.5em;">Select</h4>
							</li></label>';}
						?>
					
						
					</ul>
					<input class="nextbut" type="submit" name="submit" value="proceed to next category">
					</form>
				</div>
			</div>
				</div>
			<script src="../js/classie.js"></script>
		<script src="../js/cbpViewModeSwitch.js"></script>
</body>
</html>