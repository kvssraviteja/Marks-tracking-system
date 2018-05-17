<?php
$server="localhost";
$dbuser="root";
$error="";
if(isset($_POST['submit1']))
{

  $conn=mysqli_connect($server,$dbuser,$error);
  if(!$conn)
  {
    echo "connection failed";
  }
  if(mysqli_select_db($conn,"faculty_db"))
   {	
     $fac_id=$_POST['fac_id'];
	 $password=$_POST['fac_pwd'];
	 $query="select fac_pwd from faculty_table where fac_id=\"$fac_id\"";
	// $q="select fac_id from faculty_table where fac_id=\"$fac_id\"";
	 //$r=mysqli_query($r);
	 $ret=mysqli_query($conn,$query);
	 if(!$ret)
	 {
	    echo "query failed";
	 }
	/* if(mysqli_num_rows($r)==0)
	 {
	   echo "invalid username";
	 }*/
	 else
	 {
	   $row=mysqli_fetch_array($ret,MYSQLI_ASSOC);
	   if($row['fac_pwd']==$password)
	   {
	      header("Location: faculty_home.html");
		}
		else
		{
		  echo "invalid password ";
		}
	}
	}
  }  
?>
