<?php
include "../login/sqlconnect.php";
$PHPSESSID=session_id();
if(isset($_POST['submit'])){
//clean all POST vars first
$order_name = mysql_escape_string($_POST['o_name']);
$order_address = mysql_escape_string($_POST['address']);
$order_total = mysql_escape_string($_POST['total']);
$order_date = mysql_escape_string($_POST['o_date']);
$order_status = mysql_escape_string($_POST['status']);
//Now, insert data
$addorder="INSERT INTO orders SET order_name='".$order_name."',order_address='".$order_address."',";
$addorder .="order_total='".$order_total."', order_date='".$order_date."',order_status='".$order_status."',session='".$PHPSESSID.
$result =mysql_query($addorder);
if(!$result){
$msg=mysql_error();
}else{
$msg="Your order has been processed";
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<table width="97%" border="0">
  <tr>
    <td colspan="2"><h1> Order </h1></td>
  </tr>
  <?php if(!isset($msg)) {?>
   <form action="orders.php" method="post">
  <tr>
    <td width="16%">Name</td>
    <td width="84%"><label>
      <input name="o_name" type="text" size="40" />
    </label></td>
  </tr>
  <tr>
    <td valign="top">Order id</td>
    <td><input name="o_name3" type="text" size="40" /></td>
  </tr>
  <tr>
    <td valign="top">user id</td>
    <td><input name="o_name4" type="text" size="40" /></td>
  </tr>
  <tr>
    <td>Total</td>
    <td><textarea name="address2"></textarea></td>
  </tr>
  <tr>
    <td>Order date</td>
    <td><input name="o_name2" type="text" size="40" /></td>
  </tr>
  <tr>
    <td>Status</td>
    <td><label>
      <select name="status">
        <option>processed</option>
        <option>pending</option>
        </select>
      </label></td>
  </tr>
  <tr>
    <td><label>
      <input type="submit" name="submit" value="Send Order" />
    </label></td>
  </tr>
   </form>
   <?php
   }else{
      ?>
      <tr>
      <td>
      <?php echo $msg; ?>
      </td>
      </tr>
<?php } ?>
</table>
</body>
</html>
