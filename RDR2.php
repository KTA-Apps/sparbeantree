<?php
$servername="pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
 $dBUsername="tz4j9cvvvx19w3zk";
 $dBPassword="kwpkk6ybhd4t3mh2";
 $dBName="f7pf1g63rq9j6hth";
$email=$_GET['email'];
$conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
$sql='SELECT * FROM pwdrest WHERE pwdResetEmail=?';
   $stmt=mysqli_stmt_init($conn);
 if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Signin.php?error=SQL1");
       exit();
}
   mysqli_stmt_bind_param($stmt,"s",$email);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_store_result($stmt);
   $count=mysqli_stmt_num_rows($stmt);
 if (!$count>0){
    header("Location:X1.php?error=expired");
    exit();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="iofrm-theme17.css">
</head>
<body>
    <div class="form-body without-side">
        
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
                        <h3>Register driver account</h3>
     
                        <form action="RDR3.php" method="post">
                            <input id="uid" class="form-control" type="text" name="uid" placeholder="Username" required>
                            <p id="usernamenotavail" style="font-size:14px; color:red; display:none;">*Username not available</p>
                            <input id="email" class="form-control" type="email" name="email" placeholder="E-mail Address" required>
                            <p id="invalidemail" style="font-size:14px; color:red; display:none;">*Invalid email </p>
                            <p id="emailexists" style="font-size:14px; color:red; display:none;">*Email already exists</p>
                            <input class="form-control" type="password" name="pwd" placeholder="Create Password" required>
                            <p id="invalidpassword" style="font-size:14px; color:red; display:none;">*Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character</p>
                            <p id="passwordmatch" style="font-size:14px; color:red; display:none;">*Passwords don't match</p>
                            <input class="form-control" type="password" name="pwdrepeat" placeholder="Repeat Password" required>
                            <input type="hidden" name="Location" value="<?php echo $_GET['location']; ?>">
                            <div class="form-button">
                                <button type="submit" class="ibtn" >Sign-up</button>
                            </div>
                        </form>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script 
src="ShowHandlers.js" >
</script>
</html>
