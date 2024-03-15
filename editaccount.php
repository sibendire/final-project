<?php
session_start();
include("php/config.php");
 if(!isset($_SESSION['valid'])){
     reader("Location:login.php")
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<h2>Modal Login Form</h2>
    , initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_POST['submit'])){
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $dateOfBirth = $_POST['dateOfBirth'];

    $id = $_SESSION['Id'];
    $edit_query = mysqli_query($con,"UPDATE users SET Username='$userName',Email='$email',Dateofbirth='$dateOfBirth' WHERE Id=$id") or die("Error occured please!");
    if($edit_query){
        echo  "<div class = 'message'>
        <p> You have updated  successfully</p>
        </div> <br>";
        echo "<a href = 'home.php'> <button class = 'btn'>Go home</button>";

    }
}
else{
    $id = $_SESSION['id'];
    $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");
    while($results = mysqli_fetch_assoc($query)){
        $res_Uname = $results['Username'];
        $res_Email = $results['Email'];
        $res_Birth = $results['Dateofbirth'];
    }
?>
  <form action="" method="post">
    <div class="container">
        <h1>Change profile</h1>
        <p>Please fill in this form to update  your  account.</p>

        <label for="userName">Username</label>
        <input type="text" placeholder="Enter Username" name="userName" id="username" value="<?php echo $res_Uname;?>" required>

        <label for="email">Email</label>
        <input type="text" placeholder="Enter Email" name="email" value="<?php echo $res_Email;?>" required>

        <label for="dateOfBirth">Date of birth</label>
        <input type="date" placeholder="Enter date of birth" name="dateOfBirth" value="<?php echo $res_Birth;?>" required>

        <label for="psw">Password</label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
            <button type="button" class="cancelbtn">Cancel</button>
            <button type="submit" class="signupbtn">update</button>
        </div>
    </div>
</form> 
    <?php}?>
</body>
</html>