<?php session_start();

$query=$_GET["query"];
$con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not available");
$sql="$query";
if(mysqli_query($con,$sql))
{
     echo"<script>alert('Successfull')</script>";
     
}
?>
