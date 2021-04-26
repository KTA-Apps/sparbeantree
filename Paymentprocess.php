<?php
 $servername="pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
 $dBUsername="tz4j9cvvvx19w3zk";
 $dBPassword="kwpkk6ybhd4t3mh2";
 $dBName="f7pf1g63rq9j6hth";
$conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
$preppertoken= bin2hex(random_bytes(3));
$custitoken= bin2hex(random_bytes(3));
$date = date("Y-m-d");
$time = date("H:i:s");
date_default_timezone_set('Africa/Johannesburg');
$authtoken = $_GET['auth'];
$username = $_GET['username'];
$confirmedpayment1 = 'Placed';
$confirmedpayment = 'Pending';

$sql="INSERT INTO oders (idOrderUsername,idOrderDPgrams,idOrderCCbatches,idOrderOCgrams,idOrderBWgrams, idOrderPRjays, idOrderNLgrams, idOrderCCESbatches, idOrderPEgrams, idOrderConfirmation, idOrderToken, idOrderTime, idOrderDate,idOrderTotal,idOrderCustiCode,idOrderCode) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Signin.php?error=sqlerror111");
       exit();
}
     mysqli_stmt_bind_param($stmt,"siiiiiiiissssiss",$username,$dp,$cc,$oc,$bw,$pr,$nl,$cces,$pe,$confirmedpayment1,$authtoken,$time,$date,$total,$custitoken,$preppertoken);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);

$sql="INSERT INTO address (idUsername,idProvince,idCity,idTown,idSuburb,idCrib,idBuilding,idEstate,idComplex,idMall,idShop,idStreet,idUnitNumber,idHouseNumber,idContactNumber,idTime,idDate,idToken,idOrderConfirmation,idOrderCustiCode) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Signin.php?error=sqlerror222");
       exit();
}
     mysqli_stmt_bind_param($stmt,"ssssssssssssssssssss",$username,$province,$city,$town,$suburb,$structure,$building,$estate,$complex,$mall,$shop,$street,$unitnumber,$housenumber,$contactnumber,$time,$date,$authtoken,$confirmedpayment1,$custitoken);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);

$sql3="INSERT INTO deliverytoken (idDate,idUsername,idCustomerToken,idPrepperToken,idOrderID) VALUES (?,?,?,?,?);";
$stmt= mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql3)){
    header("Location:Signin.php?error=sqlerror999");
    exit();
 }

    mysqli_stmt_bind_param($stmt,"sssss",$date,$confirmedpayment,$custitoken,$preppertoken,$authtoken);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

$query="select * from deliverytoken";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result)){
 $ordernumbers[]=$row['id'];
}
$order=Max($ordernumbers);

$sql4="INSERT INTO orderlog (idDate,idAmount,idOrderStat,idCustiToken,idUsername,idOrderNumber,idPrepperToken) VALUES (?,?,?,?,?,?,?);";
$stmt= mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql4)){
    header("Location:Signin.php?error=sqlerror123");
    exit();
 }
    mysqli_stmt_bind_param($stmt,"sisssis",$date,$total,$confirmedpayment1,$custitoken,$username,$order,$authtoken);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


   function generateSignature($data, $passPhrase = null) {
    // Create parameter string
    $pfOutput = '';
    foreach( $data as $key => $val ) {
        if(!empty($val)) {
            $pfOutput .= $key .'='. urlencode( trim( $val ) ) .'&';
        }
    }
    // Remove last ampersand
    $getString = substr( $pfOutput, 0, -1 );
    if( $passPhrase !== null ) {
        $getString .= '&passphrase='. urlencode( trim( $passPhrase ) );
    }
    return md5( $getString );
}

$cartTotal = 10.00;
$data = array(
    'merchant_id' => '10000100',
    'merchant_key' => '46f0cd694581a',
    'return_url' => 'https://canibu.herokuapp.com/process2.php',
    'cancel_url' => 'https://canibu.herokuapp.com/process1.php',
    'amount'=> $total,
    'item_name' => 'Canibuy Health Store',
);
$signature = generateSignature($data);
$data['signature'] = $signature;


$htmlForm = '<form action="https://sandbox.payfast.co.za/eng/process" method="post" id="form">';
foreach($data as $name=> $value)
{
    $htmlForm .= '<input name="'.$name.'" type="hidden" value="'.$value.'" />';
}
$htmlForm .= '<input type="submit" name="Pay" value="Order" id="Blanks" class="Orderbtn" style="display:none"/></form>';
echo $htmlForm;
?>
<html>
<script>
function set(){
localStorage.setItem('eTotal', "<?php echo $total; ?>");
localStorage.setItem('eCity', "<?php echo $city; ?>");
localStorage.setItem('eTown', "<?php echo $town; ?>");
localStorage.setItem('eSuburb', "<?php echo $suburb; ?>");
localStorage.setItem('eStreet', "<?php echo $street; ?>");
localStorage.setItem('eMall', "<?php echo $mall; ?>");
localStorage.setItem('eBuilding', "<?php echo $building; ?>");
localStorage.setItem('eShop', "<?php echo $shop; ?>");
localStorage.setItem('eComplex', "<?php echo $complex; ?>");
localStorage.setItem('eCompany', "<?php echo $company; ?>");
localStorage.setItem('eHouseNumber', "<?php echo $housenumber; ?>");
localStorage.setItem('eUnitNumber', "<?php echo $unitnumber; ?>");
localStorage.setItem('eEstate', "<?php echo $estate; ?>");
localStorage.setItem('eDP', "<?php echo $dp; ?>");
localStorage.setItem('eCC', "<?php echo $cc; ?>");
localStorage.setItem('eOC', "<?php echo $oc; ?>");
localStorage.setItem('eBW', "<?php echo $bw; ?>");
localStorage.setItem('eNL', "<?php echo $nl; ?>");
localStorage.setItem('ePR', "<?php echo $pr; ?>");
localStorage.setItem('eCCES', "<?php echo $cces; ?>");
localStorage.setItem('ePE', "<?php echo $pe; ?>");
localStorage.setItem('eContact', "<?php echo $contactnumber; ?>");
localStorage.setItem('eDate', "<?php echo $date; ?>");
localStorage.setItem('username', "<?php echo $username; ?>");
localStorage.setItem('token', "<?php echo $authtoken; ?>");
}
set();
</script>
</html>
<?php
echo'
<script>
function submit(){
document.getElementById("form").submit();
}
submit();
</script>';
?>
