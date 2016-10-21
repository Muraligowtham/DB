<?php session_start();

 $name=$_SESSION['username'];
 $uid=$_POST['uid'];
 
 $con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");
$sql="SELECT * FROM users WHERE username='$name'";
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
    
    if($cols['uid']==$uid)
    {
        $sql="UPDATE users SET flag=1 WHERE username='".$name."'";
        $result=mysqli_query($con,$sql);
        $_SESSION['veriemail']=1;
        if($_SESSION['logmethod']==0)
        {
            $_SESSION['username']=$name;
            header("location:mainpage1.php?username=$myusername");
        
        }
        else if($_SESSION['logmethod']==1)
        {
            $_SESSION['username']=$name;
        
         header("location:postquery.html?username=$myusername");
        }
    }
    else
    {
         echo"<script>alert('Invalid Confirm Id')</script>";
         @require 'login.html';
    }
 
}
?>