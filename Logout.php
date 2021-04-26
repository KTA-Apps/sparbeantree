<?php
$servername="pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
 $dBUsername="tz4j9cvvvx19w3zk";
 $dBPassword="kwpkk6ybhd4t3mh2";
 $dBName="f7pf1g63rq9j6hth";
   $conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
   $token=$_GET['auth'];
   $sql='Delete FROM userauth2 WHERE token="'.$token.'"';
   $stmt=mysqli_stmt_init($conn);
 if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Signin.php?error=SQL2");
       exit();
}
   mysqli_stmt_execute($stmt);
   header("Location:Signin.php?logout=successful");
   exit();
?>
