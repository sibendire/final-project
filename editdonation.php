<?php
session_start(); // Start the session

// Include the file that establishes the database connection and defines $con
include("php/config.php");

if (!isset($_SESSION['Id'])) {
    echo "User ID not found in session.";
    exit(); // Exit if user ID is not set
}

if (isset($_POST['submit'])) {
    // Process form submission
    $donorName = $_POST['donorName'];
    $email = $_POST['email'];
    $items = $_POST['items'];
    $photo = $_FILES['photo']['name'];
    $number = $_POST['number'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];

    $id = $_SESSION['Id'];
    $edit_query = mysqli_query($con, "UPDATE donor SET Donorname='$donorName', Email='$email', Items='$items', Photo='$photo', Number='$number', Date='$date', Location='$location', Contact='$contact' WHERE Id=$id") or die("Error occurred please!");

    if($edit_query){
        echo "<div class='message'>
            <p>You have updated successfully</p>
            </div><br>";
        echo "<a href='home.php'><button class='btn'>Go home</button></a>";
    }
} else {
    $id = $_SESSION['Id'];
    $query = mysqli_query($con, "SELECT * FROM donor WHERE Id=$id");

    if ($query) {
        $results = mysqli_fetch_assoc($query);
        $res_Uname = $results['Username'];
        $res_Email = $results['Email'];
        $res_Items = $results['Items'];
        $res_Photo = $results['Photo'];
        $res_Number = $results['Number'];
        $res_Date = $results['Date'];
        $res_Location = $results['Location'];
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
    <link rel="stylesheet" href="donation.css">
    <title>Donation</title>
</head>
<body>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit commodi repellendus adipisci sunt dolorem quis libero provident dicta modi ratione iste in quaerat, beatae quibusdam cum expedita! Distinctio, exercitationem illo?</p>
    <div class="donation">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="container">
                <h1>Profile</h1>
                <p>Please fill in this form.</p>

                <label for="donorName">Username</label>
                <input type="text" placeholder="Enter Username" name="donorName" value="<?php echo isset($res_Uname) ? $res_Uname : ''; ?>" required>

                <label for="email">Email</label>
                <input type="text" placeholder="Enter Email" name="email" value="<?php echo isset($res_Email) ? $res_Email : ''; ?>" required>

                <label for="items">Item name donated</label>
                <input type="text" placeholder="Enter item name" name="items" value="<?php echo isset($res_Items) ? $res_Items : ''; ?>" required>

                <label for="photo">Item photo</label>
                <input type="file" name="photo">

                <label for="number">Enter number of items donated</label>
                <input type="number" placeholder="Number of items donate" name="number" value="<?php echo isset($res_Number) ? $res_Number : ''; ?>" required>

                <label for="date">Enter the date of Donation</label>
                <input type="date" placeholder="Choose the date" name="date" value="<?php echo isset($res_Date) ? $res_Date : ''; ?>" required>

                <label for="location">Enter your location</label>
                <input type="text" placeholder="Enter location" name="location" value="<?php echo isset($res_Location) ? $res_Location : ''; ?>" required>

                <label for="contact">Please Enter your contact number</label>
                <input type="number" placeholder="Number of items donate" name="contact" value="<?php echo isset($res_Contact) ? $res_Contact : ''; ?>" required>

                <div class="clearfix">
                    <button type="button" class="cancelbtn">Cancel</button>
                    <button type="submit" name="submit" class="signupbtn">Update</button>
                </div>
            </div>
        </form> 
    </div>
</body>
</html>
<?php } ?>
