<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>COS Gym</title>
<link href="cos-gym.css" rel="stylesheet" type= "text/css" />
<script src="https://kit.fontawesome.com/42ca52e1de.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="src/index.js" type="module"></script>
</head>
<body>
<header >
  <div class="container">
    <nav font-size="120%" margin-left="30%" margin-top="8%" float="right" class="navbar navbar-expand-xxl navbar-light">
      <a text-decoration="none" padding="4%" class="navbar-brand">
        <div class="logo">
          <img src="images/logo_gym.png">
        </div>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu" aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="#toggleMobileMenu">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
          <li><a class="nav-link" href="index.html">Home</a></li>
          <li><a class="nav-link" href="about.html">About</a></li>
          <li><a class="nav-link" href="schedule.html">Schedule</a></li>
          <li><a class="nav-link" href="online.html">Online</a></li>
          <li><a class="nav-link" href="shop.html">Shop</a></li>
          <li><a class="nav-link" href="contact.html">Contact</a></li>
        </ul>
      </div>
   </nav>
  </div> 
</header>


<?php
    require "database.php";
      if(!$dbc)
	  {
          die('Could not Connect MySql Server:' .mysql_error());
        }
      
     $name_id = rand(100,900);
     $name = $_POST['name'];
     $email = $_POST['email'];
     $pass = $_POST['pass'];
     $pass = $_POST['con'];
	
     $sql = "INSERT INTO `RegisteredLogin` FROM `COSGymPatronData` (UserID,name,email,password)
     VALUES ('$name_id','$name','$email','$pass')";
     if (mysqli_query($dbc, $sql))
	 {
		if ($_POST["pass"] === $_POST["con"]) 
		{
			echo "<div class='welcome'>Welcome!!</div>";
      header("Location: welcome.html");
		}
     }
    else if ($_POST["pass"] != $_POST["con"]) {
      echo "<a href='registration.html'><p>Please make sure the passwords match</p></a>";
    }
	 else
	 {
        echo "<p>Error: </p>" . $sql . "<p>:-</p>" . mysqli_error($conn);
     }

     mysqli_close($conn);

?>
<footer>
  <div>
    <ul>
     <dt>Email Us</dt>
     <dt>mail@cosgym.com</dt>
    </ul>
  </div>
   <div>
     <h3>Welcome to ChrisOlySim Gym</h3>
     <h4>Contact Us 989-888-9999</h4>
   </div>
   <div>
    <ul>
     <dt>Follow Us</dt>
     <dt><i class="fab fa-facebook-f"></i>
      <i class="fab fa-instagram"></i>
      <i class="fab fa-twitter"></i>
    </dt>
    </ul>
  </div>
   </footer>
</body>
</html>