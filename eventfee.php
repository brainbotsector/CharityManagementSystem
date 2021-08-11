<?php

include('configevent.php');
$message = '';
$Success_message = '';
if(isset($_POST['Details']))
{
 $cno = trim($_POST["cno"]);
   $cname     = trim($_POST['cname']);
  $cexpmonth=  trim($_POST['cexpmonth']);
  $cexpyear =  trim($_POST['cexpyear']);
  $ccvv    = trim($_POST['ccvv']);
  
 

  $check_query = "
  SELECT * FROM cdonate 
  WHERE cno = :cno
  ";
  $statement = $connect->prepare($check_query);
  $check_data = array(
    ':cno'   =>  $cno
  );
  if($statement->execute($check_data))
  {
    if($statement->rowCount() > 0)
    {
      $message .= 'Card Already Taken';
    }
    else
    {
      if(empty($cname))
      {
        $message .= 'Name is required';
      }
       elseif(empty($cno))
      {
        $message .= 'Card no is required';
      }
      elseif(empty($cexpmonth))
      {
        $message .= ' Exp month is required';
      }
      elseif(empty($cexpyear))
      {
        $message .= ' Exp year is required';
      }
      elseif(empty($ccvv))
      {
        $message .= ' Cvv no is required';
      }
     
     
      
      
      if($message == '')
      {
        $data = array(
          ':cname'     =>  $cname,
          ':cno'   =>  $cno,
          ':cexpmonth' =>  $cexpmonth,
          ':cexpyear'    =>  $cexpyear,
          ':ccvv'    =>  $ccvv,
          
          
      
        );

        $query = "
        INSERT INTO cdonate
        (cname,cno,cexpmonth,cexpyear,ccvv) 
        VALUES (:cname,:cno,:cexpmonth,:cexpyear,:ccvv)
        ";

        $statement = $connect->prepare($query);

        if($statement->execute($data))
        {
          $Success_message .= 'Registration  successfull';
        }
      }
    }
  }
}

?>
<html>  
    <head>  
        <title>Credit Card</title>  
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
        

.login {
    width: 100%;
    background-image: linear-gradient(rgb(208 60 60 / 40%), rgba(255,255,255,.1)), url(.jpg);
    background-position: center;
    background-size: cover;
    position: absolute;
    top: 0px;
    left: 0px;
  }
  h2 {
    font-family: sans-serif;
    text-align: center;
    color: #ffffff;
  }
  .col-25, .col-50, .col-75 {
    padding: 0 16px;
}
.col-50 {
    -ms-flex: 50%;
    flex: 50%;
}
.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin: 0 -16px;
    }
    .col-25, .col-50, .col-75 {
    padding: 0 16px;
}
.col-75 {
    -ms-flex: 75%;
    flex: 75%;
}
.container {
    background-color: #ffffff;
    padding: 5px 20px 15px 20px;
    border: 1px solid #e61515;
    border-radius: 3px;
    width: 692px;
    height: 622px;
    margin-left: 300px;
}
form {
    display: block;
    margin-top: 0em;
}
input[type=text] {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
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



</style>













<body>
<div class="login">
<h2>REGISTER TO PARTICIPATE IN CYCLOTHON EVENT</h2>
 

<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
      
        <div class="row">
          <div class="col-50">
            <h3 style="margin-top: 20px; color: #EC2B51">Address</h3>
            <label for="fname">Name</label>
            <input type="text" id="fname" name="firstname">
            <label for="email">Email</label>
            <input type="text" id="email" name="email">
            <label for="adr"> Address</label>
            <input type="text" id="adr" name="address">
            <label for="city"> City</label>
            <input type="text" id="city" name="city">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state">
              </div>
              <div class="col-50">
                <label for="zip">Pincode</label>
                <input type="text" id="zip" name="zip">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3 style="margin-top: 20px; color: #EC2B51">Payment</h3>
            
            <label for="fname">Name on Card</label>
            <input type="text" id="cname" name="cname">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="cno" name="cno">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="cexpmonth" name="cexpmonth">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="cexpyear" name="cexpyear" >
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="ccvv" name="ccvv" >
              </div>
            </div>
              <div class="col-50">
               
  <label for="quantity">Entry Fee</label>
  <input type="number" style="width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 3px;" id="quantity" name="quantity" min="500" max="500">
 </div>

            
          </div>
          
        </div>
       
       
                
        <button type="submit" name="Details" class="submit-btn" style="margin-left: 175px;">Pay<i class="fa fa-sign-in"></i></button>
            </div>
      </form>
    </div>
  </div>
  
</div>
</div>

</body>
</html>