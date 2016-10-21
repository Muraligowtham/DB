<?php session_start();

$con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");

$name=$_SESSION['username'];
$qid=$_SESSION['qid'];

$sql="select * from questions where qid =$qid";
$res=mysqli_query($con,$sql);

while($row=mysqli_fetch_array($res))
{
$name1 = $row['username'];
$que = $row['question'];
}

$sql="select * from users where username like '".$name1."'";
$res=mysqli_query($con,$sql);

while($row=mysqli_fetch_array($res))
{

$email = $row['email'];
}

if($name != $name1)
{
$to = $email;
$matter = "Dear ".$name." your question '".$que."' has been answered visit our website for more details";
$subject = "Your question has been Answered";
$sender = "bvbmail2015@gmail.com";
$name_val     = urlencode($to);
$password_val = urlencode($subject);
$message_val  = urlencode($matter);
$sender_val  = urlencode($sender);

//$name_val     =$to;
//$password_val = $subject;
//$message_val  = $matter;

$str= "to=".$name_val."&subject=".$password_val."&matter=".$message_val."&sender=".$sender_val;


 $ch=curl_init();
 curl_setopt($ch,CURLOPT_URL,'http://codehunt.comxa.com/print2curlwt2.php');
 curl_setopt ($ch, CURLOPT_POST, 1);
 curl_setopt ($ch, CURLOPT_POSTFIELDS, $str);

 curl_exec($ch);
 curl_close($ch);
}

@require 'mainpage1.php';
?>