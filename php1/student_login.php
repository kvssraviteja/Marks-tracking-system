<?php
session_start();
$server="localhost";
$dbuser="root";
$error="";
if(isset($_POST['submit2']))
{
  $conn=mysqli_connect($server,$dbuser,$error);
  if(!$conn)
  {
    echo "connection failed";
  }
  if(mysqli_select_db($conn,"student_db"))
   {
     $x=$_POST['stu_id'];
     $_SESSION['stu_id']=$x;
	 $password=$_POST['stu_pwd'];
	 $query="select stu_pwd from student_table where stu_id='$x'";
	/* $q="select stu_id from student_table where stu_id=\"$stu_id\"";
	 $r=mysqli_query($r);*/
	 $ret=mysqli_query($conn,"$query");
	 if(!$ret)
	 {
	    echo "query failed";
	 }
	 /*if(mysqli_num_rows($r)==0)
	 {
	   echo "invalid username";
	 }*/
	 else
	 {
	   $row=mysqli_fetch_array($ret,MYSQLI_ASSOC);
	   if($row['stu_pwd']==$password)
	   {
	      header("Location: student_home.html");
	   }
		else
		{
		  echo "invalid password or username";
		}
	}
	}
  }  
?>
