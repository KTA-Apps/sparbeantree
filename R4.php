<?php
$servername="pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
 $dBUsername="tz4j9cvvvx19w3zk";
 $dBPassword="kwpkk6ybhd4t3mh2";
 $dBName="f7pf1g63rq9j6hth";
$conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
$username=$_GET['username'];
$email=$_GET['email'];
$password=$_GET['auth'];

  $sql="SELECT * FROM pwdrest WHERE pwdResetEmail=?";
  $stmt=mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Reset.php?error=SQL1");
       exit();
 }
   mysqli_stmt_bind_param($stmt,"s",$email);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_store_result($stmt);
   $count=mysqli_stmt_num_rows($stmt);
   mysqli_stmt_close($stmt);
 if (!$count){
    $count='0';
 }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account registration</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="iofrm-theme17.css">
</head>
<body>
    <div class="form-body without-side">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="images/logo-light.svg" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="images/graphic3.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3><span style="color:green"> Account activation link sent!</span></h3>
                        
                        <p>Check your email for the link to activate your account</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://smtpjs.com/v3/smtp.js">
</script>
<script>
function sendemail(){
let count="<?php echo $count; ?>";
if(count=="0"){
Email.send({
    Host : "mail.canibuy.site",
    Username : "no-reply@canibuy.site",
    Password : "God@loves",
    To : '<?php echo $email; ?>',
    From : "no-reply@canibuy.site",
    Subject : "Demo account activation",
    Body : '<p><div style="height:30px; width:100%; background:green;"></div><span><h2>Demo</h2></span><div style="height:15px; width:100%; background:black;"></div></p><br><p>Hello <?php echo $username; ?>,</p><p><span style="color:orange">Lunga</span> welcomes you to the <span style="color:green">Demo site</span>. Please click on the link below to activate your account.</p><p><a href="https://lungademo.herokuapp.com/S1.php?signup=complete&username=<?php echo $username; ?>&email=<?php echo $email; ?>&auth=<?php echo $password; ?>"> <button>Account activation link</button> </a></p><p>If you did not make this request or need assistance, please send an email to liyandza.magagula@gmail.com.</p><p>Thank you</p><br><br><p><div style="height:48px; width:100%; background:black;"><p><div><span style="color:white; padding-left:5px; padding-top:15px; margine-bottom:5px;"><small>© 2021 Kahrent Technology Africa All rights reserved.</small></span></div></p></div></p>'              
  });
 }
}
sendemail();
</script> 
<script>
 function set(){
  localStorage.removeItem("R");
}
set();
</script>
</html>
<?php
if(!$count>0){
$sql="INSERT INTO pwdrest (pwdResetEmail) VALUES (?);";
    $stmt= mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
       header("Location:Reset.php?error=SQL1");
       exit();
 }
 mysqli_stmt_bind_param($stmt,"s",$email);
 mysqli_stmt_execute($stmt);
 }
?>
