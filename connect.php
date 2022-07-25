<?php
session_start();
$host="localhost";
$user="root";
$passwor="";
$db="loginp";
$conn=new mysqli($host,$user,$passwor,$db);
if($conn->connect_error)
{
  echo "error";
}
else
{
  echo "connected";
}
$usname=$_POST['uname'];
$pass=$_POST['psw'];
//echo $usname;
//echo $pass;
$sql="select * from logindata where Username='$usname' AND  Password='$pass' ";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
if($row['Username']==$usname && $row['Password']==$pass)
{
    //echo "welcome";
    $_SESSION['username']=$usname;
    header("location:package.php");
}
?>