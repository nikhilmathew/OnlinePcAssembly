<?php
include'layout.php';
?>
<html>
<head>
<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="../css/default.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />
		<script src="../js/modernizr.custom.js"></script>
</head>
<body>
<div class="container">
<div class="main">
				<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list">List View</a>
					</div>
					<form action="addtocart.php" method="post">
					<ul>
						<?php

					$typesel= array("cab"=>"cab","cpu"=>"cpu","ram"=>"ram","gpu"=>"gpu","hdd"=>"hdd","opd"=>"opd","nic"=>"nic");

					$result=mysqli_query($conn,"select * from motherboard_inventory");
					while($row=mysqli_fetch_assoc($result))
	{
					echo '	<li>
							<a class="cbp-vm-image" href="#"><img src="../../'.$row['picture'].'"></a>
							<h3 class="cbp-vm-title">'.$row['productname'].'</h3>
							<div class="cbp-vm-price">'.$row['price'].'</div>
							<div class="cbp-vm-details">
								'.$row['description'].'
							</div>
							<a class="cbp-vm-icon cbp-vm-add" href="#">Add to cart</a>
						</li>';}
						?>
					
						
					</ul>
				</div>
			</div>
				</div>
			<script src="../js/classie.js"></script>
		<script src="../js/cbpViewModeSwitch.js"></script>
</body>
</html>