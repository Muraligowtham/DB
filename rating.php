<html>
    <head>
        <title>Answer</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
         <link rel="stylesheet" href="style.css">
          <link rel="stylesheet" href="styleactiv2.css">
           <link rel="stylesheet" href="styleactiv.css">
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
    .p2{
        color:purple;
        font:20;
    }
    .vb
    {
        color:palevioletred;
        
    }
    b{
        color:purple;
    }
    h1{
        color:white;
    }
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script> 
    alert("hell");
$(document).ready(function() {
    alert("hi1");
        $(".approve").click(function(){

    alert("hi");
   //Get the ID of the button that was clicked on
   var id_of_item_to_approve = $(this).attr("id");


   $.ajax({
      url: "votehandler.php", //This is the page where you will handle your SQL insert
      type: "POST",
      data: "id=" + id_of_item_to_approve, //The data your sending to some-page.php
      success: function(){
          console.log("AJAX request was successfull");
      },)
      error:function(){
          console.log("AJAX request was a failure");
      }   
    });

});

});
</script>
    </head>
    <body>
        <form action="rating2.php" method="get">
        <?php
        session_start();
        $we=$_SESSION['username'];
        echo "<center><h1>Hello $we </h1></center>";
        ?>
       <div class="container">
    <section class="register">
          <center><h2> Question was.....</h2></center>
         <a href="mainpage1.php">HOME</a>
         <br><br>
        <table border="0" cellspacing="10" cellpadding="10">
            <col width='330'>
            <th>Question</th>
            <th>Author</th>
             <th>Date</th>
            
        <?php
       
        $qid=$_GET["va"];
        
        $_SESSION['qid']=$qid;
        
        $con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");
$sql="select question,datee,timee,username from questions where qid =$qid";
$res=  mysqli_query($con,$sql);

while($row=mysqli_fetch_array($res))
{


echo "<tr>";
echo"<td>".$row['question']."</td><td>".$row['username']."</td><td>".$row['datee']."</td><td>";

echo "</tr>";
}
        ?>
        
         </table>
         
    </section>
       </div>
          <div class="container">
    <section class="register">
        <center><h2>Answers is.....</h2></center>
        
         <br><br>
        
        <?php
        $i=0;
        $j=100;
    $qid=$_GET["va"];
    $aid=$_GET["ld"];
   
    $_SESSION['anid']=$aid;
    $_SESSION['qidd']=$qid;
       
        $con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");
$sql1="select * from answers where qid =$qid and aid=$aid";
//$ress1=  mysqli_query($con,$sql1);
$res1=mysqli_query($con,$sql1);
$no=  mysqli_num_rows($res1);
if($no!=0){
    echo "<table border='0' cellspacing='10' cellpadding='10'>";
            
            echo "<col width='320'>
			<th>Answer</th>
            <th>Author</th>
             <th>Date</th>
           ";
while($row1=mysqli_fetch_array($res1))
{

$i++;
//$j++;
echo "<tr>";
echo"<td>".$row1['answer']."</td><td>".$row1['author']."</td><td>".$row1['datee']."</td>";
echo "</tr>";

$temp1a=$row1["aid"];
$temp2q=$row1["qid"];
}
       echo  "</table>";
       

}
else if($no==0)
{
    echo "Be the First to answer";
}

        ?>
         
        
       </section>
       </div>
            <?php
             $tempt="like";
            $temptt="dlike";
           $qid=$_SESSION['qidd'];
           $aid=$_SESSION['aidd'];
    $un=$_SESSION['username'];
       $con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");
$sql1="select * from userrate where qid =$qid and aid=$aid and username='$un' and flag=1";
//$sql12="select * from answers where qid =$qid and aid=$aid and author='$un";
//$res1=  mysqli_query($con,$sql1);
$res1=mysqli_query($con,$sql1) or die("lop");
//$res12=mysqli_query($con,$sql12) or die("lop");
$no=  mysqli_num_rows($res1);
//$no2=  mysqli_num_rows($res12);
$row12=  mysqli_fetch_array($res1);
if($no==0 ){
       
             echo    "<div class='con'>
            <section class='reg1'>
                <h2> Rating </h2>
                <br/><br/>
          <table cellspacing='10' cellpadding='10' border='0'> ";
            echo   "<tr>";
            echo   "<td><a href='rating2.php?aid=".$aid."&qid=".$qid."&tempt=".$tempt."'><img src='like.png' alt='Error'/></a></td>";
            echo   "<td><a href='rating2.php?aid=".$aid."&qid=".$qid."&tempt=".$temptt."'><img src='dlike.png' alt='Error'/></a></td>";
            echo   "<td> <p class='p2'>IS Your HuNt for Code accomplished with this Capture?? </p></td>
                      
              </tr>
           
          </table>
                
            </div>
</section>";
}
else
{
          echo    "<div class='con'>
            <section class='reg1'>
                <h2> Hi $un </h2>
                <br/><br/>
          <table cellspacing='10' cellpadding='10' border='0'> ";
            echo   "<tr>";

            echo   "<td> <p class='vb'>Your <b>HuNt</b> for this Question was Accomplished with a <b>".$row12['opinion']."</b></p></td>
                      
              </tr>
           
          </table>
                
            </div>
</section>";

}

             ?>

                </form>

    </body>
</html>