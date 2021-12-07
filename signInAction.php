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
	
     $sql = "INSERT INTO `RegisteredLogin` FROM `COSGymPatronData` (UserID,name,email,password)
     VALUES ('$name_id','$name','$email','$pass')";
     if (mysqli_query($dbc, $sql))
	 {
		if ($_POST["pass"] === $_POST["con"]) 
		{
			header("Location: welcomePage.html");
		}
     }
	 else
	 {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }

     mysqli_close($conn);

?>