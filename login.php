<?php
session_start();
include("php/config.php");

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['psw']);

    $result = mysqli_query($con, "SELECT * FROM users WHERE email='$email'") or die(mysqli_error($con));

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['psw'])) {
            $_SESSION['valid'] = $row['email'];
            $_SESSION['userName'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            header("Location: home.php");
            exit();
        } else {
            echo "<div class='message'>
                <p>Incorrect Password!</p>
            </div><br>";
        }
    } else {
        echo "<div class='message'>
            <p>User not found!</p>
        </div><br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login page</title>
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <h1>Login</h1>

            <label for="email">Email</label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="psw">Password</label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            </label>

            <p>You don't have an account? Click here to <a href="createaccount.php" style="color:dodgerblue">Sign Up</a>.</p>

            <div class="clearfix">
                <button type="submit" class="signupbtn" name="submit">Login</button>
            </div>
        </div>
    </form> 
</body>
</html>
