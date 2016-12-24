<?php
include'../../../login/sqlconnect.php';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Blueprint: View Mode Switch</title>
		<meta name="description" content="Blueprint: View Mode Switch" />
		<meta name="keywords" content="view mode, switch, css, style, grid, list, template" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<header class="clearfix">
				<span>Customize <span class="bp-icon bp-icon-about" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span></span>
				<h1>Motherboard</h1>
				<nav>
					<a href="http://tympanus.net/Blueprints/AnimatedHeader/" class="bp-icon bp-icon-prev" data-info="previous Blueprint"><span>Previous Blueprint</span></a>
					<a href="http://tympanus.net/Blueprints/ResponsiveIconGrid/" class="bp-icon bp-icon-next" data-info="next Blueprint"><span>Next Blueprint</span></a>
					<a href="http://tympanus.net/codrops/?p=15656" class="bp-icon bp-icon-drop" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>
					<a href="http://tympanus.net/codrops/category/blueprints/" class="bp-icon bp-icon-archive" data-info="Blueprints archive"><span>Go to the archive</span></a>
				</nav>
			</header>	
			<div class="main">
				<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list">List View</a>
					</div>
					<ul><?php

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
			</div><!-- /main -->
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/cbpViewModeSwitch.js"></script>
	</body>
</html>
