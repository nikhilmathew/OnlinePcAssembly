<?php
include 'layout.php';
?>
<html>
<head>
<title> Individual Component Purchase</title>
<style>
.catdiv{
	position: relative ;
	margin-right: auto;
	margin-left: auto;
	margin-top: 200px;
	text-align: center;
	width:80%;
	max-height: 80%;
	border: 3px solid green;
}
.adiv a{
			color:green;
		}
		.adiv a:hover{
			color:purple;
		}
.pic{
	width:100%;
	height:370px;
}
</style>
<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Caption Hover Effects - Demo 1</title>
		<link rel="shortcut icon" href="/../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="../css/defaulta.css" />
		<link rel="stylesheet" type="text/css" href="../css/componenta.css" />
		<link rel="stylesheet" type="text/css" href="../css/default.css" />
			
		<script src="../js/modernizr.custom.js"></script>
</head>

<body>
<div class="catdiv">
<h2> Select a category </h2>
<div class="adiv"><p>	<a href="individualpartspurchase.php?cat=mbd"> Motherboards </a>
			<a href="individualpartspurchase.php?cat=cab"> Cabinets </a>
			<a href="individualpartspurchase.php?cat=cpu"> Processors </a>
			<a href="individualpartspurchase.php?cat=ram"> Memory Chips </a></p>
			<p><a href="individualpartspurchase.php?cat=gpu"> Graphic Cards </a>
			<a href="individualpartspurchase.php?cat=hdd"> Hard disks </a>
			<a href="individualpartspurchase.php?cat=opd"> Optical Drives </a>
			<a href="individualpartspurchase.php?cat=psu"> Power Supply </a>
			</p>
			<p id="noti"></p></div>
</div>
<div class="container demo-1">
			<!-- Top Navigation -->
			<ul class="grid cs-style-1">
				<?php
				if(isset($_GET['cat'])){
					$cat = $_GET['cat'];
					if($cat=='mbd'){
						$query = ("select * from motherboard_inventory ");
						$res = mysqli_query($conn,$query);
						while($result = mysqli_fetch_assoc($res)){
							echo '<li>
									<figure>
										<img class="pic" src="'.$result['picture'].'" alt="uploads/img01.jpg">
										<figcaption>
											<h3>'.$result['productname'].'</h3>
											<h4>'.$result['brand'].'</h4>
											<span>Processor Socket:'.$result['socket'].'</span>
											<span>Memory: '.$result['memtype'].'</span>
											<span>Price: $'.$result['price'].'</span>
											
											<a href="productdetail.php?id='.$result['id'].'">More Details</a>
											<a href=#  onclick="addToCart('.$result['id'].')">Add to Cart</a>
										</figcaption>
									</figure>
									</li>';
						}
					}
					if($cat=='cab' ||$cat=='cpu' ||$cat=='ram' ||$cat=='gpu' ||$cat=='hdd' ||$cat=='opd' ||$cat=='psu'){
						$query = ("select * from parts_inventory where type='$cat'");
						$res = mysqli_query($conn,$query);
						while($result = mysqli_fetch_assoc($res)){
							echo '<li>
									<figure>
										<img class="pic" src="'.$result['picture'].'" alt="uploads/img01.jpg">
										<figcaption>
											<h3>'.$result['productname'].'</h3>
											<h4>'.$result['brand'].'</h4>
											<span>'.$result['description'].'</span>
											<span>Memory Price: $'.$result['price'].'</span>
											
											<a href="productdetail.php?id='.$result['id'].'">More Details</a>
											<a href=#  onclick="addToCart('.$result['id'].')">Add to Cart</a>
										</figcaption>
									</figure>
									</li>';
						}
					}
				}
				

				
				?>
	<script src="../js/toucheffects.js"></script>			
	<script src="../js/addtocart.js"></script>
</body>
</html>
