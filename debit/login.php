<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: main.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: main.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
     margin-left: 60px;
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
        
        <h3 style="margin-bottom: 10px;">Please fill in your credentials to login.</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="input-field" value="<?php echo $username; ?>">
                <span class="help-block" style="width: 300px; left: 0px;"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="input-field">
                <span class="help-block" style="width: 300px; left: 0px; margin-top: 10px;top:430px;"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="submit-btn" value="Login" style="margin-left: 100px; margin-top: 30px;">
            </div>
            <h3 style="margin-top: 30px;">Don't have an account? <a href="register.php">Sign up now</a>.</h3>
        </form>
    </div>    
</body>
</html>