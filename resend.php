<?php session_start();

$mname = $_SESSION['username'];

$con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");
$sql="SELECT * FROM users WHERE username='$mname'";
$result=mysqli_query($con,$sql);

// mysqli_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count>=1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
//session_register("name");
//session_register("pa");
#session_register("mysubcode");
#header("location:retrieve_teacher.php?username=$myusername");
 
    $cols=mysqli_fetch_array($result);
    
    $memail=$cols['email'];
    $muid=$cols['uid'];
    $pa=$cols['password'];
    $_SESSION['mname']=$mname;
    $_SESSION['memail']=$memail;
    $_SESSION['muid']=$muid;
    $_SESSION['mpass']=$pa;
    $_SESSION['resend']=1;
    @require 'curl.php';
    @require 'confirm.html';
}

?>