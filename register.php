<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        body{ font: 14px sans-serif;
            background-image: url("loginbg.jpg");}
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
            <div id=btn>Sign Up</div></div>
            
        <h3>Please fill this form to create an account.</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="input-field" value="<?php echo $username; ?>">
                <span class="help-block" style="width: 300px; left: 0px;"><?php echo $username_err; ?></span>
            </div>    
            <div class="input-group-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="input-field" value="<?php echo $password; ?>">

                <span class="help-block" style="width: 300px; left: 0px; top: 424px;"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="input-field" value="<?php echo $confirm_password; ?>">
                <span class="help-block" style="width: 300px; left: 0px; margin-top: 10px;top:430px;"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="submit-btn" value="Submit"><a href="login.php"/>
                <input type="reset" class="submit-btn" style="margin-left: 0px;" value="Reset">
            </div>
            <h3>Already have an account? <a href="login.php">Login here</a>.</h3>
        </form>
    </div>   
    </div> 
</body>
</html>