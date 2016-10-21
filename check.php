 <?php
 $users=array();
$query = $_GET['query']; // holds the input data
$field= $_GET['field']; // holds the name of field
$re="/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
if($field == "user")
{
$con=mysqli_connect("localhost", "root","") or die("No connection");
mysqli_select_db($con,"test") or die ("DATABASE not availabel");
$sql1="select * from users where username like '$query'";
//$ress1=  mysqli_query($con,$sql1);
$res1=mysqli_query($con,$sql1);
$no=  mysqli_num_rows($res1);

            if($no>0) echo "<font color=red>Username already exists</font>";
            else echo "<font color=green>Hello ".$query."!!</font>";
}
else if($field == "email")
{
            if(preg_match($re, $query)==0)
            {
                echo "<font color=red>Enter The Correct Mail ID</font>";
            }
            else
            {
               $con=mysqli_connect("localhost", "root","") or die("No connection");
                mysqli_select_db($con,"test") or die ("DATABASE not availabel");
                $sql1="select * from users where email like '$query'";
                //$ress1=  mysqli_query($con,$sql1);
                $res1=mysqli_query($con,$sql1);
                $no=  mysqli_num_rows($res1);
                    if($no>0) echo "<font color=red>Email already registered</font>";
                    else echo "<font color=green>Looks Good !!</font>"; 
            }
}
?>
