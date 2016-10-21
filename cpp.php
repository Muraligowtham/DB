<?php session_start();

$_SESSION['logmethod']=4;


if(isset($_SESSION['username']))
{
    $namep=$_SESSION['username']; 
    $con=mysqli_connect("localhost", "root","") or die("No connection");
    mysqli_select_db($con,"test") or die ("DATABASE not availabel");
    $sql="SELECT * FROM users WHERE username='$namep'";
    $result=mysqli_query($con,$sql);
    
    $count=mysqli_num_rows($result);

    if($count>=1)
    {

        $cols=mysqli_fetch_array($result);
    
        if($cols['flag']==1)
            @require 'allcpp.php';
        else
            @require 'confirm.html';
    }
}
else
    @require 'login.html';

?>
