<?php
session_start();
include 'db.php';
?>
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
          width: 4%;
        }
        
        button:hover {
          opacity: 0.8;
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
        <form action="AdminLogin.php" method="post">
          <div class="imgcontainer">
            <img src="img/background.jpg" alt="" style="width: 20%">   
            <h2>Login below and click login</h2>
          </div>
        
          <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="email" required>
        
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
                
            <input type="submit" name="login" value="Login" class="loginbtn"><br>
            <p> back to Login>>>><a href="index.php">User Login</a></p>
			
          </div>
         
        </form>
        
		<?php
if(isset($_POST['login']))
{
$Email = $_POST['email'];
$Password = $_POST['password'];

    $select = "SELECT * FROM tbladmin WHERE Email = '$Email' AND Password = '$Password'";
	$result = mysqli_query($con, $select);
	
	if(mysqli_num_rows($result) > 0)
	{
	 $_SESSION['email'] = $Email;
		echo '<script type= "text/javascript">';
		echo 'alert("Welcome!");';
		echo 'window.location.href = "Admin.php"';
		echo '</script>';
	}
	else
	{
	echo '<script type= "text/javascript">';
		echo 'alert("incorrect password and email");';
		echo 'window.location.href = "AdminLogin.php"';
		echo '</script>';
		
	}
}

?>
	
</body>

</html>