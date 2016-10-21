<?php session_start(); ?>

<?php

$to = $_POST["to"];
$matter = $_POST["matter"];
$subject = $_POST["subject"];
$sender = $_POST["sender"];

$myformat = '<html>
<head>
<meta charset="utf-8">
<title>'.$subject.'</title>
</head> 
<body bgcolor="#FFFFFF" text="#000000" link="#FFFFFF"> 

<div data-role="page" id="page">
  <div data-role="header">
		<h5 align="center"><img src="data:image/jpeg;base64,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" alt="" name="BVBLogo" width="180" height="169" align="top"></h5>
		<h1 align="center"><strong><em>K.L. E. Society&rsquo;s		</em></strong></h1>
    <h1 align="center"><strong>B.V. Bhoomaraddi   College of Engineering &amp; Technology, Hubli -31		</em></strong></h1>
    <h3 align="center"><u>Department Of INFORMATION &amp; SCIENCE </u></h3>';

	
	$mydate='<h3 align="right"><u>Date</u>:-'.date("d-m-Y").' 	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3>';
		
	$mysubject='<h3 align="center"><u>Subject</u>:-'.$subject.'</h3>';

	
	$mymatter = '<blockquote> <p>&nbsp;</p> 
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
	.$matter.'</blockquote>';

	$mytext = $myformat.$mydate.$mysubject.$mymatter.'</body></html>'; 
	
	

$message = $mytext;
$from = $sender;

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= "From:" . $from;

if(mail($to,$subject,$message,$headers))
{
        if(isset($_SESSION['resend']))
        {
           echo "The unique ID is sent again <br> Check your mail to complete the registration<br>";
        }
        else
        {    
           echo $_SESSION['resend'];
           echo "Check your mail to complete the registration<br>";
            echo "<a href='login.html'>Back to Login Page</a>";
        }	
}
else
{
           echo "Could not send the unique id. Invalid Email<br>";
         echo "<a href='register.html'>Back to Registration Page</a>";
}
	
 
?>			