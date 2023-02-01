


<!DOCTYPE html>
<html lang="en">
<head>
	
	

	<style>
    body {
        color: #999;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
	}
	.form-control {
		box-shadow: none;
		border-color: #ddd;
	}
	.form-control:focus {
		border-color: #4aba70; 
	}
	.login-form {
        width: 350px;
		margin: 0 auto;
		padding: 30px 0;
	}
    .login-form form {
        color: #434343;
		border-radius: 1px;
    	margin-bottom: 15px;
        background: #fff;
		border: 1px solid #f3f3f3;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
	}
	.login-form h4 {
		text-align: center;
		font-size: 22px;
        margin-bottom: 20px;
	}
    .login-form .avatar {
        color: #fff;
		margin: 0 auto 30px;
        text-align: center;
		width: 100px;
		height: 100px;
		border-radius: 50%;
		z-index: 9;
		background: #4aba70;
		padding: 15px;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
    .login-form .avatar i {
        font-size: 62px;
    }
    .login-form .form-group {
        margin-bottom: 20px;
    }
	.login-form .form-control, .login-form .btn {
		min-height: 40px;
		border-radius: 2px; 
        transition: all 0.5s;
	}
	.login-form .close {
        position: absolute;
		top: 15px;
		right: 15px;
	}
	.login-form .btn {
		background: #4aba70;
		border: none;
		line-height: normal;
	}
	.login-form .btn:hover, .login-form .btn:focus {
		background: #42ae68;
	}
    .login-form .checkbox-inline {
        float: left;
    }
    .login-form input[type="checkbox"] {
        margin-top: 2px;
    }
    .login-form .forgot-link {
        float: right;
    }
    .login-form .small {
        font-size: 13px;
    }
    .login-form a {
        color: #4aba70;
    }</style>
  
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Forgot Password</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   </head>
   <body>
	<div class="login-form">
	 <form  action="#" method="post" >
		
        <div class="form-group">
            <input type="NUMBER" class="form-control" placeholder="Enter OTP" name ='submit-otp' required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="New Password" name='pass' required="required" id="New_Password">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Confirm Password" name='confpass' required="required" id="Confirm_Password">
          
        </div>
        
        <div class="form-group small clearfix">
            <label class="checkbox-inline"><input type="checkbox"> Remember me</label>
        </div> 
        <input type="submit" class="btn btn-primary btn-block btn-lg" value="Save">    
	    

    </form>
    
    </div>			
    </body>

</html> 
<script>
 var password = document.getElementById("New_Password")
  , confirm_Password = document.getElementById("confirm_password");

function validatePassword(){
  if(New_Password.value != Confirm_Password.value) {
    Confirm_Password.setCustomValidity("Passwords Don't Match");
  } else {
    Confirm_Password.setCustomValidity('');
  }
}

New_Password.onchange = validatePassword;
Confirm_Password.onkeyup = validatePassword;
</script>
 <?php 
  
//email_verify.php
$servername='localhost';
$username='root';
$password='raspberrypi';
$dbname = "attendancesystem";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
$mail=$_GET['user'];
$otp=$_POST['submit-otp'];
$newpassword=$_POST['pass'];
$confirmpassword=$_POST['confpass'];
$sql = "SELECT user_otp, email FROM otp WHERE user_otp = '$otp' and email = '$mail'";
$result = mysqli_query($conn,$sql);
$count  = mysqli_num_rows($result);
if(!empty($count)) {
		$test=mysqli_query($conn,"UPDATE  otp  SET user_email_status ='verified' WHERE user_otp  =' $otp'");  
		 if($test)
     {
	  mysqli_query($conn,"UPDATE  login   SET password='$confirmpassword' WHERE gmail ='$mail'");
	  header("Location: /website-as/loginpage.php");
      exit(); 
	 } 
 }
else {
		$error_message = "Invalid OTP!";
		echo $error_message ;
	}	
?>
   
