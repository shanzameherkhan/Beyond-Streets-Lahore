<?php
include 'db_config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $father_name = $_POST['fathername'];
    $gender = $_POST['gender'];
    $cnic = $_POST['cnic'];
    $city_origin = $_POST['city_origin'];
    $email = $_POST['email'];
    $contact_no = $_POST['contactno'];
    $travel_reason = $_POST['travel_reason'];
    $payment_method = $_POST['Payement_method'];

    $sql = "INSERT INTO bookings (full_name, father_name, gender, cnic, city_origin, email, contact_no, travel_reason, payment_method)
            VALUES ('$full_name', '$father_name', '$gender', '$cnic', '$city_origin', '$email', '$contact_no', '$travel_reason', '$payment_method')";

    if ($conn->query($sql) === TRUE) {
        header('Location: homepage.php');
        exit;
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
        function validateBookingForm() {
            var form = document.forms[0];
            var fullName = form.full_name.value;
            var fatherName = form.fathername.value;
            var gender = form.gender.value;
            var cnic = form.cnic.value;
            var cityOrigin = form.city_origin.value;
            var email = form.email.value;
            var contactNo = form.contactno.value;
            var tourPlan = form.tour_plan.value;
            var travelReason = form.travel_reason.value;
            var paymentMethod = form.Payement_method.value;
            

            // Validate   fields
            if (!fullName || !fatherName || !gender || !cnic || !cityOrigin || !email || !contactNo || !tourPlan || !travelReason || !paymentMethod ) {
                alert("All fields are required to fill !");
                return false;
            }

            // Validate CNIC pattern
            var cnicPattern = /^[0-9]{13}$/;
            if (!cnicPattern.test(cnic)) {
                alert("Please enter a valid CNIC number (13 digits without dashes).");
                return false;
            }

            // Validate contact number pattern
            var contactNoPattern = /^[0-9]{11}$/;
            if (!contactNoPattern.test(contactNo)) {
                alert("Please enter a valid contact number (11 digits).");
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
        <a href="index.html" style=color:#FFD700;>LogOut</a>
    </div>
        <h1>Beyond Streets: Lahore</h1>
        <p>Welcome to your ultimate travel experience</p>
    </header>

   <nav>
    <div class="dropdown">
       <a href="homepage.php">Home</a>
        <div class="dropdown-content">
            <a href="homepage.php#Tour">Tours</a>
            <a href="homepage.php#offers">Offers</a>
        </div>
    </div>
    <a href="aboutus.html">About-Us</a>
    <a href="contact.html">Contact</a>
    </nav>

<div class="register">
 <div class="form">
        <h1>Booking</h1>
        <form action="bookingform.php" method="POST" onsubmit="return validateBookingForm()" enctype="multipart/form-data">
            <fieldset>
                <legend><h3>Personal Information</h3></legend>
                
                Full Name:<input type="text" name="full_name" placeholder="Full Name"  ><br>
                Father name:<input type="text" name="fathername" placeholder="Father name"  ><br>
                Gender: 
                <select name="gender"  >
                    <option value="" disabled selected hidden>Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select><br>
				CNIC Number :<input type="text" pattern="[0-9]{13}", name="cnic" placeholder="Enter CNIC without dashes"  ><br>
                City of Origin:
                <input type="text" name="city_origin" placeholder="City of Origin"  ><br>
            </fieldset>
            <fieldset>
                <legend><h3>Contact Information</h3></legend>
                
                Email Address:<input type="email" name="email" placeholder="Email Address"  ><br>
                Contact Number :<input type="text" pattern="[0-9]{11}", name="contactno" placeholder="Contact Number"  ><br>
            </fieldset>
            <fieldset>
                <legend><h3>Travel Preferences</h3></legend>
                
                Choose Your Desire Tour Plan:
                
                <select name="tour_plan">
                    <option value="" disabled selected hidden>Choose your Tour</option>
                    <option value="#">Complete Tour</option>
                    <option value="#">Main Location</option>
                    <option value="#">Andoron e Lahore</option>
                    <option value="#">Minar e Pakistan</option>
                    <option value="other">Other</option>
                </select><br>
                Reason for Travel:
                <select name="travel_reason">
                    <option value="" disabled selected hidden>Reason for Travel</option>
                    <option value="leisure">Leisure</option>
                    <option value="business">Business</option>
                    <option value="family_visit">Family Visit</option>
                    <option value="study">Study</option>
                    <option value="other">Prefer not to say</option>
                </select><br>
            </fieldset>
            <fieldset>
                <legend><h3>Payement Process</h3></legend>
               <select name="Payement_method">
                    <option value="" disabled selected hidden>Payement Method</option>
                    <option value="cash">Cash</option>
                    <option value="Online">Online</option>
                    <option value="other">Other</option>
                </select><br>
            </fieldset>
			
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
    </div>
    
</div>
    <footer>
        <p>&copy; 2024 Beyond Streets: Lahore. All rights reserved.</p>
    </footer>
</body>
</html>


