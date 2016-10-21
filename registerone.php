<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Registration Form</title>
  <link rel="stylesheet" href="style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <script type="text/javascript">
    function normalcheck() 
    {

    var fn = document.getElementById("fn").value;
    var fn1 = document.getElementById("fn1").value;
    var fn2 = document.getElementById("fn2").value;
    var fn3 = document.getElementById("fn3").value;
    var temp1=document.getElementById("remember_me").checked;
            
    if (fn == null || fn == "" || fn1 == null || fn1 == "" || fn2 == null || fn2 == ""|| fn3 == null || fn3 == "") 
    {
        document.getElementById("error_fn5").innerHTML = "Please Fill All Fields!!";
        document.getElementById("error_fn5").style.color = "red";
    }
    else
    {
        <?php session_start();
        
        $_SESSION['fn']=fn;
        $_SESSION['fn1']=fn1;
        $_SESSION['fn2']=fn2;
        $_SESSION['fn3']=fn3;

        
        if($temp2)
            ;
        ?>
        if(!(document.getElementById("remember_me").checked))
        {
            document.getElementById("error_fn5").innerHTML = "Please check our privacy policies";
            document.getElementById("error_fn5").style.color = "red";
        }
        
        ?>
    }
    
    
    }
function validatebox() {

    var fn = document.getElementById("fn").value;
    if (fn == null || fn == "") {
        document.getElementById("error_fn").innerHTML = "Name cannot be empty!";
        document.getElementById("error_fn").style.color = "red";
    }
    else {
        var xx1=document.getElementById("fn").value;
        document.getElementById("error_fn").innerHTML = "Hello "+xx1+" !!";
        document.getElementById("error_fn").style.color = "green";
    }
}

function validatebox1() {

    var fn1 = document.getElementById("fn1").value;
    if (fn1 == null || fn1 == "") {
        document.getElementById("error_fn1").innerHTML = "Wrong Email-ID";
        document.getElementById("error_fn1").style.color = "red";
    }
    else {
        document.getElementById("error_fn1").innerHTML = "Looks Good!";
        document.getElementById("error_fn1").style.color = "green";
    }
}

function validatebox2() {
    var fn2 = document.getElementById("fn2").value;
    var fn3 = document.getElementById("fn3").value;
    if(fn2!=fn3)
    {
        document.getElementById("error_fn2").innerHTML ="Passwords Do not Match!";
        document.getElementById("error_fn2").style.color = "red";
        document.getElementById("fn2").value ="";
        document.getElementById("fn3").value ="";
    }
    else
    {
        document.getElementById("error_fn2").innerHTML ="Passwords Match!";
        document.getElementById("error_fn2").style.color = "green";
    }
}
</script>
</head>

<body>
    <form action="register.php" method="get">
  <div class="container">
    <section class="register">
      <h1>Register on </h1>
    
      <div class="reg_section personal_info">
      <h3>Your Personal Information</h3>
      <input type="text" name="user" id="fn" placeholder="Your Desired Username" onblur="validatebox()"/> 
              <label id="error_fn"></label>
      <input type="text" name="email" id="fn1" placeholder="Your E-mail Address" onblur="validatebox1()"/> 
              <label id="error_fn1"></label>
      </div>
      <div class="reg_section password">
      <h3>Your Password</h3>
      <input type="password" name="pass" id="fn2" value="" placeholder="Your Password">
      <input type="password" name="confirm" id="fn3" value="" placeholder="Confirm Password" onblur="validatebox2()">
      <label id="error_fn2"></label>
      </div>
          
      <div class="reg_section password">
          <p> <div> <label id="error_fn5"></label> </div></p>
      </div>
      <p class="terms">
        <label>
          <input type="checkbox" name="remember_me" id="remember_me">
           I agree to the <a href="privacy.html">privacy policy</a>  and <a href="terms.html">terms of service</a>.
        </label>
      </p>
      <p class="submit"><input type="submit" name="commit" value="Sign Up" ></p>
      
      </form>
    </section>
  </div>
</body>
</html>