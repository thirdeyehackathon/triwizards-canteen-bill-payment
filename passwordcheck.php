<html>
<?php
$username="root";
$password="";
$hostname="localhost";
$conn=mysql_connect($hostname,$username,$password) or die("cannot connect to mysql");
//echo "connected to mysql";
$sele=mysql_select_db("canteen",$conn) or die("cannot select db");
$rno=$_POST['t1'];
$pass=$_POST['t2'];
$sql="select * from student where rollno='$rno' and password='$pass'";
$que=mysql_query($sql,$conn);
$count=mysql_num_rows($que);
session_start();
$_SESSION['newrno']=$rno;
if($count==1)
{
$n="http://localhost/shri/past.html";
 header("Location:$n");
}
else
return "invalid rollno or password ";
?>
</html>
 
