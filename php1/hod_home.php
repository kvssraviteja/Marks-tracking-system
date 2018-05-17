<?php
session_start();
echo "<a href=\"hod_home.html\">Go Back..</a>";
echo "<form action=\"hod_logout.php\" method=\"post\" align=\"right\"> <input type=\"submit\" name=\"logout\" value=\"logout\"></form>";
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
	/* if($reg==""||$year=""||$sem="")
	 {
	   echo "invalid input";
	  }*/
	 $tablename=$reg.$year.$sem;
	 $query="select * from $tablename" ;
	 $query1="desc $tablename";
	 $ret=mysqli_query($conn,$query);
	 $ret1=mysqli_query($conn,$query1);
	 $i=mysqli_num_rows($ret1);
		 echo " <table border= \"1 \" height=\"80%\" width=\"70%\"> " ;
		 while($det=mysqli_fetch_array($ret1))
		 {
		 echo "<th>".$det[0]."</th>";
		 }
		 //echo "<th>AVERAGE</th>";
		 $sum=0;
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
			/*echo "<td>";
			echo "<center>";
	for($j=0;$j<$i;$j++)
			{
			$det=mysqli_fetch_array($ret);
			$sum=$sum+$det[$j];
			$k=$i-1;
			$sum=$sum/$k;
			echo "$sum";
			}
			echo"</center>";
			echo "</td>";
			} */
			echo "</tr>";
		}
		echo "</table>";
		}
		}
	?>

	