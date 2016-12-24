<?PHP
session_start();

if (iset($_post["dset"])){
	echo "successfuulycomplated";
	$dset = json_decode($_POST["dset"]);

}
$_SESSION['ff']=$dset->ff;
$_SESSION['socket']=$dset->socket;
$_SESSION['ram']=$dset->ram;
$_SESSION['ramslots']=$dset->ramslots;

$_SESSION['nosata']=$dset->nosata;
$_SESSION['nopcie']=$dset->nopcie;



?>