<html>
<head>
<title>webpage login form</title>
<style>
h1{
    position:absolute;
top:9px;
left:15px;
z-index: 5;
}
pre{ 
    font-size: 16px;
    position:absolute;
top:29px;
left:17px;
z-index: 5;
}
h2 {
margin-bottom:20px;
}
body {
     background-image: url("../sao.jpg");
	 background-size: 100%;
     opacity: 50;
	 background-repeat: no-repeat;
	 font-family: "Helvetica Neue",Helvetica,Arial;
	 padding-top:20px;
	 
	 }

.container{
    width:409px;
        max-width:406px;
        margin:0 auto;
		top:40px;
    position: relative;
    text-align: center;
}
.clr{
    clear: both;
}
.container > header{
    padding: 30px 30px 10px 20px;
    margin: 0px 20px 10px 20px;
    position: relative;
    display: block;
    text-shadow: 1px 1px 1px rgba(0,0,0,0.2);
    text-align: left;
}
.container > header h1{
    font-family: 'BebasNeueRegular', 'Arial Narrow', Arial, sans-serif;
    font-size: 35px;
    line-height: 35px;
    position: relative;
    font-weight: 400;
    color: #fff;
    text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
    padding: 0px 0px 5px 0px;
}
.container > header h1 span{

}
.container > header h2, p.info{
    font-size: 16px;
    font-style: italic;
    color: #f8f8f8;
    text-shadow: 1px 1px 1px rgba(0,0,0,0.6);
}
#signup {
    padding: 0px 25px 25px;
    background:  #fff;
    opacity: 0.75;
    box-shadow: 
        0px 0px 0px 5px rgba( 255,255,255,0.4 ), 
        0px 4px 20px rgba( 0,0,0,0.33 );
    -moz-border-radius: 25px;
    -webkit-border-radius: 25px;
    border-radius: 25px;
    display: table;
    position: static;
    }

    div{color:red;
        }
    body{ margin: 75px 75px 75px 75px;
		align:center;
	     }
    h3{
	  opacity: 1;
	  padding: 10px 10px 10px 10px;}
#signup .header h3 {
    color: #333333;
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 5px;
}

#signup .header p {
    color: #8f8f8f;
    opacity: 1;
    font-size: 14px;
    font-weight: 300;
}

#signup .sep {
    height: 1px;
    background: #e8e8e8;
    width: 406px;
    margin: 0px -25px;
}

#signup .inputs {
    margin-top: 25px;
    opacity: 1;
}

#signup .inputs label {
    color: #8f8f8f;
    font-size: 12px;
    font-weight: 300;
    letter-spacing: 1px;
    margin-bottom: 7px;
    display: block;
}

input:-webkit-input-placeholder {
    color:    #b5b5b5;
}

input:-moz-placeholder {
    color:    #b5b5b5;
}

#signup .inputs input[type=email], input[type=password],input[type=text],textarea {
    background: #f5f5f5;
    font-size: 0.8rem;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: none;
    padding: 13px 10px;
    width: 330px;
    margin-bottom: 20px;
    box-shadow: inset 0px 2px 3px rgba( 0,0,0,0.3 );
    clear: both;
}

#signup .inputs input[type=email]:focus, input[type=password]:focus , input[type=text]:focus{
    background: #fff;
    box-shadow: 0px 0px 0px 3px #fff38e, inset 0px 2px 3px rgba( 0,0,0,0.4 ), 0px 5px 5px rgba( 0,0,0,0.15 );
    outline: none;   
}

#signup .inputs input[type=email]:invalid {
    background: #F98A8C;
    box-shadow: 0px 0px 0px 3px #fff38e, inset 0px 2px 3px rgba( 0,0,0,0.4 ), 0px 5px 5px rgba( 0,0,0,0.15 );
    outline: none;   
}

#signup .inputs .checkboxy {
    display: block;
    position: static;
    height: 25px;
    margin-top: 10px;
    clear: both;
}

#signup .inputs input[type=checkbox] {
    float: left;
    margin-right: 10px;
    margin-top: 3px;
}

#signup .inputs label.terms {
    float: left;
    font-size: 14px;
    font-style: italic;
}

#signup .inputs #submit {
    width: 100%;
    margin-top: 20px;
    padding: 15px 0;
    color: #fff;
    opacity: 0.9;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 1px;
    text-align: center;
    text-decoration: none;
        background: -moz-linear-gradient(
        top,
        #b9c5dd 0%,
        #a4b0cb);
    background: -webkit-gradient(
        linear, left top, left bottom, 
        from(#b9c5dd),
        to(#a4b0cb));
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 45px;
    border: 1px solid #737b8d;
    -moz-box-shadow:
        0px 5px 5px rgba(000,000,000,0.1),
        inset 0px 1px 0px rgba(255,255,255,0.5);
    -webkit-box-shadow:
        0px 5px 5px rgba(000,000,000,0.1),
        inset 0px 1px 0px rgba(255,255,255,0.5);
    box-shadow:
        0px 5px 5px rgba(000,000,000,0.1),
        inset 0px 1px 0px rgba(255,255,255,0.5);
    text-shadow:
        0px 1px 3px rgba(000,000,000,0.3),
        0px 0px 0px rgba(255,255,255,0);
    display: table;
    position: static;
    clear: both;
}

#signup .inputs #submit:hover {
    background: -moz-linear-gradient(
        top,
        #a4b0cb 0%,
        #b9c5dd);
    background: -webkit-gradient(
        linear, left top, left bottom, 
        from(#a4b0cb),
        to(#b9c5dd));
}
</style>
<script>
 function passcheck() {
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var ok = true;
    if (pass1 != pass2) {
        //alert("Passwords Do not match");
        document.getElementById("pass1").style.background = "#F98A8C";
        document.getElementById("pass2").style.background = "#F98A8C";
        ok = false;
		alert("Passwords dont Match!!!");
    }
    else {
            }
    return ok;
}
</script>
<!--#E34234-->
</head>
<body>
<div class="container">
	<form id="signup" action="register.php" method="post">
		<div class="header">
			<h3> Pc Assembly Online</h3>
			<p>Customer's Registration Page</p>
		</div>
		<div class="sep"></div>
		<div class="inputs">
			<h3>Enter a Username <input type="text" name="Username" required placeholder="enter your username"></h3>
			<h3>Enter a Password <input id="pass1" type="password" name ="Password" placeholder="Enter your password" ></h3>
			<h3>Re enter a Password <input id="pass2" type="password" name ="Password" placeholder="Enter your password" ></h3>
            <h3>Enter your Email Id <input type="email" required  pattern="[a-z0-9._]+@[a-z0-9.]+\.+[a-z]{2,4}$" name="eml" ></h3>
			<h3>Address<textarea name="address" ></textarea></h3>
            <h3>Phone No<input type="text" name="phone" required pattern="[7-9]{1}[0-9]{9}$"></h3>
			<input type="submit" id="submit" name="register"  value="Sign me Up" onclick="return passcheck();"> 			
            
			
		</div>
	</form>
</div>



</body>
</html>

