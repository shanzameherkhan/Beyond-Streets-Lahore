<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Reviews</title>
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

	<div class="cont">

		     <div class="form" >
        <h1>Leave a Review</h1>
        <form action="submit_review.php" method="POST" ">
            <fieldset>
                <legend>Review Form</legend>

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="rating">Rating:</label>
                <select id="rating" name="rating" required>
                    <option value="" disabled selected hidden>Rate us</option>
                    <option value="1">1 - Poor</option>
                    <option value="2">2 - Fair</option>
                    <option value="3">3 - Good</option>
                    <option value="4">4 - Very Good</option>
                    <option value="5">5 - Excellent</option>
                </select><br>

                <label for="review">Review:</label><br>
                <textarea id="review" name="review" rows="4" cols="50" required></textarea><br>

                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image" accept="image/*"><br>

                <input type="submit" value="Submit Review">
                <input type="reset" value="Reset">
            </fieldset>
        </form>
    </div>
	</div>

    <footer>
        <p>&copy; 2024 Beyond Streets: Lahore. All rights reserved.</p>
    </footer>
</body>
</html>
