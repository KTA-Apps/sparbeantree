<?php
   
$servername="pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
 $dBUsername="tz4j9cvvvx19w3zk";
 $dBPassword="kwpkk6ybhd4t3mh2";
 $dBName="f7pf1g63rq9j6hth";
   $conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
   $auth=bin2hex(random_bytes(8));
   $userEmail=$_GET["email"];
 
$sql="SELECT * FROM users WHERE emailUser=?";
  $stmt=mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Reset.php?error=SQL2");
       exit();
 }
   mysqli_stmt_bind_param($stmt,"s",$userEmail);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_store_result($stmt);
   $count=mysqli_stmt_num_rows($stmt);
   mysqli_stmt_close($stmt);
 if (!$count>0){
    header("Location:Reset.php?error=emailnotfound");
    exit();
 }  

$sql="SELECT * FROM pwdrest WHERE pwdResetEmail=?";
  $stmt=mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Reset.php?error=SQL3");
       exit();
 }
   mysqli_stmt_bind_param($stmt,"s",$email);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_store_result($stmt);
   $count=mysqli_stmt_num_rows($stmt);
   mysqli_stmt_close($stmt);
 if ($count>0){
    header("Location:Reset.php?error=linksent");
    exit();
 }

    header("Location:R1.php?link=sent"."&auth=".$auth."&email=".$userEmail);
    exit();
?>
<html>
<script>
 function set(){
  localStorage.setItem('F', "c");
}
set();
</script>
</html>
