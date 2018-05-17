<?php
session_start();
session_unset();
if(isset($_POST['logout']))
{
header("Location: hod_login.html");
}
session_destroy();
?>