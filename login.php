
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<h2>Modal Login Form</h2>
    , initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login page</title>
</head>
<body>

  <?php
  include("php/config.php");
  if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $psw = mysqli_real_escape_string($con,$_POST['psw']);

    $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$psw'" ) or die("Error occured please try again");
   $row = mysqli_fetch_assoc($result);
   if(is_array($row) && ! empty($row)){
     $_SESSION['valid'] = $row['Email'];
     $_SESSION['uersName'] = $row['Username'];
     $_SESSION['id'] = $row['Id'];
   }else{
    echo  "<div class = 'message'>
    <p> Wrong Username or Password !</p>
    </div> <br>";
    echo "<a href = 'login.php'> <button class = 'btn'>Go Back</button>";

   }
   if(isset($_SESSION['valid'])){
     reader("Location:home.php");
   }
  
  }
  // else{
  ?>
    
  <form action="" method="post">
      <div class="container">
        <h1>Login </h1>
        <!-- <p>Please .</p> -->
        
        <label for="email">Email</label>
        <input type="text" placeholder="Enter Email" name="email" required>
    
        <label for="psw">Password</label>
        <input type="password" placeholder="Enter Password" name="psw" required>
    
        <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>
    
        <p>You don't account click here <a href="createaccount.php" style="color:dodgerblue">Sign Up</a>.</p>
    
        <div class="clearfix">
          <button type="button" class="cancelbtn">Cancel</button>
          <button type="submit" class="signupbtn">Login</button>
        </div>
      </div>
    </form> 
  <?php}?>
    
</body>
</html>