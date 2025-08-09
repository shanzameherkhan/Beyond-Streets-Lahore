<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE name='$name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    header('Location: admin_dashboard.php');
	    
    }else {
    echo "No user found with that name";
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
            var username = document.getElementById("name").value;
            var password = document.getElementById("password").value;

            if (username== "") {
                alert("name must be filled out");
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
        <h1>Admin Login</h1>
		<form name="Login" action="adminlogin.php" method="POST" onsubmit=" return validate()">
        
		</br></br>
            <label for="name">Username :</label><br>
            <input type="text" id="name" name="name" placeholder="name "><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" placeholder="password" ><br>
            <input type="submit" value="Login" id="loginsubmit"></br>
        </form>
    </div>
</div>
    <footer>
        <p>&copy; 2024 Beyond Streets: Lahore. All rights reserved.</p>
    </footer>
</body>
</html>





   
    
