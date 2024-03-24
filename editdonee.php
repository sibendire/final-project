<?php
session_start();

// Include the file that establishes the database connection and defines $con
include("php/config.php");

// Check if user is logged in and session variables are set
if (!isset($_SESSION['valid']) || !isset($_SESSION['userName']) || !isset($_SESSION['id'])) {
    header("Location: login.php");
    exit(); // Stop script execution after redirect
}

// Process form submission if the 'submit' button is clicked
if (isset($_POST['submit'])) {
    // Retrieve form data
    $doneeName = $_POST['doneeName'];
    $email = $_POST['email'];
    $item = $_POST['item'];
    $number = $_POST['number'];
    $date = $_POST['date'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    // Update donee information in the database
    $id = $_SESSION['id'];
    $edit_query = mysqli_query($con, "UPDATE donee SET DoneeName='$doneeName', Email='$email', Item='$item', Number='$number', Date='$date', Address='$address', Contact='$contact' WHERE Id=$id") or die("Error occurred please!");

    // Display success message after update
    if ($edit_query) {
        echo "<div class='message'>
            <p>You have updated successfully</p>
            </div><br>";
        echo "<a href='home.php'><button class='btn'>Go home</button></a>";
    }
}

// Fetch current donee information from the database
$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM donee WHERE Id=$id");

if ($query) {
    $results = mysqli_fetch_assoc($query);
    $res_DoneeName = $results['DoneeName'];
    $res_Email = $results['Email'];
    $res_Item = $results['Item'];
    $res_Number = $results['Number'];
    $res_Date = $results['Date'];
    $res_Address = $results['Address'];
    $res_Contact = $results['Contact'];
} else {
    echo "Error fetching user data: " . mysqli_error($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Donee Profile</title>
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <h1>Edit Donee Profile</h1>
            <p>Please fill in this form to update your profile.</p>

            <label for="doneeName">Donee Name</label>
            <input type="text" placeholder="Enter Donee Name" name="doneeName" value="<?php echo $res_DoneeName; ?>" required>

            <label for="email">Email</label>
            <input type="email" placeholder="Enter Email" name="email" value="<?php echo $res_Email; ?>" required>

            <label for="item">Item</label>
            <input type="text" placeholder="Enter Item" name="item" value="<?php echo $res_Item; ?>" required>

            <label for="number">Number</label>
            <input type="text" placeholder="Enter Number" name="number" value="<?php echo $res_Number; ?>" required>

            <label for="date">Date</label>
            <input type="date" placeholder="Enter Date" name="date" value="<?php echo $res_Date; ?>" required>

            <label for="address">Address</label>
            <input type="text" placeholder="Enter Address" name="address" value="<?php echo $res_Address; ?>" required>

            <label for="contact">Contact</label>
            <input type="text" placeholder="Enter Contact" name="contact" value="<?php echo $res_Contact; ?>" required>

            <div class="clearfix">
                <button type="button" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn" name="submit">Update</button>
            </div>
        </div>
    </form>
</body>
</html>
