<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>our Tourist Website</title>
    <link rel="stylesheet" href="styles.css">
	
    
</head>
<body>
    <header>
	<img src="logo.jpeg" alt="BEYOND STREET: LAHORE">
       
	<div class="login-register">
           
            <a href="index.html" class="nav-link">Logout</a>
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
	
	<div class="admin-dashboard">
    <h1>Admin Dashboard</h1>
	<center>
    <h2>Booked Customers</h2>
<table boarder="2" cellpadding="0" cellspacing="0" width="50%" align="center" height="50%" style=" border: 10px solid gold;
            padding: 18px;">
    <tr>
        <th align="left" style=" border: 10px solid gold;
            padding: 18px;">ID</th>
        <th align="left" style=" border: 10px solid gold;
            padding: 18px;">Full Name</th>
        <th align="left" style=" border: 10px solid gold;
            padding: 18px;">Email</th>
        <th align="left" style=" border: 10px solid gold;
            padding: 18px;">Contact Number</th>
        <th align="left" style=" border: 10px solid gold;
            padding: 18px;">Actions</th>
    </tr></br>
   <?php
   
include 'db_config.php';

$sql = "SELECT * FROM bookings";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result)) {
?>
    <tr>
        <td style="border: 10px solid maroon; padding: 18px;"><?php echo $row['id']; ?></td>
        <td style="border: 10px solid maroon; padding: 18px;"><?php echo $row['full_name']; ?></td>
        <td style="border: 10px solid maroon; padding: 18px;"><?php echo $row['email']; ?></td>
        <td style="border: 10px solid maroon; padding: 18px;"><?php echo $row['contact_no']; ?></td>
        <td style="border: 10px solid maroon; padding: 18px;">
            <a href="update_booking.php?id=<?php echo $row['id']; ?>" style="color: maroon;">Update</a>
            <a href="delete_booking.php?id=<?php echo $row['id']; ?>" style="color: maroon;">Delete</a>
        </td>
    </tr>
<?php
}
?>

</table>
</center>

<center>
    <h2>User Details</h2>
<table boarder="2" cellpadding="0" cellspacing="0" width="50%" align="center" height="50%" style=" border: 10px solid gold;
            padding: 18px;">
    <tr>
        <th align="left" style=" border: 10px solid gold;
            padding: 18px;">ID</th>
        <th align="left" style=" border: 10px solid gold;
            padding: 18px;">Full Name</th>
        <th align="left" style=" border: 10px solid gold;
            padding: 18px;">Email</th>
        <th align="left" style=" border: 10px solid gold;
            padding: 18px;">Gender</th>
        <th align="left" style=" border: 10px solid gold;
            padding: 18px;">Actions</th>
    </tr></br>
    <?php
    /* PHP code to retrieve booked customers from database*/
    include ('db_config.php');

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    while ($row = mysqli_fetch_assoc($result)) {
   ?>
        <tr>
            <td style=" border: 10px solid maroon; padding: 18px;">
			<?php echo $row['id'];?></td>
            <td style=" border: 10px solid maroon; padding: 18px;">
			<?php echo $row['full_name'];?></td>
            <td style=" border: 10px solid maroon; padding: 18px;"> 
			<?php echo $row['email'];?></td>
            <td style=" border: 10px solid maroon;
            padding: 18px;"><?php echo $row['gender'];?></td>
            <td style=" border: 10px solid maroon;  padding: 18px;">
                <a href="update_user.php?id=<?php echo $row['id'];?> " style="color: maroon;">Update</a>
                <a href="delete_user.php?id=<?php echo $row['id'];?>" style="color: maroon;">Delete</a>
            </td>
        </tr>
    <?php
    }
   ?>
</table>
</center>
</div>
</body>
</html>