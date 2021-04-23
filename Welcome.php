<?php
$token= bin2hex(random_bytes(16));
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                    <img src="outside-area-1024x768.jpg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <p><h3>Welcome</h3></p> 
<p> 
<img  
src="https://res.cloudinary.com/ddjrcafre/image/upload/v1619180869/download_qiezgo.jpg"  
alt="" /> 
</p>             
                        <p style="color:green;" >Order online now!</p>
                        <p style="color:grey;" ><small>Get your order delivered within 60 minutes!</small></p>
                        <p><small>Which store is closest to you?</small></p>
                        <p>
                        <select class="PTAtown" name="Towns" id="townsPTA" form="plug" required>
                        <option value="" disabled selected>select store</option>
                        <option value="Ferndale">Bean Tree Cafe - Ferndale</option>
                        <option value="Null" style="display:none" >Null</option>
                        </select>
                        </p>
                        <div class="page-links">
                            <p><a href="Items.php?auth=<?php echo $token; ?>"><span style="color:green"><small>Enter</small><span></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
