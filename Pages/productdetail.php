<?php
include 'layout.php';
if(isset($_GET['id'])){

		$id = $_GET['id'];
		
		$q1 = mysqli_query($conn,"select * from inv_id_gen where id='$id'");
		if(mysqli_num_rows($q1)){
			$r1 = mysqli_fetch_assoc($q1);
			$id = $r1['id'];
			$table = $r1['table'];
			$q2 = mysqli_query($conn,"select * from $table where id='$id'");
			if(mysqli_num_rows($q1)){
				$result = mysqli_fetch_array($q2);

				$c = count($result);
			}
		}



}
?>
<html>
<head>
<title><?php echo $result['productname'];?></title>

<style>
.cl{
	border:3px solid white ;

}
.body1{
	margin-top:200px;
	padding:20px 20px 20px 20px;
	margin-left: auto;
	margin-right: auto;
	width:70%;
	
}
.body2{
	

	
	width:100%;
	
}
.picture{
	position: relative;
	width:380px;
	height:400px;
	margin:5px;
	float:left;	

}
.picture img{
	width:100%;
}
.productname{
	
	position:relative;
	margin-top:-400px;
	margin-left: 450px;
	width:40%;
	float:left;

}
.price{
	position:relative;
	margin-top:-300px;
	margin-left: 450px;
	width:30%;
	float:left;
}
.description{
	margin-top:475px;
}
body{
	background-color:#F0EFEF;
	color:red;
}
</style>

</head>

<body>
<div class="body1 cl">
	<div class="body2 cl">
		<div class="picture ">
		<?php echo '<img src="'.$result['picture'].'">';?> 
		</div>
		<div class="productname cl">
		<?php echo '<h3>'.$result['productname'].'</h3>';?> 
		</div>
		<div class="price cl">
		<?php echo '<h3>Price: Rs.'.$result['price'].'</h3>';?> 
		</div>
		<div class="description cl">
		<?php echo '<h3>'.$result['description'].'</h3>';?> 
		</div>
		<?php 
		$x=1;
		for($x=1;$x<13;$x++){

				//echo '<div class="'.$result[$x].' cl"><h3>'.$result[$x].'</h3></div>';
		}




		?>

</div>
</div>
</body>
</style>