<html>
    <head><title>RAting</title></head>
    <body>
        <form action="rating2.php" method="get">
<?php

$aid=$_GET['ld'];
$qid=$_GET['va'];

session_start();
$_SESSION['aidd']=$aid;

$_SESSION['qidd']=$qid;
$aut=$_SESSION['username'];




 $con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");
$sql="select * from answers where aid=$aid and qid=$qid and author like '$aut'";

$res=mysqli_query($con,$sql);

$no=  mysqli_num_rows($res);
if($no==0)
{
   // echo "no same";
   @require 'rating.php';
    
    
    
}
 else 
    
 {
     //echo "Same";
     @require 'rating4.php';
 }

?>
    </form>
    </body>
</html>