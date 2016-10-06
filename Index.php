<html>
<Title>Telecom</Title>
<?php
 
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = 'secret';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
	die('Could not connect: ' . mysql_error());
}

mysql_close($conn);

?>
<form action='Welcome.php' method="post">

<body background='./img/3.jpg'>
<table align='Center'>
<tr><td><H4 style="color:White">Telecomunication Management System</H4></td></tr>
</table>
<div align='middle'><h5 style="color:White">SIGN UP</h5></div>
<table align="Center">
<tr><td><label value='UserName :' style="color:White">Username</label></td>
<td><input type=text id='username' name='username'></input></td><tr>
<tr><td><label value='Password :' style="color:White">Password</label></td><td><input type=password id='Password' name='Password'></input></td><tr>
<tr><td></td><td><button value='submit' type=Submit>Submit</button><td></tr>
</table>
</body>
</form>
</html>

