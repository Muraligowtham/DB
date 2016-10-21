<html>
    <head>
        <title>Question</title>
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
</style>
<style>
    div{
        color: purple;
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
        <form action="ratingh.php" method="get">
       <div class="container">
    <section class="register">
          <center><h2>Selected Question.....</h2></center>
         <a href="mainpage1.php">HOME</a>
         <br><br>
      
        <?php
       
        $qid=$_GET["va"];
        session_start();
        $_SESSION['qid']=$qid;
        
        $con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");
$sql="select question,datee,timee,username from questions where qid =$qid";
$res=  mysqli_query($con,$sql);
echo "<table border='0' cellspacing='10' cellpadding='10'>
		<col width='420'>
			
		
			
         
            <th>Question</th>
             <th>Author</th>
            <th>Date</th> ";
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
        <center><h2>Answers So Far.....</h2></center>
        
         <br><br>
        
        <?php
        $i=0;
        $j=100;
    $qid=$_GET["va"];
       
        $con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");
$sql1="select * from answers where qid =$qid order by votes desc";
//$ress1=  mysqli_query($con,$sql1);
$res1=mysqli_query($con,$sql1);
$no=  mysqli_num_rows($res1);
if($no!=0){
    echo "<table border='0' cellspacing='10' cellpadding='10'>";
            
            echo "<col width='320'>
			<th>Answer</th>
            <th>Author</th>
             <th>Date</th>
              <th>Votes</th>
           ";
while($row1=mysqli_fetch_array($res1))
{

$i++;
//$j++;
echo "<tr>";
echo"<td><a href='ratingh.php?ld=".$row1['aid']."&va=".$row1['qid']."&aut=".$row1['author']."'>".$row1['answer']."</a></td><td>".$row1['author']."</td><td>".$row1['datee']."</td><td>".$row1['votes']."</td>";
echo "</tr>";


}
       echo  "</table>";
       

}
else if($no==0)
{
    echo "Be the First to answer";
}
        ?>
          </form>
         
    
        
           <form action="insertanswer.php" method="get">
       
        <center><h2>Post your answer..</h2>
        <div class="head_wrapper">
            <textarea  name="answer" ></textarea>
        </div>
       
        <button name="postans" class="buttonscrolly">Post Answer</button>
        
       </center>
        
        
    
        </form>
        
       </section>
       </div>
      
    </body>
</html>