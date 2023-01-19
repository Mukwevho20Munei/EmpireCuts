
<?php
    session_start();
    if(!isset($_SESSION["email"])) {
        header("Location: Booking.php");
        exit();
    }
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
    width: 2%;
  }
  
  button:hover {
    opacity: 0.1;
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
  


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header class="header">
        <div class="container container-nav">
            <div class="site-title">
                <h1>Empire Cuts</h1>
                <p class="subtitle">Welcome to Empire Cuts</p>
            </div>
            <nav>
                <ul>
                    <li><a href="Homepage.php">Home</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="Members.php">Members</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="Booking.php" class="current-page">Booking</a></li>

                    <li><u><a href="index.php" >signout</a></u></li>
                   
                </ul>
                

            </nav>
        </div>
    </header>
    <main class="contact">
      
        <h1>Booking Details</h1>
        <div class="flex-container">
            <div class="flex-item-left">
                <h4>We are located at</h4>
                <p>Braamfontain Juta Street</p>
                <p>Gauteng, Johannesburg</p>
                <h4>Phone</h4>
                <p>(+27)060-846-3443</p>
                <p>(+27)072-323-4354</p>
                <h4>Email</h4>
                <p>EmpireCuts@gmail.com</p>
            </div>
            <div class="flex-item-right">
                <form action="Booking.php" method="POST">
                    <input type="text" name="fname" placeholder="Your Name">
                    <input type="text" name="Surname" placeholder="Your Surname">
                    <input type="date" Date="subject" name="Date" placeholder="Date">
                    
                    <input type="time" Time="subject" name="Time" placeholder="Time">
                    <input type="text" name="Style" id="Style" placeholder="Style">
                 
                  
                    <select name= "Gender">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                    <textarea name="extrainfo" id="textarea" placeholder="If you want add something" cols="30" rows="5"></textarea>
                    
                    <style>
                        /* Popup container - can be anything you want */
                        .popup {
                          position: relative;
                          display: inline-block;
                          cursor: pointer;
                          -webkit-user-select: none;
                          -moz-user-select: none;
                          -ms-user-select: none;
                          user-select: none;
                        }
                        .popup {
  font-weight: 500;
  color: #3d3232;
  background-color: hsl(176, 85%, 49%);
  font-size: 1.20rem;
  margin: 0;
  text-transform: capitalize;
}
                        
                        /* The actual popup */
                        .popup .popuptext {
                          visibility: hidden;
                          width: 160px;
                          background-color: rgb(48, 88, 100);
                          color: rgb(21, 216, 209);
                          text-align: center;
                          border-radius: 6px;
                          padding: 8px 0;
                          position: absolute;
                          z-index: 1;
                          bottom: 125%;
                          left: 50%;
                          margin-left: -80px;
                        }
                        
                        /* Popup arrow */
                        .popup .popuptext::after {
                          content: "";
                          position: absolute;
                          top: 100%;
                          left: 50%;
                          margin-left: -5px;
                          border-width: 5px;
                          border-style: solid;
                          border-color: rgb(11, 210, 245) transparent transparent transparent;
                        }
                        
                        /* Toggle this class - hide and show the popup */
                        .popup .show {
                          visibility: visible;
                          -webkit-animation: fadeIn 1s;
                          animation: fadeIn 1s;
                        }
                        
                        /* Add animation (fade in the popup) */
                        @-webkit-keyframes fadeIn {
                          from {opacity: 0;} 
                          to {opacity: 1;}
                        }
                        
                        @keyframes fadeIn {
                          from {opacity: 0;}
                          to {opacity:1 ;}
                        }
                        </style>
                        </head>
                        <body style="text-align:center">
                        
                        <input type="submit" name="submit" value="Submit" class="loginbtn"><br>
                          
                       
                        
                        
                       
                   
            </div>
        </div>
    </main>
    <footer class="footer">
        <h3><span id="demo">&copy;</span><a href="#">EmpireCuts.com</a></h3>
    </footer>

 <?php

include 'db.php';

if(isset($_POST['submit'])){
	
	$Email = $_SESSION['email'];
	$Name = $_POST['fname'];
	$Surname = $_POST['Surname'];
	$Date = $_POST['Date'];
	$Time = $_POST['Time'];
	$Style = $_POST['Style'];
	$Gender = $_POST['Gender'];
	$ExtraInfo = $_POST['extrainfo'];
	
	$select = "SELECT * FROM tblbookings WHERE Name = '$Name'";
	$result = mysqli_query($con, $select);
	
	if(mysqli_num_rows($result) > 0)
	{
		echo '<script type= "text/javascript">';
		echo 'alert("Booking already made!");';
		echo 'window.location.href = "Booking.php"';
		echo '</script>';
	}
	else
	{
		
		
	    $list = "INSERT INTO tblbookings (Name, Surname,Date,Time,Style,Gender,Extrainfo,Email) VALUES ( '$Name', '$Surname','$Date','$Time','$Style','$Gender','$ExtraInfo', '$Email' )";
		mysqli_query($con, $list);
		echo '<script type= "text/javascript">';
		echo 'alert("Booking made successfullly dont forget to come!!!");';
		echo 'window.location.href = "Booking.php"';
		echo '</script>';
	
		
	}
}
?> 
	
		<?php

include 'db.php';

if(isset($_POST['signout'])){
	session_start();
	if(session_destroy())
	{
		header("Location: index.php");
	}
	
}
?> 
</body>

</html>