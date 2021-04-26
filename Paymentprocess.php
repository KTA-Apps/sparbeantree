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
$query='SELECT * FROM users WHERE uidUsers="'.$username.'" ';
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $mail[]=$row['emailUser'];
}

$email=Min($mail);
$dp = $_GET['DPgrams'];
$oc = $_GET['OCgrams'];
$bw = $_GET['BWgrams'];
$pr = $_GET['PRgrams'];
$nl = $_GET['NLgrams'];
$cces = $_GET['CCESgrams'];
$cc = $_GET['CCgrams'];
$pe = $_GET['PEgrams'];

$province = $_GET['Province'];
$city = $_GET['City'];
$town = $_GET['Towns'];
$suburb = $_GET['suburbs'];
$street = $_GET['Street'];
$structure = $_GET['Crib'];
$mall = $_GET['Mall'];
$building = $_GET['Building'];
$estate = $_GET['Estate'];
$complex = $_GET['Complex'];
$company = $_GET['Company'];
$shop = $_GET['Shop'];
$housenumber = $_GET['House-number'];
$unitnumber = $_GET['Unit-number'];
$contactnumber = $_GET['Contact-number'];
$total = $_GET['totalamount'];

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
    'merchant_id' => '16487327',
    'merchant_key' => 'grrpth5dyco9u',
    'return_url' => 'https://canibuy.co.za/process2.php',
    'cancel_url' => 'https://canibuy.co.za/process1.php',
    'email_address'=> $email,
    'amount'=> $total,
    'item_name' => 'Canibuy Health Store',
);
$signature = generateSignature($data);
$data['signature'] = $signature;


$htmlForm = '<form action="https://sandbox.payfast.co.za​/eng/process" method="post" id="form">';
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
