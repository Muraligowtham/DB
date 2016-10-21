

<?php session_start();

$to = $_SESSION["memail"];
$password = $_SESSION["mpass"];
$matter = "Dear ".$_SESSION["mname"]." your unique".$password." id for confirmation of the mail is ".$_SESSION["muid"]."<br> http://localhost/codehunt/confirmurl.php?user=".$_SESSION["mname"]."&pass=".$_SESSION['mpass']."&uid=".$_SESSION['muid']." Or click here to verify your email id "; 
$subject = "Confirm Your Registration";
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
 curl_setopt($ch,CURLOPT_URL,'http://codehunt.comxa.com/print2curlwt.php');
 curl_setopt ($ch, CURLOPT_POST, 1);
 curl_setopt ($ch, CURLOPT_POSTFIELDS, $str);

 curl_exec($ch);
 curl_close($ch);

 unset($_SESSION['mname']);
 unset($_SESSION['memail']);
 unset($_SESSION['muid']);
 unset($_SESSION['mpass']);
	
?>