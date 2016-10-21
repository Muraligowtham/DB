
<?php

$aid=$_GET['aid'];
$qid=$_GET['qid'];
$temp=$_GET['tempt'];
$votecount=0;

 $con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");
$sql1="select * from answers where qid =$qid and aid=$aid";
//$ress1=  mysqli_query($con,$sql1);
$res1=mysqli_query($con,$sql1);
while($row=  mysqli_fetch_array($res1))
{
    $votecount=$row['votes'];
}


if($temp=="like")
{
    $votecount=$votecount+1;
    echo "n".$votecount;
    $temp="LikE";
}
if($temp=="dlike")
{
      $votecount=$votecount-1;
      $temp="DisLiKE";
    
}

$con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");
$sql23="UPDATE answers SET votes=".$votecount." where qid=".$qid." and aid=".$aid."";

mysqli_query($con,$sql23) or die("ERROR");
session_start();
$un=$_SESSION['username'];

$se="insert into userrate values ('$un',1,'$aid','$qid','$temp')";
mysqli_query($con,$se) or die("ERROR IN");

@require 'allquestions.php';
?>



