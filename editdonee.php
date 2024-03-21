<?php
session_start();

// Include the file that establishes the database connection and defines $con
include("php/config.php");

if (!isset($_SESSION['Id'])) {
    echo "User ID not found in session.";
    exit(); // Exit if user ID is not set
}

if (isset($_POST['submit'])) {
    // Process form submission
    $doneeName = $_POST['doneeName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $id = $_SESSION['Id'];
    $edit_query = mysqli_query($con, "UPDATE donee SET DoneeName='$doneeName', Email='$email', Phone='$phone', Address='$address' WHERE Id=$id") or die("Error occurred please!");

    if ($edit_query) {
        echo "<div class='message'>
            <p>You have updated successfully</p>
            </div><br>";
        echo "<a href='home.php'><button class='btn'>Go home</button></a>";
    }
} else {
    $id = $_SESSION['Id'];
    $query = mysqli_query($con, "SELECT * FROM donee WHERE Id=$id");

    if ($query) {
        $results = mysqli_fetch_assoc($query);
        $res_DoneeName = $results['DoneeName'];
        $res_Email = $results['Email'];
        $res_Phone = $results['Phone'];
        $res_Address = $results['Address'];
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

            <label for="phone">Phone</label>
            <input type="text" placeholder="Enter Phone" name="phone" value="<?php echo $res_Phone; ?>" required>

            <label for="address">Address</label>
            <textarea placeholder="Enter Address" name="address" required><?php echo $res_Address; ?></textarea>

            <div class="clearfix">
                <button type="button" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn" name="submit">Update</button>
            </div>
        </div>
    </form>
</body>
</html>
<?php } ?>
