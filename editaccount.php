<?php
session_start();
include("php/config.php");

if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
    exit(); // Terminate script execution after redirection
}

if (isset($_POST['submit'])) {
    // Process form submission
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $dateOfBirth = $_POST['dateOfBirth'];

    // Check if 'Id' key exists in the session array before accessing it
    $id = isset($_SESSION['Id']) ? $_SESSION['Id'] : null;
    
    if ($id) {
        // Use prepared statement to prevent SQL injection
        $edit_query = mysqli_prepare($con, "UPDATE users SET Username=?, Email=?, Dateofbirth=? WHERE Id=?");

        if ($edit_query) {
            mysqli_stmt_bind_param($edit_query, "sssi", $userName, $email, $dateOfBirth, $id);
            mysqli_stmt_execute($edit_query);

            if (mysqli_stmt_affected_rows($edit_query) > 0) {
                echo "<div class='message'>
                    <p>You have updated successfully</p>
                    </div><br>";
                echo "<a href='home.php'><button class='btn'>Go home</button></a>";
            } else {
                echo "Error updating record: " . mysqli_stmt_error($edit_query);
            }

            mysqli_stmt_close($edit_query);
        } else {
            echo "Error preparing statement: " . mysqli_error($con);
        }
    } else {
        echo "User ID not found in session.";
    }
} else {
    // Display form for editing profile
    $id = isset($_SESSION['Id']) ? $_SESSION['Id'] : null;

    if ($id) {
        $query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");

        if ($query) {
            $results = mysqli_fetch_assoc($query);
            $res_Uname = $results['Username'];
            $res_Email = $results['Email'];
            $res_Birth = $results['Dateofbirth'];
        } else {
            echo "Error fetching user data: " . mysqli_error($con);
        }
    } else {
        echo "User ID not found in session.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Account</title>
</head>
<body>
    <form action="" method="post">
        <!-- Form fields and HTML structure -->
    </form>
</body>
</html>

<?php } ?>
