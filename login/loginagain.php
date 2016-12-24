<?php 
session_start();
session_destroy();

?>
<html>
<body onload="timer=setTimeout(function(){ window.location='../pages/index.php';}, 5000)">
<p>You have been logged out for security reasons. You will be redirected to login in  5 seconds</p>
</body>
</html>