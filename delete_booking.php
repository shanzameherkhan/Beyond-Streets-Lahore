<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Booking</title>
    <link rel="stylesheet" href="styles.css">
    <style>
	
	
.confirmation-container {
    text-align: center;
    margin-top: 50px;
}

.confirmation-container p {
    font-size: 1.2em;
    margin-bottom: 20px;
}

.confirmation-container form {
    display: inline-block;
    margin-top: 20px;
}

.confirmation-container input[type="submit"],
.confirmation-container a {
    background-color: maroon;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    margin-right: 10px;
    margin-bottom: 8px;
    text-decoration: none;
    display: inline-block;
}

.confirmation-container input[type="submit"]:hover,
.confirmation-container a:hover {
    background-color: gold;
    color: black;
}

.confirmation-container a {
    border: 1px solid maroon;
    padding: 10px 20px;
}

	
	
	</style>
</head>
<body>
    <header>
        <h1>Delete Booking</h1>
    </header>

    <div class="confirmation-container">
        <?php
        include('db_config.php');

        // Check if booking ID is provided via GET request
        if (isset($_GET['id'])) {
            $booking_id = $_GET['id'];

            // Retrieve booking details for confirmation
            $sql = "SELECT * FROM bookings WHERE id = '$booking_id'";
            $result = mysqli_query($conn, $sql);
            $booking = mysqli_fetch_assoc($result);

            if (!$booking) {
                echo "Booking not found.";
            } else {
                // Display confirmation message and form
                ?>
                <p>Are you sure you want to delete the booking for "<?php echo $booking['full_name']; ?>"?</p>
                
                <form action="delete_booking.php?id=<?php echo $booking_id; ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $booking_id; ?>">
                    <input type="submit" name="delete" value="Delete"><br>
                    <a href="admin_dashboard.php">Cancel</a>
                </form>
                <?php

                // Process delete operation
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
                    $id = $_POST['id'];

                    // Delete query
                    $sql_delete = "DELETE FROM bookings WHERE id = '$id'";
                    if (mysqli_query($conn, $sql_delete)) {
                        echo "Booking deleted successfully!";
                        header("Location: admin_dashboard.php"); // Redirect to admin dashboard after delete
                        exit;
                    } else {
                        echo "Error deleting booking: " . mysqli_error($conn);
                    }

                    mysqli_close($conn);
                }
            }
        } else {
            echo "Booking ID not provided.";
        }
        ?>
    </div>

</body>
</html>
