<?php
$servername="pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
 $dBUsername="tz4j9cvvvx19w3zk";
 $dBPassword="kwpkk6ybhd4t3mh2";
 $dBName="f7pf1g63rq9j6hth";
$conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
$authtoken = $_GET['auth'];
$query='SELECT * FROM oders WHERE idOrderToken="'.$authtoken.'" ';
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result)){
 $token[]=$row['idOrders'];
}
$ordertoken=Max($token);
$query2='SELECT * FROM deliverytoken WHERE idOrderID="'.$authtoken.'" ';
$result2=mysqli_query($conn,$query2);
while($row2=mysqli_fetch_array($result2)){
 $token2[]=$row2['idOrder'];
}
$ordertoken2=Max($token2);

$sql='DELETE FROM oders WHERE idOrderToken="'.$authtoken.'" AND idOrders="'.$ordertoken.'"';
mysqli_query($conn, $sql);
$sql3='DELETE FROM deliverytoken WHERE idOrderID="'.$authtoken.'" AND idOrder="'.$ordertoken2.'"';
mysqli_query($conn, $sql3);
$sql4='DELETE FROM orderlog WHERE idOrderNumber="'.$ordertoken2.'"' ;
mysqli_query($conn, $sql4);    
?>
<html>
<form action="F1.php" method="get" id="form">
<input type="hidden" name="auth" value="" id="auth">
</form>
<script>
function auth(){
let auth = localStorage.getItem('token');
document.getElementById("auth").value = auth ;
}
function submit(){
document.getElementById("form").submit();
}
auth();
submit();
</script>
</html>
