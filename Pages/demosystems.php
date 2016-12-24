<?php
include'layout.php';
$cat = $_GET['type'].'%';
$_SESSION['thisform']=0;
?>
<html>
<head>
<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="../css/customization.css"/>
		<link rel="stylesheet" type="text/css" href="../css/default.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />-->
		<script src="../js/modernizr.custom.js"></script>
<style>
.sublist{

}
</style>
</head>
<body>
<div class="container">
<div class="ain">
				<div id="acbp-vm" class="acbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options"><h3 style="float:left;">Choose a System Category</h3>
						
					</div>
					
					<ul>
						<?php

					
					$result=mysqli_query($conn,"select * from order_list where status='demo' and orderstring like '$cat'");
					while($row=mysqli_fetch_assoc($result))
					{
						$system = explode('^',$row['orderstring']);
						$y = count($system);
						$x=2;//to incorporate system name increase $ to 2 and in string s^systemname^.....so on
						while($x<$y){
							$a = mysqli_query($conn,'select * from inv_id_gen where id='.$system[$x].'');
							$aa = mysqli_fetch_assoc($a);
							$b = mysqli_query($conn,'select productname from '.$aa['table'].' where id='.$aa['id'].'');
							$bb = mysqli_fetch_assoc($b);
							$sis[$x] = $bb['productname'];
							$x++;
							$x++;
						}//increment all array values by 1
					echo '	<label for="'.$row['oid'].'">
							<li style="border:1px solid green; margin-top:2px;margin-bottom:2px;">
							<a class="cbp-vm-image" href="#"><img src="uploads/'.$system[4].'.jpg"></a>
							<h3 class="cbp-vm-title">'.$system[1].'</h3> 
							<div class="cbp-vm-price">$'.$row['price'].'</div>
							<div class="cbp-vm-details">
							';
							$x=2;
							while($x<$y){
								echo'<p>'.$sis[$x++].'</p>';
								$x++;
							}
							$_SESSION['thisform']=0;
							echo '</div>

							<h4 style="font-size:1.5em;"><a href="buypresetpc.php?sys='.$row['oid'].'">Buy This Pc</a>
							<br><a href="customizethispc.php?mbd='.$system[2].'&cab='.$system[4].'"> Customize me first(motherboard and cabinet are not customizable</a></h4>
							</li></label>';}
						?>
					
						
					</ul>
					
				</div>
			</div>
				</div>
			<script src="../js/classie.js"></script>
		<script src="../js/cbpViewModeSwitch.js"></script>
</body>
</html>