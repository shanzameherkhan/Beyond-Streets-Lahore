<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    header('Location: homepage.php');
	    
    }else {
    echo "No user found with that username";
}
}


$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        function validate() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            if (username== "") {
                alert("Username must be filled out");
                return false;
            }

            if (password == "") {
                alert("Password must be filled out");
                return false;
            }

            return true;
        }
    </script>
    <title>our Tourist Website</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <header>
		<img src="logo.jpeg" alt="BEYOND STREET: LAHORE">
		
         <div class="login-register">
        <a href="signupform.php" class="nav-link">Register</a>
         </div>
		 
        <h1>Beyond Streets: Lahore</h1>
        <p>Welcome to your ultimate travel experience</p>
    </header>

   <nav>
    <div class="dropdown">
       <a href="index.html">Home</a>
        <div class="dropdown-content">
            <a href="index.html#Tour">Tours</a>
            <a href="index.html#offers">Offers</a>
        </div>
    </div>
    <a href="aboutus.html">About-Us</a>
    <a href="contact.html">Contact</a>
    </nav>

	<div class="register" id="loginback">
    <div class="form" id="login">
        <h1>Login</h1>
		<form name="Login" action="loginform.php" method="POST" onsubmit=" return validate()">
        
		</br></br>
            <label for="username">Username :</label><br>
            <input type="text" id="username" name="username" placeholder="username "><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" placeholder="password" ><br>
            <input type="submit" value="Login" id="loginsubmit"><br>
			<a href ="adminlogin.php" style="color: white; font-style:bold;"> Admin login</a>
			
        </form>
    </div>
</div>
    <footer>
        <p>&copy; 2024 Beyond Streets: Lahore. All rights reserved.</p>
    </footer>
</body>
</html>





   
    
