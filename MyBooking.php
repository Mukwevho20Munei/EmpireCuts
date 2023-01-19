<?php

session_start();
    if(!isset($_SESSION["email"])) {
        header("Location: MyBooking.php");
        exit();
    }
require_once("db.php");

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
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
                    <li><a href="Homepage.php" class="current-page"></a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="Members.php">Members</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="Booking.php">Booking</a></li>
                    
                </ul>

            </nav>
        </div>
    </header>
    <main>
        <div id="home">
            <div >
                <div class="landing-text">
                    
                    <h1>My Bookings</h1>
                
	
		<table  border="1px" style="width:600px; line-height:40px;">
	 <tr>
	 <th>Name</th>
	 <th>Surname</th>
	 <th>Gender</th>
	 <th>Date</th>
	 <th>Time</th>
	 <th>Style</th>
	 <th>Extra Information</th>
	 <th>Email/th>
	 </tr>
	
	
	 <?php
	 
	  $Email = $_SESSION['email'];
	  
	  $query = "SELECT * FROM tblbookings Where Email = '$Email' ORDER BY id ASC";
	  $result = mysqli_query($con, $query);
	  while($row = mysqli_fetch_assoc($result)){
		 ?>
		 <tr>
		 <td><?php echo $row['Name'];?></td>
		 <td><?php echo $row['Surname'];?></td>
		 <td><?php echo $row['Gender'];?></td> 
		 <td><?php echo $row['Date'];?></td>
		 <td><?php echo $row['Time'];?></td>
		 <td><?php echo $row['Style'];?></td>
		 <td><?php echo $row['Extrainfo'];?></td>
	    
	
	
		 <td>
		 <form action = "Admin.php" method ="POST">
		 
		     <input type="hidden" name = "id" value= "<?php echo $row['id'];?>"/>
		     <input type="submit" name = "Delete" value = "Delete"/>
			 
		 </form>
		 </td>
		 </tr>
	</table>
	
	</section>
	<?php
	  }
	  ?>
	  </div>
	  
	  <?php
	    if(isset($_POST['Delete'])){
		  $id = $_POST['id'];
		  
		  $select = "DELETE FROM tblbookings WHERE id = '$id'";
		  $result = mysqli_query($con, $select);
		  
	    echo '<script type= "text/javascript">';
		echo 'alert("Booking Removed!");';
		echo 'window.location.href = Admin.php';
		echo '</script>';
		}  
	  
	  ?>
	  </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>