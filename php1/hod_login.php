<?php
echo "<form action=\"hod_logout.php\" method=\"post\"> <input type=\"submit\" name=\"logout\" value=\"logout\"></form>";
session_start();
$server="localhost";
$dbuser="root";
$error="";
if(isset($_POST['submit']))
{
  $conn=mysqli_connect($server,$dbuser,$error);
  if(!$conn)
  {
    echo "connection failed";
  }
  if(mysqli_select_db($conn,"hod_db"))
   {
     $hod_id=$_POST['hod_id'];
	 $password=$_POST['hod_pwd'];
	 $query="select hod_pwd from hod_table where hod_id=\"$hod_id\"";
	 $q="select hod_id from hod_table where hod_id=\"$hod_id\"";
	 $r=mysqli_query($conn,$q);
	 $ret=mysqli_query($conn,$query);
	 if(!$ret)
	 {
	    echo "query failed";
	 }
	 if(mysqli_num_rows($r)==0)
	 {  
	    echo "invalid username ";
	 }
	/* if(mysqli_num_rows($ret)==0)
	 {
	   echo "invalid  password";
	 } */
	 else
	 {
	   $row=mysqli_fetch_array($ret,MYSQLI_ASSOC);
	   if($row['hod_pwd']==$password)
	   {
	      header("location:hod_home.html");
		}
		else
		{
		  echo "invalid password";
		}
	}
	}
  }  
?>
