<?php
$server="localhost";
$dbuser="root";
$error="";
$dbname="admin_db";
$conn=mysqli_connect($server,$dbuser,$error);
  if(!$conn)
  {
    echo "connection failed";
  }
    $query="CREATE DATABASE $dbname";
	if(mysqli_query($conn,$query))
	{
	  echo "database created successfully";
	}
    else 
	{
        echo "Error creating database: " . mysqli_error($conn);
    }
	$conn = mysqli_connect($server, $dbuser, $error, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "CREATE TABLE 1311 (
stu_id INT(6), 
M1 INT(6) NOT NULL,
ENGG_CHEMISTRY INT(6) NOT NULL,
ENGG_MECHANICS INT(6) NOT NULL,
CP INT(6) NOT NULL,
E&S INT(6) NOT NULL,
ENGG_CHEM_LAB INT(6) NOT NULL,
ENGG_COMM_LAB1 INT(6) NOT NULL,
C_LAB INT(6) NOT NULL,
FOREIGN KEY(stu_id) REFERENCES stu_table(stu_id),
)";
if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

