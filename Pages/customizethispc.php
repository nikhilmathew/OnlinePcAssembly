
<?php
include'layout.php';

$_SESSION['thisform']=0;
$config[1] = $_GET['mbd'];
$config[2] = $_GET['cab'];


$_SESSION['system']['motherboard']=$config[1];
$result=mysqli_query($conn,"select * from motherboard_inventory where id=".$config[1]."");
$_SESSION['mbd']=mysqli_fetch_assoc($result);
$_SESSION['power']=$_SESSION['mbd']['power'];
echo '<script type="text/javascript">
		window.location.href="customizecpu.php?part='.$config[2].'";
		</script>
		<noscript>
		<meta http-equiv="refresh" content="0;url=customizecpu.php?part='.$config[2].'"/>
		</noscript>';
//header('Location:customizecpu.php?part='.$config[2].'');
?>