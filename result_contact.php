<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>COS Gym</title>
<link href="cos-gym.css?gf=9" rel="stylesheet" type= "text/css" />
<script src="https://kit.fontawesome.com/42ca52e1de.js" crossorigin="anonymous"></script>
</head>
<body>

<header >
<div class="logo">
  <img src="images/logo_gym.png"></div>
<div>
  <nav>
    <a href="index.html">Home</a>
    <a href="about.html">About</a>
    <a href="schedule.html">Schedule</a>
    <a href="online.html">Online</a>
    <a href="shop.html">Shop</a>
    <a href="contact.html">Contact</a>
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
