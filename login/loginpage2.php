 <?php
session_start();
//session variable check
if($_SESSION['user']!='guest'){ 
    echo "A user is already logged in ... please logout first ";
    //sleep(5);
    //header('Location:../pages/index.php');
}
//include 'sqlconnect.php';
$usr=0;
// this page is to check if a user trying to log on is present in the db
if(isset($_POST['logme'])){
    
    $data_missing = array();

    if(empty($_POST['Username'])){

        $data_missing[]='Username';
    }else{

        //trim white spaces
        $u_name =trim($_POST['Username']);

    }

    
    $pass =sha1(trim($_POST['Password']));
    if(empty($data_missing))
    {
        require_once('sqlconnect.php');
        //retrive username to check if such a user is already present in the system 
        $queri=("SELECT password FROM user_details where email='$u_name'");
        //retreive username and password for validation
        $query = ("SELECT password FROM user_details where email='$u_name' and password='$pass'");
        $queryc =("SELECT * FROM user_details where email='$u_name' and password='$pass'");
        $u_resp=mysqli_query($conn,$queri);
        $response = mysqli_query($conn,$query);
        $privchk = mysqli_query($conn,$queryc);
        $rowu= mysqli_num_rows($u_resp);
        $rows= mysqli_num_rows($response);
        $u_data = mysqli_fetch_assoc($privchk);
        $username=$u_data['username'];
        
        if($rowu)
        {
            if($rows==1)
            {
                    
                if($u_data['privelage']=='U'){
                    echo "username verified proceed to respective page";
                    $_SESSION['user']=$u_name;
                    $_SESSION['username']=$username;
                    $_SESSION['priv']=$u_data['privelage'];
                    header('Location:../pages/index.php');

                } elseif ($u_data['privelage']=='A') {
                    echo"admin login";
                    
                    $_SESSION['user']=$u_name;
                    
                    $_SESSION['priv']=$u_data['privelage'];
                    header('Location:../pages/administrator.php');
                }elseif ($u_data['privelage']=='R'){
                    echo "retailer login";

                    $_SESSION['user']=$u_name;
                    $_SESSION['username']=$username;
                    $_SESSION['priv']=$u_data['privelage'];
                    header('Location:../pages/retailerhome.php');
                }
                exit();
            }
            else
            {
                //echo "invalid password please try again";
                $usr=1;
            }
        }else
        {
            //echo "no such user";
            $usr=2;
        }
    }
}
?><html>
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

#signup .inputs input[type=email], input[type=password] {
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

#signup .inputs input[type=email]:focus, input[type=password]:focus {
    background: #fff;
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
</head>
<body>
<div class="container">
	<form id="signup" action="loginpage2.php" method="post">
		<div class="header">
			<h3> Pc Assembly Online</h3>
			<p>Customer's Authorised Login</p>
		</div>
		<div class="sep"></div>
		<div class="inputs">
			<h3>Email <input type="email" name="Username" placeholder="enter your username"></h3><?php if($usr==2){echo "<strong>   no such user </strong> ";}?><br><br>
			<h3>Password <input type="password"  name ="Password" placeholder="enter your password"></h3><?php if($usr==1){echo "<strong>   wrong password  </strong>";}?><br><br>
			
            
			
			<input type="submit" id="submit"name="logme"  value="Log In"> 			
            <h4>New User? <a href="registerform2.php"> Register Here.</a></h4>
            <h4>Forgot Password? <a href="resetpassword.php"> Forgot My Password?</a></h4>
			
		</div>
	</form>
</div>



</body>
</html>

