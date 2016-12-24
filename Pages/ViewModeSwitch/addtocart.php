<?php
include "../login/sqlconnect.php";
//check if
//A) a bookid has been submitted
//B) the submitted value is numeric
if(isset($_GET['bid'])){
//clean it up
if(!is_numeric($_GET['bid'])){
//Non numeric value entered. Someone tampered with the catid
$error=true;
$errormsg=" Security, Serious error. Contact webmaster: bid enter: ".$_GET['bid']."";
}else{
//book_id is numeric number
//clean it up
$cbID=mysql_escape_string($_GET['bid']);
$query ="SELECT * from books INNER JOIN genres ON genID=gen_id WHERE book_id='".$cbID."' ";
$results=mysql_query($query);
if($results){
$num = mysql_num_rows($results);
$row=mysql_fetch_assoc($results);
$authno=$row['authID'];
//run a query to get the auth name
if($authno > 0){
$query_auth ="SELECT * from author WHERE auth_id='".$authno."' ";
$results_auth=mysql_query($query_auth);
$row_auth=mysql_fetch_assoc($results_auth);
$auth=$row_auth['auth_name'];
}
}//results
else{
//there's a query error
$error=true;
$errormsg .=mysql_error();
}//result test
}//numeric
}//if isset
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pleasure Reading Inc::Book Detail: <?php echo $row['title'];?></title>
</head>
<body>
<table width="100%" border="0">
  <tr>
    <td colspan="3"><h1> Product Detail </h1></td>
  </tr>
  <tr>
    <td colspan="3"><b><a href="listbooks.php?catid=<?php echo trim(stripslashes($row['gen_id']));?>&catname=<?php echo stripslashes(strtoupper($row['gen_name']));?>"><?php echo stripslashes(strtoupper($row['gen_name']));?></a> > <?php echo $row['title'];?> </b></td>
  </tr>
  <tr>
    <td width="1%"> </td>
    <td width="30%"> </td>
    <td width="68%"> </td>
  </tr>
  <tr>
    <td rowspan="5" valign="top">&nbsp;</td>
    <td> </td>
    <td> </td>
  </tr>
  <tr>
    <td><strong>Product name:</strong></td>
    <td><?php echo "£".$row['price'];?></td>
  </tr>
  <tr>
    <td><strong>price:</strong></td>
    <td><?php echo $row['ISBN'];?></td>
  </tr>
  <tr>
    <td><strong>Quantity</strong></td>
    <td><select name="qty">
      ;

      <?php
  for($i=1; $i<12; $i++) {
 echo '<option value='.$i.'>'.$i.'</option>';
     }
?>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Add to Cart" /></td>
  </tr>
  <form action="addtocart.php" method="post">
  <tr>
    <td> </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <input name="bid" type="hidden" value="<?php echo $row['book_id']?>" /><td width="1%"></td>
  </tr>
  <tr>
    <td> </td>
    <td> </td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
</body>
</html>