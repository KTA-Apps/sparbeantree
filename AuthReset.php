<?php
 $servername="pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
 $dBUsername="tz4j9cvvvx19w3zk";
 $dBPassword="kwpkk6ybhd4t3mh2";
 $dBName="f7pf1g63rq9j6hth";
$conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
$sql="DELETE FROM userauth2";
mysqli_query($conn, $sql);
    header("Location:adminAuth.php");
    exit();
