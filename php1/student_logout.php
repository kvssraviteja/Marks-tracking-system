<?php
session_start();
session_unset();
if(isset($_POST['logout']))
{
header("Location: student_login.html");
}
session_destroy();
?>