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
width="273" 
height="348" 
src="https://res.cloudinary.com/badboylu/image/upload/c_scale,h_348,w_273/v1596008969/b8d0de7cacaf88b8b43d5413142c274d_asslru.jpg"  
alt="" 
srcset=
"https://res.cloudinary.com/badboylu/image/upload/v1596008969/b8d0de7cacaf88b8b43d5413142c274d_asslru.jpg 870w, 
https://res.cloudinary.com/badboylu/image/upload/c_scale,h_300,w_235/v1596008969/b8d0de7cacaf88b8b43d5413142c274d_asslru.jpg 235w, 
https://res.cloudinary.com/badboylu/image/upload/c_scale,h_980,w_768/v1596008969/b8d0de7cacaf88b8b43d5413142c274d_asslru.jpg 768w, 
https://res.cloudinary.com/badboylu/image/upload/c_scale,h_1024,w_803/v1596008969/b8d0de7cacaf88b8b43d5413142c274d_asslru.jpg 803w, 
https://res.cloudinary.com/badboylu/image/upload/c_scale,h_340,w_266/v1596008969/b8d0de7cacaf88b8b43d5413142c274d_asslru.jpg 266w, 
https://res.cloudinary.com/badboylu/image/upload/c_scale,h_280,w_219/v1596008969/b8d0de7cacaf88b8b43d5413142c274d_asslru.jpg 219w, 
https://res.cloudinary.com/badboylu/image/upload/c_scale,h_336,w_263/v1596008969/b8d0de7cacaf88b8b43d5413142c274d_asslru.jpg 263w, 
https://res.cloudinary.com/badboylu/image/upload/c_scale,h_671,w_526/v1596008969/b8d0de7cacaf88b8b43d5413142c274d_asslru.jpg 526w" 
sizes="(max-width: 273px) 100vw, 273px" /> 
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
