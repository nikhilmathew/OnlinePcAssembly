<?php
include 'layout.php';
?>
<html>
<head>
<title> Modifications Purchase</title>
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
</style>
<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Caption Hover Effects - Demo 1</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="/../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="../css/defaulta.css" />
		<link rel="stylesheet" type="text/css" href="../css/componenta.css" />
		<link rel="stylesheet" type="text/css" href="../css/default.css" />
			
		<script src="../js/modernizr.custom.js"></script>
		<style type="text/css">
		.adiv a{
			color:blue;
		}
		.adiv a:hover{
			color:green;
		}
		</style>
</head>

<body>
<div class="catdiv">
<h2> Add Modifications of your choice or <a href="purchasedsystemviewpage.php">proceed to cart</a> </h2>
<div class="adiv"><p>	<a href="modificationspurchase.php?cat=lig"> Lighting </a>
			<a href="modificationspurchase.php?cat=coo"> Cooling </a>
			<a href="modificationspurchase.php?cat=bod"> Bodypaint </a>
			<a href="modificationspurchase.php?cat=bra"> Braided Cables </a></p>
			<p>
			</p>
			<p id="noti"></p></div>
</div>
<div class="container demo-1">
			<!-- Top Navigation -->
			<ul class="grid cs-style-1">
				<?php
				if(isset($_GET['cat'])){
					$cat = $_GET['cat'];
						$query = ("select * from modificationlist where type='$cat'");
						$res = mysqli_query($conn,$query);
						while($result = mysqli_fetch_assoc($res)){
							echo '<li>
									<figure>
										<img src="'.$result['picture'].'" alt="uploads/img01.jpg">
										<figcaption>
											<h3>'.$result['productname'].'</h3>
											<h4>'.$result['brand'].'</h4>
											<span>'.$result['description'].'</span>
											<span>Memory Price: $'.$result['price'].'</span>
											
											<a href="productdetail.php?id='.$result['id'].'">More Details</a>
											<button  onclick="addToCart('.$result['id'].')">Add to Cart</button>
										</figcaption>
									</figure>
									</li>';
						}
					}
					
				

				
				?>
	<script src="../js/toucheffects.js"></script>			
	<script src="../js/addtocart.js"></script>
</body>
</html>
