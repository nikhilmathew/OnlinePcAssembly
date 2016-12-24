<?php 
include 'layout.php';

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Change retailer password</title>
<link rel="stylesheet" type="text/css" href="../css/retailerhome.css">
<script>
function checkPasswordMatch() {
    var pass1 = document.getElementById("newPassword").value;
    var pass2 = document.getElementById("ConfirmPassword").value;
    var errr = document.getElementById("nomatchtext");
    var ok = true;
    if (pass1 != pass2) {
        //alert("Passwords Do not match");
        ok = false;
        document.getElementById("newPassword").style.borderColor = "#E34234";
        document.getElementById("ConfirmPassword").style.borderColor = "#E34234";
         }
        if(ok == false){
        	errr.innerHTML=("Passwords dont Match !!!");
            alert("Passwords dont Match!!!");
        } 
		
    
    
    return ok;
}
		</script>
        
</head>

<body>
<div id="retpassdiv">
<p> currently logged in user :<?php echo $_SESSION['user'];?> </p>
<form action="retailerpass.php" method="post">
	<label for="oldpass" ><br><br>enter your old password:</label>
    <input type="password" name="oldpass" required >
    <label for="newpass"><br><br> enter your new password:</label>
    <input type="password" id="newPassword" name="newpass" required><p id="nomatchtext"> </p>
    <label for="newpass"> <br><br>re-enter your  new password:</label>
    <input type="password" name="newpass1" id="ConfirmPassword" required ><label id="CheckPasswordMatch"></label>
	<br><br><br><input type="submit" name="changeretpass" onClick="checkPasswordMatch()" value=" change my password">
</form>
</div>

    
</body>
</html>