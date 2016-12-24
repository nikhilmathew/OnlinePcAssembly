<?php
include "../login/sqlconnect.php";
//Check if user wants to shop:

if(isset($_POST['shop'])){
header("location:index.php");
}
//retrieve items . use session_id and/or datetime
$PHPSESSID=session_id();
$showcart = "SELECT * from cart_track INNER JOIN books ON bid=book_id WHERE session_id = '".$PHPSESSID."' AND date_added='".$td."'";
$result=mysql_query($showcart);
if(!$result){
$err=true;
//i recommend writing this error to a log or some text file, for security reasons.
$errmsg=mysql_error();
}else{
$err=false;
$num=mysql_num_rows($result);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pleasure Reading Inc::Showcart</title>
</head>
<body>
<table width="100%" border="0">
  <tr>
    <td colspan="5"><h1>  Shopping Cart </h1></td>
  </tr>
  <tr>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
  </tr>
  <?php if(!$err){ ?>
  <tr>
    <td bgcolor="#ECE9D8"><strong>Product</strong></td>
    <td bgcolor="#ECE9D8"><strong>Qty</strong></td>
    <td bgcolor="#ECE9D8"><strong>Price</strong></td>
    <td bgcolor="#ECE9D8"><strong>Total</strong></td>
    <td bgcolor="#ECE9D8"><strong>Action</strong></td>
  </tr>
   <?php
   $gtotal=0;
    if($num > 0){
  while($row=mysql_fetch_assoc($result)){
  ?>
  <tr>
    <td><?php echo trim(stripslashes($row['title']))?></td>
    <td><?php echo trim(stripslashes($row['qty']))?></td>
    <td><?php echo trim(stripslashes($row['price']))?></td>
    <td><?php
        $total= $row['qty'] * $row['price'];
     $ctotal=number_format($total,2);
          $gtotal = $gtotal + $ctotal;
        $_SESSION['gtotal'] = $gtotal;
        echo "$".$total;?></td>
    <td><a href="delete.php?cid=<?php echo $row['cart_id'] ?>">Remove</a></td>
  </tr>
   <?php
    }
    }else{
       ?>
    <tr>
    <td colspan="5"><p>There are no items in your shopping cart.</p></td>
   </tr>
   <?php
   }
   ?>
   <tr>
   <td></td>
   <td></td>
   <td><strong>Grand Total:</strong></td>
   <td bgcolor="#ECE9D8"><strong><?php echo "$".$gtotal;?></strong></td>
      </tr>
   <form action="showcart.php" method="post">
  <tr>
    <td><label></label></td>
    <td></td>
    <td>&nbsp;</td>
    <td><input type="submit" name="shop" value="Back to Shopping" /></td>
    <td> </td>
  </tr>
  </form>
  <?php
  }else{
  ?>
  <tr>
  <td colspan="5">
  <p><?php echo $errmsg;?></p>
  </td>
  </tr>
  <?php  } ?>
</table>
</body>
</html>
