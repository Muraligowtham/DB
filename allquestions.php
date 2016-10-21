<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Post query</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
         <link rel="stylesheet" href="style.css">
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
        h1{
            color:white;
        }
</style>
    </head>
    <body>
         <form action="myown.php" method="get">
             <center> <h1>QueStion TrOLLy</h1> </center>
        
        <div class="container">
    <section class="register">
         <a href="mainpage1.php">HOME</a>
         <br/><br/>
       
            <?php
         
            
            $t=time();
            $con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");
$sql="select * from questions order by qid desc";
$res=mysqli_query($con,$sql);
$er=  mysqli_num_rows($res);
if($er!=0){
     echo "  <table border='0' cellspacing='10' cellpadding='10'>
		
			<col width='55'>
			<col width='400'>
			<col width='55'>
			<col width='55'>
            
            <th>Date</th>
            <th>Question</th>
             <th>Tag</th>
            <th>Author</th>";
while($row=mysqli_fetch_array($res))
{


echo "<tr>";

echo"<td>".$row['datee']."</td><td><center><a href='myown.php?va=".$row['qid']."'>".$row['question']."</a></center></td><td>".$row['tag']."</td><td>".$row['username']."</td>";
echo "</tr>";
}

}
else
{
    echo "No Questions Posted Till now <br/><br/> <a href='postquery.html'>Click Here </a> To Post a Query";
}
            ?>
            
           
        </table>
           
           
    </section>
           </div>
       
        </form>
    </body>
</html>
