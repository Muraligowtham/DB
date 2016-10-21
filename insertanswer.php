<?php session_start();

$answer=$_GET["answer"];

$con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");
$date=  date("d/m/Y");
$time=  time();
$name=$_SESSION['username'];
$qid=$_SESSION['qid'];
$sql="insert into answers values(null,$qid,'$answer','$name','$date','$time',0)";
if(mysqli_query($con,$sql))
{
    // echo"<script>alert('Successfully Posted answer')</script>";
    @require 'curl2.php';
}
?>

