<html>
<style>
h1, h2, h3, h4, h5, h6 { margin: 5px 0; font-weight: bold; color:White; align:center; }
</style>
<body background='./img/3.jpg'>

 <table align='Center'>
<tr><td><H4 style="color:White">Telecomunication Management System</H4></td></tr>
</table>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
 server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost:3306", "root", "secret", "telecomm");

// Check connection
if($link === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}
$username=$_POST["username"];

$password=$_POST["Password"];
// Attempt insert query execution
$sql = "INSERT INTO login (username, password) VALUES ('$username','$password')";
if(mysqli_query($link, $sql)){
	echo "<h5>Record added Successfully</h5>";
} else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
</body>
</html>