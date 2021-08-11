<?php
    require 'connection.php';
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Lifestyle Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <br><br><br>
            <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">

        
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        *{
    margin: 0;
    padding: 0;0
    font-family: sans-serif;
}
.login{
    height: 100%;
    width:100%;
    background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(loginbg.jpg);
background-position: center;
background-size: cover;
position: absolute;
}
.form-box{
    width: 380px;
    height: 480px;
    position: relative;;
    margin: 6% auto;
    background: white;
    padding: 5px;
    overflow: hidden;
    align-content: center;
}
.button-box{
    width: 220px;
    margin: 35px auto;
    position: relative;
    box-shadow: 0 0 30px 12px #ff61241f;
    border-radius: 30px;
}


#btn{
    top: 0;
    left: 0;
    position: absolute;
        width: 220px;
    height: 50px;
    background: linear-gradient(to right, #ff105f,#ffad06);
    border-radius: 30px;
    text-align: center;
    font-size: 30px;
    font-family: sans-serif;
}


.input-group{
    top: 180px;
    position: absolute;
    width: 280px;
    transition: .5s;
}
h3{
    font-family: sans-serif;
    text-align: center;
    color: #ff105f;
}
h5{
    font-family: sans-serif;
    text-align: center;
    color: #ff105f;
}


.input-field{
    width: 100%;
    padding: 10px 0;
    margin: 5px 0;
    border-left: 0;
    border-top: 0;
    border-right: 0;                            
    border-bottom: 1px solid #999;
    outline: none;
    background: transparent; 
}
.submit-btn{
    width: 30%;
    padding: 10px 30px;
    cursor: pointer;
    display: block;
    margin: 0 auto;
    background: linear-gradient(to right, #ff105f,#ffad06);
    border: 0;
    outline: none;
    border-radius: 30px;
     display: inline-block;
     margin-left: 100px;
}

span{
    float: left;
    color:#777;
    font-size: 12px;
    bottom: 68px;
    position: absolute;
}
    </style>
</head>
<body>
    <div class="login">
    <div class="form-box">
        <div class="button-box"><h2 style="font-family: sans-serif;">.</h2>
            <div id=btn>Login</div></div>
    <div class="wrapper">
        
        <h3 style="margin-bottom: 10px;">Login To Make A Purchase</h3>
        <form method="post" action="login_submit.php">
                                    <div class="form-group">
                                        <input type="email" class="input-field" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="input-field" name="password" placeholder="Password(min. 6 characters)" pattern=".{6,}">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Login" class="submit-btn">
                                    </div>
                                     <h5 style="margin-top: 30px;">Don't have an account? <a href="signup.php">Sign up now</a>.</h5>
                                </form>
    </div>    
    </body>
</html>
