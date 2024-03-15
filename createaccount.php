<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registration</title>
</head>
<body>

<?php
include("php/config.php");
if(isset($_POST['submit'])){
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $psw = $_POST['psw'];
    
    // Verifying the unique email
    $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");
    if(mysqli_num_rows($verify_query) != 0){
        echo "<div class='message'>
        <p>This email is already in use. Please try another one.</p>
        </div><br>";
        echo "<a href='javascript:history.back()'><button class='btn'>Go Back</button></a>";
    }
    else{
        mysqli_query($con, "INSERT INTO users(Username, Email, Psw,) VALUES('$userName','$email','$psw')") or die("Error occurred while inserting data: " . mysqli_error($con));
        echo "<div class='message'>
        <p>Your account has been created successfully.</p>
        </div><br>";
        echo "<a href='login.php'><button class='btn'>Login Now</button></a>";
    }
   
}
else{
?>

  <form action="" method="post">
    <div class="container">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>

        <label for="userName">Username</label>
        <input type="text" placeholder="Enter Username" name="userName" required>

        <label for="email">Email</label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="psw">Password</label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <p>Already have an account? Click here to <a href="login.php" style="color:dodgerblue">Login</a>.</p>

        <div class="clearfix">
            <button type="submit" class="signupbtn" name="submit">Sign Up</button>
        </div>
    </div>
</form> 
<?php } ?> 
</body>
</html>
