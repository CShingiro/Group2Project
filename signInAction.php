<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "mydb";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn)
	  {
          die('Could not Connect MySql Server:' .mysql_error());
        }
		
     $name = $_POST['name'];
     $email = $_POST['email'];
     $pass = $_POST['pass'];
     $con = $_POST['con'];
	
     $sql = "INSERT INTO user (username,email,password,ConPas)
     VALUES ('$name','$email','$pass','$con')";
     if (mysqli_query($conn, $sql))
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