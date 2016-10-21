<?php session_start(); 

$username=$_GET["email"];

$pa=$_GET["pass"];

$ssn=$_GET["ssn"];

$uname=$_GET["uname"];

$addr1=$_GET["addr1"];

$addr2=$_GET["addr2"];

$city=$_GET["city"];

$zipcode=$_GET["zipcode"];

$state=$_GET["state"];

$country=$_GET["country"];

$phno=$_GET["phno"];

$cardno=$_GET["cardno"];

$cvvno=$_GET["cvvno"];

$expmonth=$_GET["month"];

$expyear=$_GET["years"];


$plan =$_GET["plan"];


srand(mktime());
$uid= rand();
$flag=0;
$link = mysqli_connect("localhost:3306", "root", "secret", "telecomm");

// Check connection
if($link === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql="call telecomm.CreateSingleUserProfile('$username','$pa','$ssn','$uname','$addr1','$addr2','$city',$zipcode,'$state','$country',$phno,'$plan',$cardno,$cvvno,($expmonth.$expyear));";

if(mysqli_query($link, $sql)){
	echo "<script>alert('Record added Successfully')</script>";
	@require 'loginfinal.html';
} else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
