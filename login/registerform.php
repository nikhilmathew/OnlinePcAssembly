<!doctype html>
<html>
<head>
<style type="text/css"> 
input:required:invalid, input:focus:invalid { 
background-image: url(/images/invalid.png); background-position: right top; background-repeat: no-repeat; 
-moz-box-shadow: none;
} 
input:required:valid { 
background-image: url(/images/valid.png); background-position: right top; background-repeat: no-repeat; 
-moz-box-shadow: none;
} 
</style>
<meta charset="utf-8">
<title>Registration form</title>
</head>

<body>
<h3> User Registration Form </h3>
 <script>
 function passcheck() {
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var ok = true;
    if (pass1 != pass2) {
        //alert("Passwords Do not match");
        document.getElementById("pass1").style.borderColor = "#E34234";
        document.getElementById("pass2").style.borderColor = "#E34234";
        ok = false;
		alert("Passwords dont Match!!!");
    }
    else {
            }
    return ok;
}
</script>
<form action="register.php" method="post" onSubmit="return passcheck()">
<span>enter the username &nbsp; &nbsp;<input type="text" name="Username" required style="border-radius:7px; border:2px solid #2B2525;" ></span><br><br>
<span> enter a password  &nbsp;&nbsp;	<input id="pass1" type="password" name ="Password" placeholder="Enter your password" style="border-radius:7px; border:2px solid #2B2525;"></span><br><br>
<span> re enter password &nbsp;&nbsp;	<input id="pass2" type="password" name ="confirmpass" placeholder="Re-Enter your password" style="border-radius:7px; border:2px solid #2B2525;"></span>
<br><br><span>enter your email id &nbsp;&nbsp;<input type="email" reqiured pattern="[a-z0-9._]+@[a-z0-9.]+\.+[a-z]{2,4}$" placeholder="enter a valid email Id" style="border-radius:7px; border:2px solid #2B2525;" name="eml" ></span><br>
<br>

<input type="submit" name="register" value="Sign Me Up" style="border-radius:7px; border:2px solid #2B2525;">
</form>
</body>
</html>	