<?php session_start();

$namc=$_GET['user'];
$passc=$_GET['pass'];
$uidc=$_GET['uid'];

$con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");

$sql="select * from users where username like '$namc'";


$res=mysqli_query($con,$sql);


while($row=mysqli_fetch_array($res) or die("<br/><br/>".mysqli_error()))
{

    if($row['flag']==1)
    {
        echo"<script>alert('Your email ID is already verified');</script>";
        $_SESSION['logmethod']==0;
        @require "http://localhost/codehunt/login.php?user=".$namc."&pass=".$passc;
        //echo "<'http://localhost/codehunt/login.php?user=".$namc."&pass=".$passc."'>CLICK HERE TO LOGIN</a>";
        
    }
 else
    {
        $sql2 ="UPDATE users SET flag=1 WHERE username='".$namc."'";
        $res2 =  mysqli_query($con,$sql2);
        $_SESSION['logmethod']==0;
      
        echo "<a href='http://localhost/codehunt/login.php?user=".$namc."&pass=".$passc."'>Your Email ID is Successfully Verified CLICK HERE TO LOGIN</a>";
    }

}

?>