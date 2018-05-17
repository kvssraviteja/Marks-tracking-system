<?php
$server="localhost";
$dbuser="root";
$error="";
$conn=mysqli_connect($server,$dbuser,$error);
  if(!$conn)
  {
    echo "connection failed";
  }
    $query="CREATE DATABASE faculty_db";
	if(mysqli_query($conn,$query))
	{
	  echo "database created successfully";
	}
    else 
	{
        echo "Error creating database: " . mysqli_error($conn);
    }
mysqli_close($conn);
?>
