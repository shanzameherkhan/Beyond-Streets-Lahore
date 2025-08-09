<?php
include('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $city_origin = $_POST['city_origin'];
    $email = $_POST['email'];
    $password = $_POST['password']; 

    $sql = "INSERT INTO users (full_name, username, gender, city_origin, email, password)
            VALUES ('$full_name', '$username', '$gender', '$city_origin', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: loginform.php');
        exit(); // Ensure script stops executing after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Tourist Website</title>
    <link rel="stylesheet" href="styles.css">
    
    <script>
        function validateSignUpForm() {
            var form = document.forms[0];
            var fullName = form.full_name.value;
            var username = form.username.value;
            var gender = form.gender.value;
            var cityOrigin = form.city_origin.value;
            var email = form.email.value;
            var password = form.password.value;
            var confirmPassword = form.confirm_password.value;

            if (!fullName || !username || !gender || !cityOrigin || !email || !password || !confirmPassword) {
                alert("All fields must be filled out!");
                return false;
            }

            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }

            if (password.length < 4) {
                alert("Password must be at least 4 characters long.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <header>
        <img src="logo.jpeg" alt="BEYOND STREET: LAHORE">
        <div class="login-register">
            <a href="loginform.php" class="nav-link">Login</a>
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

    <div class="register">
        <div class="form">
            <h1>Sign Up</h1>
            <form action="signupform.php" method="POST" onsubmit="return validateSignUpForm()" enctype="multipart/form-data">
                <fieldset>
                    <legend><h3>Personal Information</h3></legend>
                    Full Name: <input type="text" name="full_name" placeholder="Full Name"><br>
                    Username: <input type="text" name="username" placeholder="Username"><br>
                    Gender: 
                    <select name="gender">
                        <option value="" disabled selected hidden>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select><br>
                    City of Origin: <input type="text" name="city_origin" placeholder="City of Origin"><br>
                </fieldset>
                <fieldset>
                    <legend><h3>Account Information</h3></legend>
                    Email Address: <input type="email" name="email" placeholder="Email Address"><br>
                    Password: <input type="password" name="password" placeholder="Password"><br>
                    Confirm Password: <input type="password" name="confirm_password" placeholder="Confirm Password"><br>
                </fieldset>
                <input type="submit" value="Sign Up">
                <input type="reset" value="Reset">
            </form>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Beyond Streets: Lahore. All rights reserved.</p>
    </footer>
</body>
</html>



