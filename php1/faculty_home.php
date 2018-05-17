<?php
session_start();
echo "<a href=\"faculty_sub.html\">Go Back..</a>";
echo "<form action=\"faculty_logout.php\" method=\"post\" align=\"right\"> <input type=\"submit\" name=\"logout\" value=\"logout\"></form>";
$count=0;
 $server="localhost";
$dbuser="root";
$error="";
if(isset($_POST['get_sub_marks']))
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
	 $sub=$_POST['sub'];
	 $tablename=$_POST['reg'].$_POST['year'].$_POST['sem'];
	 $query="select stu_id,$sub from $tablename" ;
	 $query2="desc $tablename";
	 $query1="select $sub from $tablename" ;
	 $q="select stu_id from $tablename";
	 $ret2=mysqli_query($conn,$query2);
	 $ret=mysqli_query($conn,$query);
	 $ret1=mysqli_query($conn,$query1);
	 $r=mysqli_query($conn,$q);
	 echo " <table border= \"1 \" height=\"80%\" width=\"80%\"> " ;
	 echo "<tr>";
	 echo "<th> Regd No. </th>";
	 echo "<th>".$sub."</th>";
	 echo "<th> Pass/Fail </th>";
	 echo "</tr>";
	 
		//echo " <tr><th>name</th><th>student id</th><th>$det[0]</th>";
		$j=mysqli_num_rows($r);
		$sum=0;
		   while($det=mysqli_fetch_array($ret)) 
	         {
			 
			echo "<tr>";
			echo "<td>";
			echo "<center>";
			echo $det[0];
			echo "</center>";
			echo "</td>";
			echo "<td>";
			echo "<center>";
			echo $det[1];
			echo "</center>";
			echo "</td>";
			echo "<td>";
			echo "<center>";
                    if($det[1]>=35)
		            {
		            echo "pass";
					$count++;
		            }
		            else
		             {
		              echo  "fail";
		              }
					 $sum=$sum+$det[1];
					 
		          }
		  echo "</center>";
		  echo "</td>";
		    echo "</tr>";
			}
			echo"</table><br><br>";
			echo "<center>TOTAL MEMBERS PASSED =".$count."</center>"."<br><br>";
			$x=$sum/$j;
			echo "<center>AVERAGE OF  $sub =".$x."</center>";
			}
			
			?>