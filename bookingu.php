<?php
$host="localhost";
$user="root";
$passwor="";
$db="bookingde";
$conn=new mysqli($host,$user,$passwor,$db);
if($conn->connect_error)
{
  echo "error";
}
else
{
  //echo "connected";
}
$visakhapatnam=3000;
$agra=3000;
$ladakh=25000;
$andaman=9000;
$udaipur=6000;
$varnasi=4500;
$goa=8500;
$manali=10000;
$kodaikanl=7000;
$bangalore=5000;
$kutch=5000;
$amritsar=7000;



if(isset($_POST['bookb']))
{
  $nameuse=$_POST['name'];
  $emailu=$_POST['email'];
  $phoneus=$_POST['phone'];
  $ldate=$_POST['leaving'];
  $arrdat=$_POST['arrivals'];
  $destus=$_POST['location'];
  $numpeo=$_POST['guests'];
  $pickuse=$_POST['address']; 

}
$sql="insert into detailstrip(Name,email,phone,pickup,dest,npeople,arrdate,leadate) values(?,?,?,?,?,?,?,?)";
$stmt=$conn->prepare($sql);
$stmt->execute();
$stmt->store_result();
$num=$stmt->num_rows;
if($num==0)
{
    $stmt->close();
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("ssississ",$nameuse,$emailu,$phoneus,$pickuse,$destus,$numpeo,$arrdat,$ldate);
    $stmt->execute();
  //header("location:success.php");
}
else
echo "already in use";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <style>
      table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
table{
  margin-left: auto;
  margin-right: auto;
  
}
th,td{
  background-color: black;
  font-size:50px;
  color:white;
}

      </style>
    <title>Payment</title>
</head>
<body style=" background-image: url(https://weem.ai/wp-content/uploads/2018/12/10-company-booking-background.jpg );">
    <section class="header">

        <a href="home.php" class="logo">TRIP IT</a>
     
        <nav class="navbar" class=" fixed-top ">
           <a href="home.php">Home</a>
           <a href="about.php">About</a>
           <a href="package.php">Package</a>
           <a href="book.php">Book</a>
        </nav>
     
        <div id="menu-btn" class="fas fa-bars"></div>
     
     </section>
     <br>
    <h1 style="text-align: center; font-size: 50px;">Confirmed ✅</h1>
    <br>
    
    
    <br>
    <br>
    <table >
      
    <h1 style="font-size:50px; text-align:center;">Your Trip Details</h1>
    <tr>
    <td>Name:</td> 
    <td><?php echo  $nameuse?></td>
</tr>
<tr>
    <td>Email :</td>
    <td><?php echo  $emailu?><td>
</tr>
<tr>
    <td>Destination: </td>
    <td><?php echo  $destus?></td>
</tr>
<tr>
    <td>Pick Up: </td>
    <td><?php echo  $pickuse?></td>
</tr>
<tr>
    <td>Arrival Date: </td>
      <td><?php echo $arrdat?></td>
</tr>
<tr>
    <td>Leave Date: </td>
    <td><?php echo $ldate?></td>
</tr>
<tr>
    <td>Cost: </td>
    <td><?php 
    if ($destus=='goa')
    {
    echo  $numpeo*$goa;
    }
    else if($destus=='amritsar')
    {
     echo $numpeo*$amritsar;
    }
    else if($destus=='bangalore')
    {
     echo $numpeo*$bangalore;
    }
    else if($destus=='agra')
    {
     echo $numpeo*$agra;
    }
    else if($destus=='ladakh')
    {
     echo $numpeo*$ladakh;
    }
    else if($destus=='kutch')
    {
     echo $numpeo*$kutch;
    }
    else if($destus=='udaipur')
    {
     echo $numpeo*$udaipur;
    }
    else if($destus=='kodaikanal')
    {
     echo $numpeo*$kodaikanal;
    }
    else if($destus=='manali')
    {
     echo $numpeo*$manali;
    }
    else if($destus=='varanasi')
    {
     echo $numpeo*$varasani;
    }
    else
    {
     echo $numpeo*$andaman;
    }
    ?></td>
</tr>
   </table>
    

  <br>
  <br>

    <h1 style="text-align: center; font-size: 50px;">Thank You For using TRIP IT</h1>
    <br>
    <br>
    
    
    
    
    
    <script src="js/script.js"></script>
</body>
</html>
