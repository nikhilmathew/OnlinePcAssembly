<?php 
session_start();
if( (isset ($_SESSION['user'])) && ($_SESSION['priv']=='R'))
{
	echo "retailer".$_SESSION['user'];
}else{
	echo "haaaaaak".$_SESSION['user'];
}//just some code to check who the hell submitted this page

include '../login/sqlconnect.php';
if(isset($_POST['submit'])){
$type = trim($_POST['type_of_component']);
$typeofaccessory = trim($_POST['typeofaccessory']);
$typeofmod = trim($_POST['typeofmod']);
$proname = trim($_POST['productname']);
$brand = trim($_POST['brand']);
$ff = trim($_POST['formfactor']);
$desc = trim($_POST['description']);
$socket = trim($_POST['socket']);
$mem = trim($_POST['memory']);
$memslots = trim($_POST['memslots']);
$pcie = trim($_POST['pcieslots']);
$sata = trim($_POST['nosata']);
$power = trim($_POST['power']);
$price = trim($_POST['price']);
$user=$_SESSION['user'];

$retailer = ("select userid from user_details where email='$user'");
$f_reid = mysqli_query($conn,$retailer);
$reid = mysqli_fetch_assoc($f_reid);
$retid = $reid['userid'];

//retreive product id
if($type == 'mbd'){ $table ='motherboard_inventory';}
else if($type == 'cab'||$type =='cpu' ||$type == 'ram' || $type == 'gpu' || $type == 'hdd' || $type == 'opd' || $type=='psu'){$table='parts_inventory';}
else if($type=='acc'){$table='acc_inventory';}else if($type=='mod'){$table='modificationlist';}

$q = ("insert into inv_id_gen values('','$table')");
$q1 = mysqli_query($conn,$q);
$q = ("select max(id) as id from inv_id_gen");
$q1 = mysqli_query($conn,$q);
$iid = mysqli_fetch_assoc($q1);
$id = $iid['id'];
echo $id;

//img_upl
$target_dir = "uploads/";
$target_file = $target_dir . $id.".jpg";//basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 700000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
          if($type == 'mbd')
          {
              $query = ("INSERT INTO motherboard_inventory(id,reid,productname,brand,ff,description,socket,memtype,memslots,pcieslots,nsata,power,price,picture) values ('$id','$retid','$proname','$brand','$ff','$desc','$socket','$mem','$memslots','$pcie','$sata','$power','$price','$target_file')");
          }
          else if($type == 'cab'||$type =='cpu' ||$type == 'ram' || $type == 'gpu' || $type == 'hdd' || $type == 'opd' || $type== 'psu')
          {
              $query = ("INSERT INTO parts_inventory(id,productname, brand, type, description, ff, socket, memtype, power, price, reid, picture) VALUES ('$id','$proname','$brand','$type','$desc','$ff','$socket','$mem','$power','$price','$retid','$target_file')");
          }
          else if($type == 'acc')
          {
            $query = ("INSERT INTO acc_inventory(id,productname, brand, type, description,price, reid, picture) VALUES ('$id','$proname','$brand','$typeofaccessory','$desc','$price','$retid','$target_file')");  
          }
          else if($type == 'mod')
          {
            $query = ("INSERT INTO modificationlist(id,productname, brand, type, description,price, reid, picture) VALUES ('$id','$proname','$brand','$typeofmod','$desc','$price','$retid','$target_file')");  
          }
          if (mysqli_query($conn, $query)) {
            echo "New product  input successful";
            $flllag=1;
          } else {
            echo "Error:  <br>". $query . "<br>" . mysqli_error($conn);
          }

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if($flllag==1){
  echo '<a href="retailerhome.php">Return to Main Page</a><br><br><a href="addinventorytesting.php">Add another part</a>';
  $flllag=0;
  
}



}

?>
