<?php
		$servername = "localhost";
		$username = "root";
		$password = "Chitra@123";			//Enter your MySQL password here
		$dbname = "hospitaldbms";	//Enter the name of the database, which in this case is 'hospitaldbms'
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		//Check connection
		if ($conn->connect_error)
			die("Connection failed: " . $conn->connect_error);
				
		$username = $_POST["adminusername"];
		$password = $_POST["adminpassword"];
		
		$query = "SELECT * FROM adminlogin WHERE username = '".$username."' AND password = '".$password."';";  
		$result = $conn->query($query);
    		if($result->num_rows > 0)  
    		{  
   			 while($row = $result->fetch_assoc())  
    			 {  
    				$dbusername = $row["username"];  
   				$dbpassword = $row["password"];
    			 }
    		}
    		else
    		{
    			 echo "<script> 
    			 		alert('Invalid Username and Password. Please re-enter.');
    			 		document.location = 'adminlogin.html';
    			      </script>";
    		}
  		if($username == $dbusername && $password == $dbpassword)  
    		{
    			// Redirect browser  
   			 header("Location: adminhomepage.php"); 
   		}
?>
