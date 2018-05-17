<?php
$cookie_name="userr1";
$cookie_value="psw1";
setcookie($cookie_name,$cookie_value,time()+8600*30,"/");
?>
<html>
<body>
<?php
if(!isset($_COOKIE[$cookie_name]))
 echo "not set";
 else
 echo "cookie ".$cookie_name."is set";
?>
</body>
</html>

