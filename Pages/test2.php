<?php
include'layout.php';
?>
<html>
<head>
<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="../css/default.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />-->
		<script src="../js/modernizr.custom.js"></script>
<style>
[type="radio"]{
  border: 0; 
  clip: rect(0 0 0 0); 
  height: 1px; margin: -1px; 
  overflow: hidden; 
  padding: 0; 
  position: absolute; 
  width: 1px;
}

[type="radio"] + h4::before {
  content: '';
  display: inline-block;
  width: 1em;
  height: 1em;
  vertical-align: -0.25em;
  border-radius: 1em;
  border: 0.125em solid #fff;
  box-shadow: 0 0 0 0.15em #000;
  margin-right: 0.75em;
  transition: 0.5s ease all;
}

[type="radio"]:checked + h4::before {
  background: green;
  box-shadow: 0 0 0 0.25em #000;
}

[type="radio"]:focus + h4::after {
  content: 'ed\0020\2190';
  font-size: 1.0em;
  line-height: 1;
  
}



</style>
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

					
					$result=mysqli_query($conn,"select * from motherboard_inventory");
					while($row=mysqli_fetch_assoc($result))
	{
					echo '	<label for="'.$row['mid'].'">
							<li style="border:1px solid orange; margin-top:2px;margin-bottom:2px;">
							<a class="cbp-vm-image" href="#"><img src="'.$row['picture'].'"></a>
							<h3 class="cbp-vm-title">'.$row['productname'].'</h3>
							<div class="cbp-vm-price">'.$row['price'].'</div>
							<div class="cbp-vm-details">'.$row['description'].'</div>
							<input type="radio" name="part" value="'.$row['mid'].'" id="'.$row['mid'].'">
							<h4 style="font-size:1.5em;">Select</h4>
							</li></label>';}
						?>
					
						
					</ul>
					<input type="submit" name="submit" value="proceed to next category">
					</form>
				</div>
			</div>
				</div>
			<script src="../js/classie.js"></script>
		<script src="../js/cbpViewModeSwitch.js"></script>
</body>
</html>