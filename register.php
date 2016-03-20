<html>
<?php
$username="root";
$password="";
$hostname="localhost";
$conn=mysql_connect($hostname,$username,$password) or die("cannot connect to mysql");
//echo "connected to mysql";
$sele=mysql_select_db("canteen",$conn) or die("cannot select db");
$rno=$_POST['rno'];
$pass=$_POST['pass'];
$email=$_POST['email'];
$mob=$_POST['mob'];
$dob=$_POST['dob'];
$ini=$_POST['ini'];
//echo "Name is".$name."<br/>";
//echo "Rollno is".$rno."<br/>";
$sql="insert into student (rollno,password,email,dob,mobileno) values('$rno','$pass','$email','$dob','$mob')";
$que=mysql_query($sql,$conn);
if($que)
echo " data inserted succesfully";
else
echo "data not inserted";
$d=time();
$sql="insert into price (rollno,presentcre,purchasedcre,newcredit,date) values('$rno','$ini','','','$d')";
$que=mysql_query($sql,$conn);
?>
</html>
 
