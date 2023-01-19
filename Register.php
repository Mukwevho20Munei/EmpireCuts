<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        form {border: 3px solid #f1f1f1;}
        
        input[type=text], input[type=password] {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          box-sizing: border-box;
        }
        
        button {
          background-color: #3ae2e8;
          color: white;
          padding: 2px 2px;
          margin: 4px 0;
          border: none;
          cursor: pointer;
          width: 6%;
        }
        
        button:hover {
          opacity: 0.5;
        }
        
        
        
        .imgcontainer {
          text-align: center;
          margin: 24px 0 12px 0;
        }
        
       
        .container {
          padding: 16px;
        }
        
        span.psw {
          float: right;
          padding-top: 16px;
        }
        
        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
          span.psw {
             display: block;
             float: none;
          }
          .cancelbtn {
             width: 100%;
          }
        }
        </style>
        </head>
        <body>
        
        <form action="Register.php" method="POST">
          <div class="imgcontainer">
            <img src="img/background.jpg" alt="" style="width: 20%">
            <h2>Registration Form</h2>
          </div>
        
          <div class="container">
		  
            <label for="uname"><b>Name</b></label>
            <input type="text" placeholder="Enter your Name" class="login-input" name="uname" required>
        
            
            <label for="uname"><b>Surname</b></label>
            <input type="text" placeholder="Enter your Surname" class="login-input" name="usurname" required>
            
            <label for="uname"><b>Gender</b></label>
            <input type="text" placeholder="Male/Female" class="login-input" name="ugender" required>
            
            <label for="uname"><b>Email</b></label>
            <input type="text" placeholder="Enter your email that you will use as your 'Username'" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter your Password" name="password" required>

            <label for="psw"><b>Confirm Password</b></label>
            <input type="password" placeholder="Confirm Password" name="confirmpassword" required>
                
             <input type="submit" name="Register" value="Register" class="login-button">
			 
			  <p class="link"><a href="login.php">Click to Login</a></p>
            </div>
        
          
        </form>
		
		
		<?php

include 'db.php';

if(isset($_POST['Register'])){
	
	$Gender = $_POST['ugender'];
	$Name = $_POST['uname'];
	$Surname = $_POST['usurname'];
	$Email = $_POST['email'];
	$Password = $_POST['password'];
	$ConPassword = $_POST['confirmpassword'];
	
	$select = "SELECT * FROM tblusers WHERE Email = '$Email'";
	$result = mysqli_query($con, $select);
	
	if(mysqli_num_rows($result) > 0)
	{
		echo '<script type= "text/javascript">';
		echo 'alert("Email alreeady Taken!");';
		echo 'window.location.href = "register.php"';
		echo '</script>';
	}
	else
	{
		if($ConPassword != $Password)
		{
	    echo '<script type= "text/javascript">';
		echo 'alert("Passwords dont match");';
		echo 'window.location.href = "register.php"';
		echo '</script>';
		}
		else{
	    $register = "INSERT INTO tblusers (Name, Surname,Gender, Email, Password) VALUES ( '$Name', '$Surname','$Gender', '$Email', '" . md5($Password) . "')";
		mysqli_query($con, $register);
		echo '<script type= "text/javascript">';
		echo 'alert("account registerd successfully");';
		echo 'window.location.href = "index.php"';
		echo '</script>';
		}
		
	}
}
?> 
     
</body>

</html>