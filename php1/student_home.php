<?php
session_start();
	 $x=$_SESSION['stu_id'];
echo "<a href=\"student_home.html\">Go Back..</a>";
echo "<form action=\"student_logout.php\" method=\"post\" align=\"right\"> <input type=\"submit\" name=\"logout\" value=\"logout\"></form>";
echo "<center><h1>WELCOME $x</h1></center><br><br>";
$server="localhost";
$dbuser="root";
$error="";
if(isset($_POST['get_marks']))
{
  $conn=mysqli_connect($server,$dbuser,$error);
  if(!$conn)
  {
    echo "connection failed";
  }
  if(mysqli_select_db($conn,"marks_db"))
   {
     $reg=$_POST['reg'];
	 $year=$_POST['year'];
	 $sem=$_POST['sem'];
	 $tablename=$reg.$year.$sem;
     $query="select * from $tablename where stu_id = '$x'";
	 $query2="desc $tablename";
	 $ret2=mysqli_query($conn,$query2);
	 $ret=mysqli_query($conn,$query);
	 echo " <table border= \"1 \" height=\"60%\" width=\"80%\"> " ;
	 echo "<tr>";
	 while($det=mysqli_fetch_array($ret2))
	 {	
			echo "<th>".$det[0]."</th>";
	 }
	 $i=mysqli_num_rows($ret2);
	 	 while($det=mysqli_fetch_array($ret))
	     {
	 		   echo "<tr>";
		   for($j=0;$j<$i;$j++)
		   {
			echo "<td>";
			echo "<center>";
			echo $det[$j];
			echo "</center>";
			echo "</td>";
			}
			echo "</tr>";
	 		   echo "<tr>";
			   echo "<td><center>-----</center> </td>";
		   for($j=1;$j<$i;$j++)
		   {
			echo "<td>";
			echo "<center>";
			if($det[$j]>35)
			{
			 echo "pass";
			}
			else
			{
			echo "fail";
			}
			echo "</center>";
			echo "</td>";
			}
			echo "</tr>";
		echo "</table>";
		echo "<br><br><br>";
		$sum=0;
		for($j=1;$j<$i;$j++)
		{
		 $sum=$sum+$det[$j];
		}
		}
		echo "<center>";
		echo "TOTAL="."$sum"."<br><br>";
		$x=$i-1;
		$w=$sum/$x;
		echo "<br>";
echo "AVERAGE MARKS=";
 echo "$w";
 echo "</center>";
 }
}
	 ?>