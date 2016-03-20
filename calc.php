<html>
<body>
<?php
$username="root";
$password="";
$hostname="localhost";
$conn=mysql_connect($hostname,$username,$password) or die("cannot connect to mysql");
$sele=mysql_select_db("canteen",$conn) or die("cannot select db");
$item1=$_POST['i1'];
$item2=$_POST['i2'];
$item3=$_POST['i3'];
$item4=$_POST['i4'];
$item5=$_POST['i5'];
$item6=$_POST['i6'];
$qua1=$_POST['Q1'];
$qua2=$_POST['Q2'];
$qua3=$_POST['Q3'];
$qua4=$_POST['Q4'];
$qua6=$_POST['Q6'];
$qua5=$_POST['Q5'];
$price2="";
$price1="";
$price3="";
$price4="";
$price6="";
$price5="";
$sql="select * from items";
$que=mysql_query($sql,$conn);
while($row=mysql_fetch_array($que,MYSQL_ASSOC))
{
	if($item1==$row["fooditems"])
	{
		$price1=$row["price"]*$qua1;
		//echo "$price1";
	}
	if($item2==$row["fooditems"])
		$price2=$row["price"]*$qua2;
	if($item3==$row["fooditems"])
		$price3=$row["price"]*$qua3;
	if($item4==$row["fooditems"])
		$price4=$row["price"]*$qua4;
	if($item6==$row["fooditems"])
		$price6=$row["price"]*$qua6;
	if($item5==$row["fooditems"])
		$price5=$row["price"]*$qua5;
}
$tot=$price1+$price2+$price3+$price4+$price5+$price6;
$sql="select presentcre from price where rollno='$_SESSION['newrno']'";
$que=mysql_query($sql,$conn);
$newpr=$que-$tot;
$sql="update price set purchasedcre=".$tot.",newcredit="$newpr."where rollno="$_SESSION['newrno']"";
?>
<?php
$username="root";
$password="";
$hostname="localhost";
$conn=mysql_connect($hostname,$username,$password) or die("cannot connect to mysql");
$sele=mysql_select_db("canteen",$conn) or die("cannot select db");
session_start();
echo $_SESSION['newrno'];
$sql="insert into iteminfo(rollno,item,quantity,date)values( '$_SESSION[ 'newrno'] ','');  
$que=mysql_query($sql,$conn);



?>
<form method="POST" action="">
<table border="1.0" width="50%" color="white">
<tr>
<td> FOOD ITEMS</TD><TD>QUANTITY</TD><TD>PRIZE</TD>
</tr>
<tr>
<td> <input type="text" name="i1" value="<?php echo $item1; ?>"/></TD><TD> <input type="text" name="Q1" value="<?php echo $qua1;?> "/></TD>
<TD><input type="text" name="p1" value="<?php echo $price1;?> "/></TD>
</tr>
<tr>
<td> <input type="text" name="i2"  value="<?php echo $item2; ?>"/></TD><TD> <input type="text" name="Q2" value="<?php echo $qua2;?>"/></TD>
<TD><input type="text" name="p2" value="<?php echo $price2;?>"/></TD>
</tr>
<tr>
<td> <input type="text" name="i3"  value="<?php echo $item3; ?>"/></TD><TD> <input type="text" name="Q3" value="<?php echo $qua3;?>"/></TD>
<TD><input type="text" name="p3"value="<?php echo $price3;?>"/></TD>
</tr>
<tr>
<td> <input type="text" name="i4"  value="<?php echo $item4; ?>"/></TD><TD> <input type="text" name="Q4" value="<?php echo $qua4;?>"/></TD>
<TD><input type="text" name="p4" value="<?php echo $price4;?>"/></TD>
</tr>
<tr>
<td> <input type="text" name="i5"  value="<?php echo $item5; ?>"/></TD><TD> <input type="text" name="Q5" value="<?php echo $qua5;?>"/></TD>
<TD><input type="text" name="p5" value="<?php echo $price5;?>"/></TD>
</tr>
<tr>
<td> <input type="text" name="i6"  value="<?php echo $item6; ?>"/></TD><TD> <input type="text" name="Q6" value="<?php echo $qua6;?>"/></TD>
<TD><input type="text" name="p6" value="<?php echo $price6;?>"/></TD>
</tr>
<tr>
<td colspan="2">TOTAL PRICE</td>
<td> <input type="text" name="b1" value="<?php echo $tot;?>" /></TD>
</tr>
</table>
</form>
</body>
</html>
