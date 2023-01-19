<?php
session_start();
require_once("db.php");

?>
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
                    <li><a href="Admin.php">Admin Dashboard</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="Members.php">Members</a></li>
                    <li><a href="Users.php">Users</a></li>
               

                   
                   
                </ul>
                

            </nav>
        </div>
    </header>
    <main class="contact">
      
	  <section>
        <h1>Admin</h1>
		
		<h1>User Register</h1>
	
		<table  border="1px" style="width:600px; line-height:40px;">
	 <tr>
	 <th>Name</th>
	 <th>Surname</th>
	 <th>Gender</th>
	 <th>Email</th>
	 <th>Password</th>
	 </tr>
	
	
	 <?php
	  $query = "SELECT * FROM tblusers ORDER BY id ASC";
	  $result = mysqli_query($con, $query);
	  while($row = mysqli_fetch_array($result)){
		 ?>
		 <tr>
		 <td><?php echo $row['Name'];?></td>
		 <td><?php echo $row['Surname'];?></td>
		 <td><?php echo $row['Gender'];?></td> 
		 <td><?php echo $row['Email'];?></td>
		 <td><?php echo $row['Password'];?></td>
	
		 <td>
		 <form action = "Admin.php" method ="POST">
		 
		     <input type="hidden" name = "id" value= "<?php echo $row['Id'];?>"/>
		     <input type="submit" name = "DeleteUser" value = "Delete"/>
			 
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
	    if(isset($_POST['DeleteUser'])){
		  $id = $_POST['id'];
		  
		  if($id == null)
		  {
			  echo 'No records';
		  }
		  else
		  {
	      $select = "DELETE FROM tblusers WHERE id = '$id'";
		  $result = mysqli_query($con, $select);
		  
	    echo '<script type= "text/javascript">';
		echo 'alert("User Removed!");';
		echo 'window.location.href = Admin.php';
		echo '</script>';
		  }
		  
		
		}  
	  
	  ?>
	  </div>
	  
	  
	  <h1>Bookings</h1>
	
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
	  $query = "SELECT * FROM tblbookings ORDER BY id ASC";
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
	     <td><?php echo $row['Email'];?></td>
	
	
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
	  
	  
	  
	  

</body>

</html>