<?php
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

if(isset($_POST['reg']))
{
  $emailuse=$_POST['email'];
  $userna=$_POST['text'];
  $passu=$_POST['psw'];
  $rpassu=$_POST['psw-repeat'];

}
$sql="insert into logindata(Username,Password,email) values(?,?,?)";
$stmt=$conn->prepare($sql);
$stmt->execute();
$stmt->store_result();
$num=$stmt->num_rows;
if($num==0)
{
    $stmt->close();
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("sss",$userna,$passu,$emailuse);
    $stmt->execute();
    header("location:package.php");
}
else
echo "already in use";



?>