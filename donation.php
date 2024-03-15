<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="donation.css">
    <title>Donation</title>
</head>
<body>

    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
         Sit commodi repellendus adipisci sunt dolorem quis libero
          provident dicta modi ratione iste in quaerat, beatae quibusdam
         cum expedita! Distinctio, exercitationem illo?</p>
         
         <?php
include("php/config.php");
if(isset($_POST['submit'])){
    $donorName = $_POST['donerName'];
    $email = $_POST['email'];
    $items = $_POST['items'];
    $photo = $_POST['photo'];
    $number = $_POST['number'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    
       // Verifying the unique email
       $verify_query = mysqli_query($con, "SELECT Email FROM donor WHERE Email='$email'");
       if(mysqli_num_rows($verify_query) != 0){
           echo "<div class='message'>
           <p>This email is already in use. Please try another one.</p>
           </div><br>";
           echo "<a href='javascript:history.back()'><button class='btn'>Go Back</button></a>";
       }
       else{
           mysqli_query($con, "INSERT INTO donor(DonorName, Email, Items,Photo,Number,Date,Location,Contact) VALUES('$donorName','$email','$items',$photo,'$number','$date','$location','$contact')") or die("Error occurred while inserting data: " . mysqli_error($con));
           echo "<div class='message'>
           <p>Your content saved successfully.</p>
           </div><br>";
           echo "<a href='login.php'><button class='btn'>Login Now</button></a>";
       }
    }
   
   else{
   ?>

         <div class="donation">
         <form action="" method="post">
            <div class="container">
                <h1> profile</h1>
                <p>Please fill in this form.</p>
        
                <label for="donorName">Username</label>
                <input type="text" placeholder="Enter Username" name="donorName" required>
        
                <label for="email">Email</label>
                <input type="text" placeholder="Enter Email" name="email" required>
        
                <label for="items">Item name donated</label>
                <input type="text" placeholder="Enter item name" name="items" required>
        
                
                <label for="photo">Item photo</label>
                <input type="file" placeholder="upload photos" name="photo">
        

                <label for="number">Enter number of items donated</label>
                <input type="number" placeholder="Number of items donate" name="number" required>
        
                <label for="date">Enter the date of Donation</label>
                <input type="date" placeholder="chose the date" name="date" required>
                  
                <label for="location">Enter your location</label>
                <input type="text" placeholder="Enter location" name="location" required>

                <label for="contact">Please Enter your contact number</label>
                <input type="number" placeholder="Number of items donate" name="contact" required>
                   
                <div class="clearfix">
                    <button type="button" class="cancelbtn">Cancel</button>
                    <button type="submit" class="signupbtn">update</button>
                </div>
            </div>
        </form> 
    </div>
    <?php}?>
</body>
</html>