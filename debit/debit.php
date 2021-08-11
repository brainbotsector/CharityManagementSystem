<?php

include('include/db_connect.php');
$message = '';
$Success_message = '';
if(isset($_POST['Details']))
{
	$dcardno = trim($_POST["dcardno"]);
	$dexpmonth=	trim($_POST['dexpmonth']);
	$dexpyear =	trim($_POST['dexpyear']);
	$dcvv	  =	trim($_POST['dcvv']);
	$dname     =	trim($_POST['dname']);
	$damount     =	trim($_POST['damount']);



	$check_query = "
	SELECT * FROM tb2_data 
	WHERE dcardno = :dcardno
	";
	$statement = $connect->prepare($check_query);
	$check_data = array(
		':dcardno'		=>	$dcardno
	);
	if($statement->execute($check_data))
	{
		if($statement->rowCount() > 0)
		{
			$message .= 'Card no Already Taken';
		}
		else
		{
			if(empty($dcardno))
			{
				$message .= 'Credit card no is required';
			}
			elseif(empty($dexpmonth))
			{
				$message .= ' Exp month is required';
			}
			elseif(empty($dexpyear))
			{
				$message .= ' Exp year is required';
			}
			elseif(empty($dcvv))
			{
				$message .= ' Cvv no is required';
			}
			elseif(empty($dname))
			{
				$message .= ' Name is required';
			}
			elseif(empty($damount))
			{
				$message .= ' Amount is required';
			}
			
			
			if($message == '')
			{
				$data = array(
					':dcardno'		=>	$dcardno,
					':dexpmonth'	=>	$dexpmonth,
					':dexpyear'		=>	$dexpyear,
					':dcvv'		=>	$dcvv,
					':dname'			=>	$dname,
					':damount'			=>	$damount,
			
				);

				$query = "
				INSERT INTO tb2_data
				(dcardno,dexpmonth,dexpyear,dcvv,dname,damount) 
				VALUES (:dcardno,:dexpmonth,:dexpyear,:dcvv,:dname,:damount)
				";

				$statement = $connect->prepare($query);

				if($statement->execute($data))
				{
					$Success_message .= 'Payment successfull';
				}
			}
		}
	}
}

?>
<html>  
    <head>  
        <title>Debit Card</title>  
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body> 
    	<div class="login">
    		<div class="form-box"  style="height: 570px; margin-bottom: 30px; margin-top: 30px;">
    	
       
			<br />
			<div class="button-box" style="margin-top: 0px; margin-bottom: 34px; top: 0px;">
			<div id="btn">Debit Card</div>
			</div>
			
			<br />
			
  				
				<div class="panel-body">
					<form method="post">
					<?php
					if($message!=''){?>
					<script>
						swal({
								title: "Oops!",
								text: "<?php echo $message; ?>",
								icon: "warning",
								button: "Ok!",
							});
					</script>
					<?php
					}elseif($Success_message!=''){
					?>
						<script>
						swal({
								title: "Congratulations!",
								text: "<?php echo $Success_message; ?>",
								icon: "success",
								button: "Ok!",
							});
						</script>
					<?php
					}else{
					?>
						<script>
						swal({
								title: "Please Fill Up The Form!",
								text: "Fill Out The Form",
								icon: "info",
								button: "Continue !",
							});
						</script>
					<?php	
					}
					?>
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
.swal-title {
    color: #d40027;
    font-weight: 600;
    text-transform: none;
    position: relative;
    display: block;
    padding: 13px 16px;
    font-size: 27px;
    line-height: normal;
    text-align: center;
    margin-bottom: 0;
}
.swal-icon--info {
    border-color: #de0606;
}
.swal-button {
    background-color: #d81e05;
    color: #fff;
    border: none;
    box-shadow: none;
    border-radius: 5px;
    font-weight: 600;
    font-size: 14px;
    padding: 10px 24px;
    margin: 0;
    cursor: pointer;
}
.swal-text {
    font-size: 16px;
    position: relative;
    float: none;
    line-height: normal;
    vertical-align: top;
    text-align: left;
    display: inline-block;
    margin: 0;
    padding: 0 10px;
    font-weight: 400;
    color: rgb(212 0 39);
    max-width: calc(100% - 20px);
    overflow-wrap: break-word;
    box-sizing: border-box;
}
.panel {
    margin-bottom: 20px;
   
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.form-box{
    width: 550px;
    height: 710px;
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
    left: 50%;
    -ms-transform:
    translateX(-50%);
    transform: translateX(-50%);
    
    position: absolute;
        width: 220px;
    height: 50px;
    background: linear-gradient(to right, #ff105f,#ffad06);
    border-radius: 30px;
    text-align: center;
    font-size: 30px;
    font-family: sans-serif;
    top:15px;
}


.input-group{
    top: 180px;
    position: absolute;
    width: 280px;
    transition: .5s;
}
h2{
	margin-top: 50px;
	margin-bottom: 0px;"
    font-family: sans-serif;
    text-align: center;
    color: #ff105f;
}


.input-field{
    width: 100%;
    padding: 5px 0;
    margin: 2px 0;
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

						<div class="form-group">
							<label>Card number</label>
							<input type="text" name="dcardno" class="input-field" />
						</div>
						<div class="form-group">
							<label>Expiry month</label>
							<input type="text" name="dexpmonth" class="input-field" />
						</div>
						<div class="form-group">
							<label>Expiry year</label>
							<input type="text" name="dexpyear" class="input-field" />
						</div>
						
						<div class="form-group">
							<label>CVV</label>
							<input type="text" name="dcvv" class="input-field" />
						</div>

						<div class="form-group">
							<label>Cardholder name</label>
							<input type="text" name="dname" class="input-field" />
						</div>
						<div class="form-group">
							<label>Donate amount of your choice</label>
							<input type="text" name="damount" class="input-field" />
						</div>
						
						
						<div class="form-group">
							<button type="submit" id="myButton" name="Details" class="submit-btn" style="margin-left: 175px;">Pay<i class="fa fa-sign-in"></i></button>
							 <h3>GO BACK TO MAIN PAGE<a href="main.php">Click Here</a>.</h3>
							
						</div>
						
					</form>
				</div>
			
		
		</div>
		

    </body>  
</html>