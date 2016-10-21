<html>
    <head>
        <title>Activity Log</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
         <link rel="stylesheet" href="style.css">
          <link rel="stylesheet" href="styleactiv.css">
           <link rel="stylesheet" href="styleactiv2.css">
                      <style>
		* {
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
      -ms-box-sizing: border-box;
          box-sizing: border-box;
}
 
 
.pic {
  border: 5px solid #fff;  
  float: left;
  height: 300px;
  width: 300px;
  margin: 5px;
  overflow: hidden;
   
  -webkit-box-shadow: 10px 10px 10px #f778a1;
          box-shadow: 10px 10px 10px #f778a1;  
}
.pic1 {
  border: 5px solid #fff;  
  float: left;
  height: 300px;
  width: 300px;
  margin: 5px;
  overflow: hidden;  
}

.morph {
  -webkit-transition: all 1s ease;
     -moz-transition: all 1s ease;
       -o-transition: all 1s ease;
      -ms-transition: all 1s ease;
          transition: all 1s ease;
}
 
.morph:hover{
	border:70px solid #f778a1;
	border-radius:50%;
	}
        h2{
            color: purple;
        }
</style>
<style>
    div{
        color: purple;
    }
    h1{
        color:white;
    }
    b{
        color:palevioletred;
    }
    td{
        color:purple;
    }
    th{
        color:steelblue;
    }
</style>
    </head>
    <body>
        
        <?php
        session_start();
        $un= $_SESSION['username'];
        echo "<center><h1>".$un ."'s Hunt</h1></center>";
        ?>
       
        <div class="con">
            <section class="reg1">
        <center><h2>Member Details</h2></center>
       
         <br/><br/>
          <table cellspacing="20" cellpadding="10">
           
          
         <?php
       // $qid=$_GET["qid"];
        $con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");
$sql12="select * from users where username like '$un'";
//$ress1=  mysqli_query($con,$sql1);
$res12=mysqli_query($con,$sql12);
$sqlo="select count(*) as cr from answers where author like '$un'";
$s1=mysqli_query($con,$sqlo);
$we=  mysqli_fetch_array($s1);
$sqlo1="select count(*) as cr from questions where username like '$un'";
$s11=mysqli_query($con,$sqlo1);
$we1=  mysqli_fetch_array($s11);
$no2=  mysqli_num_rows($res12);
if($no2!=0){
while($row=mysqli_fetch_array($res12))
{


echo "<tr>";
echo"<td>"."<b>UserName    </b>"."</td><td>".$row['username']."</td>";
echo "</tr>";
echo "<tr>";
echo"<td>"."<b>Email ID </b>"."</td><td>".$row['email']."</td>";
echo "</tr>";
echo "<tr>";
echo"<td>"."<b>Number Of Questions Answered</b>"."</td><td>".$we['cr']."</td>";
echo "</tr>";
echo "<tr>";
echo"<td>"."<b>Number Of Questions Asked</b>"."</td><td>".$we1['cr']."</td>";
echo "</tr>";
}
     

}


        ?>
          </table>
            </section>
        </div>
        
       
        
        
        
    <center><h1></h1></center> <br>
    <div class="container">
    <section class="register">
          <center><h2>Questions Posted so far .....</h2></center>
         <a href="mainpage1.php">HOME</a>
         <br><br>
       
           
        <?php
       
        
        $con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");
$sql="select * from questions where username like '$un'";
$res=  mysqli_query($con,$sql);
$no=  mysqli_num_rows($res);
if($no!=0){
   echo"  <table border='0' cellspacing='20' cellpadding='20'>
            
            <th>Question</th>
            
             <th>Date</th> ";
//$no23=  mysqli_fetch_row($res);
while($row=mysqli_fetch_array($res))
{


echo "<tr>";
echo"<td><a href='myown.php?va=".$row['qid']."'>".$row['question']."</a></td>"."</td><td>".$row['datee']."</td>";
echo "</tr>";
}
}
 else 
    
 {
     echo "No Questions Posted Till Date <br/><br/>";
     echo "<a href='postquery.html'>Click Here</a>to Post Query";
 }

        ?>
        
         </table>
         
    </section>
       </div>
      <div class="container" >
    <section class="register">
        <center><h2>Answers Posted So Far.....</h2></center>
       
         <br/><br/>
        
          
         <?php
       // $qid=$_GET["qid"];
        $con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");
$sql1="select * from (answers join questions on answers.qid=questions.qid ) where author like '$un'";
//$ress1=  mysqli_query($con,$sql1);
$res1=mysqli_query($con,$sql1);
$no=  mysqli_num_rows($res1);
if($no!=0){
    echo "<table border='0' cellspacing='20' cellpadding='20'>";
            
            echo "<th>Question </th>
                <th>Answer Given</th>
            
             <th>Date</th>
            ";
while($row1=mysqli_fetch_array($res1))
{


echo "<tr>";
echo   "<td>".$row1['question']."</td><td><a href='rating3.php?ld=".$row1['aid']."&va=".$row1['qid']."'>".$row1['answer']."</td><td>".$row1['datee']."</td>";
}
       echo  "</table>";

}
else if($no==0)
{
    echo "No Answers posted till date";
}
        ?>
        
         </section>
       </div>
    
        </form>
        
       
    </body>
</html>