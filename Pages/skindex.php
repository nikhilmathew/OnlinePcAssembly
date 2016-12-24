<?php
session_start();
require("../login/sqlconnect.php");

if(isset($_GET['page'])){
	$pages=array("product","cart");
	if(in_array($_GET['page'],$pages)){
		$page=$_GET['page'];
	}else{
		$page="product";
	}
}else{
	$page="product";
}
?>

<html>
<head>
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Shopping Cart</title>
</head>
<body>
<div id="container">
      <div id="main">
        <?php require($page . ".php"); ?>
      </div>
      <div id="sidebar">
        <h1>Cart</h1>
        <table>
        	<tr>
            	<th>Name</th>
                <th>Quantity</th>
            </tr>
        <?php
				if(isset($_SESSION['cart'])){
					$sql = "SELECT * FROM products WHERE id IN(";
					foreach($_SESSION['cart'] as $id => $value){
						$sql .=$id. ",";
					}
					$sql=substr($sql,0,-1).") ORDER BY id ASC";
					$query = mysqli_query($conn, $sql);
					if(!empty($query)){
						while($row = mysqli_fetch_assoc($query)){
			?>
            <tr>
        		<td><?php echo $row['name']; ?></td><td><?php echo $_SESSION['cart'][$row['id']]['quantity']; ?></td>
			</tr>
        	<?php
					}
					}else{
			?>
            
					<tr><td colspan="3"><?php echo "<i>Your cart is empty."; ?></td></tr>
            <?php
				}
			?>
            
        
        <tr><td colspan="3"><a href="index.php?page=cart">Go To Cart</a></td></tr>
        <?php
				}else{
		?>
				<tr><td><?php echo "Your Cart is Empty"; ?></td></tr>
        <?php
				}
		?>
        </table>
  </div>
 
</div>
</body>
</html>