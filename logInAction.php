
<?php
require "database.php";
if ($dbc === false) 
{
	die ("ERROR: could not connect. " . mysqli_connect_error());
}
$name = $_POST['name'];
$pass = $_POST['pass'];

$sql= "SELECT `COSGymPatronData`.`RegisteredLogin` WHERE username='$name'AND password='$pass'";
if($result=mysqli_query($dbc, $sql))
{
	if($row=mysqli_fetch_array($result))
	{
		header('Location:welcomePage.html');
	}
	else
	{
		header('Location:wrongPas.html');
	}
}
	mysqli_close($dbc);
	?>