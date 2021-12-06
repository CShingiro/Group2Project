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
</head>
<body>

<header >
<div class="container">
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
<main>
<div class="imgresult">
  <img>
 <div class="title-result">

<?php
require 'database.php';

$errors=[];

if(!empty($_POST['name'])) {
	$name = $_POST['name'];
} else {
	$name = NULL;
	$errors[] = "<p>We need your name </p>";
}


if(!empty($_POST['email'])) {
    $email = $_POST['email'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] =  "<p>Your email is incorrect '$email' </p>";
        $email = NULL;        
    }
}else{
    $errors[] =  "<p>We need your email </p>";
    $email = NULL;        
}


if(!empty($_POST['subject'])) {
	$subject = $_POST['subject'];
} else {
	$subject = NULL;
	$errors[] = "<p>We need your subject </p>";
}


if(!empty($_POST['message'])) {
	$message = $_POST['message'];
} else {
	$message = NULL;
	$errors[] = "<p>We need your message </p>";
}

$name_clean = prepare_string($dbc, $name);
$email_clean = prepare_string($dbc, $email);
$subject_clean = prepare_string($dbc, $subject);
$message_clean = prepare_string($dbc, $message);

$q = "INSERT INTO Contact(name, email, subject, message) VALUES(?, ?, ?, ?)";

$stmt = mysqli_prepare($dbc, $q);
mysqli_stmt_bind_param(
	$stmt,
	'ssss',
	$name_clean,
	$email_clean,
	$subject_clean,
	$message_clean
);

$result = mysqli_stmt_execute($stmt);
if (!$result)
{
	$errors[]="Error Access DB";
}

if(count($errors)==0) {

	echo "<p>Welcome to COS GYM Our managers will contact you</p>";

}else
{
    foreach($errors as $err) 
	{
		echo $err;
	}
}
?>
</div>
</div>
</main>
<footer class="footer-res">
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
