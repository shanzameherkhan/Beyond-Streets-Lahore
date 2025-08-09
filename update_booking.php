<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Booking</title>
    <link rel="stylesheet" href="styles.css">
	
	   <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .form-container {
            text-align: center;
            margin-top: 50px;
        }
        .form-container form {
            display: inline-block;
            background-color: maroon;
            color: white;
            padding: 20px;
            border: 2px solid white;
            border-radius: 8px;
            margin-top: 20px;
        }
        .form-container form label {
            display: block;
            margin-bottom: 10px;
        }
        .form-container form input[type="text"],
        .form-container form input[type="email"],
        .form-container form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        .form-container form input[type="submit"] {
            background-color: white;
            color: maroon;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        .form-container form input[type="submit"]:hover {
            background-color: gold;
            color: black;
        }
    </style>
	
</head>
<body>
    <header>
        <h1>Update Booking</h1>
    </header>

    <div class="form-container">
        <?php
        include('db_config.php');

        // Check if form is submitted for update
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $id = $_POST['id'];
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $contact_no = $_POST['contact_no'];

            // Update query
            $sql = "UPDATE bookings SET full_name = '$full_name', email = '$email', contact_no = '$contact_no' WHERE id = '$id'";

            if (mysqli_query($conn, $sql)) {
                echo "Booking updated successfully!";
                header("Location: admin_dashboard.php"); // Redirect to admin dashboard after update
                exit;
            } else {
                echo "Error updating booking: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        } else {
            // Retrieve booking ID from URL parameter
            $booking_id = $_GET['id'];

            // Retrieve booking details
            $sql = "SELECT * FROM bookings WHERE id = '$booking_id'";
            $result = mysqli_query($conn, $sql);
            $booking = mysqli_fetch_assoc($result);

            // Display update form
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $booking['id']; ?>">
                <label>Full Name:</label>
                <input type="text" name="full_name" value="<?php echo $booking['full_name']; ?>"><br>
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $booking['email']; ?>"><br>
                <label>Contact Number:</label>
                <input type="text" name="contact_no" value="<?php echo $booking['contact_no']; ?>"><br>
                <input type="submit" value="Update">
            </form>
            <?php
        }
        ?>
    </div>

</body>
</html>
