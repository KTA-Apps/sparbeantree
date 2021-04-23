<?php
$auth=bin2hex(random_bytes(16));
$email='liyandza.magagula@gmail.com';
$username='Lunga';
?>
<html>
<script src="https://smtpjs.com/v3/smtp.js">
</script>
<script>
function sendemail(){
Email.send({
    Host : "mail.canibuy.site",
    Username : "test@canibuy.site",
    Password : "God@loves",
    To : 'liyandza.magagula@gmail.com',
    From : "test@canibuy.site",
    Subject : "Canibuy transaction details",
    Body : '<p><div style="height:30px; width:100%; background:green;"></div><span><h2>Demo</h2></span><div style="height:15px; width:100%; background:black;"></div></p><br><p>Good day,</p><p>you have been offered an opportunity to join the <span style="color:orange">*Company name*</span> team as a <span style="color:green">preparation agent</span>.<p>Please click on the link below to activate your account.</p><p><a href="https://lungademo.herokuapp.com/RP2.php?location=<?php echo $_GET['Location'];?>&email=<?php echo $_GET['email'];?>"> <button>Account activation link</button> </a></p><p>Thank you</p><br><br><p><div style="height:48px; width:100%; background:black;"><p><div><span style="color:white; padding-left:5px; padding-top:15px; margine-bottom:5px;"><small>© 2021 Kahrent Technology Africa All rights reserved.</small></span></div></p></div></p>'              
  }).then(
  message => alert(message)
);
 }
sendemail(); 
</script> 
</html>
