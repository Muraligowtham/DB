<?php session_start(); 

$name=$_GET["user"];
$pa=$_GET["pass"];
$mail=$_GET["email"];
srand(mktime());
$uid= rand();
$flag=0;
$con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");
$sql="insert into users values('$name','$pa','$mail','$uid','$flag')";
if(mysqli_query($con,$sql))
{
  //  echo'hiii';
    echo"<script>alert('Successfully Registered')</script>";
   // Header("Location:login.html");
    $_SESSION['mname']=$name;
    $_SESSION['memail']=$mail;
    $_SESSION['muid']=$uid;
    $_SESSION['mpass']=$pa;
    @require 'curl.php';
}
else
{
    //echo mysqli_error();
    echo"<script>alert('Could not be registered USER NAME may not be available or the Email may be already registered')</script>";
    @require 'register.html';
}

?>
