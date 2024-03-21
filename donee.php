<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="donee.css">
    <title>Donee</title>
</head>
<body>
    <p class="paragraph">Lorem ipsum dolor sit amet consectetur, adipisicing elit
         Sit commodi repellendus adipisci sunt dolorem quis libero
          provident dicta modiratione iste in quaerat, beatae quibusdam
         cum expedita! Distinctio, exercitationem illo?</p>
         <?php
include("php/config.php");
if(isset($_POST['submit'])){
    $donorName = $_POST['doneeName'];
    $email = $_POST['email'];
    $items = $_POST['item'];
    $number = $_POST['number'];
    $date = $_POST['date'];
    $location = $_POST['address'];
    $contact = $_POST['contact'];
    
       // Verifying the unique email
       $verify_query = mysqli_query($con, "SELECT Email FROM donee WHERE Email='$email'");
       if(mysqli_num_rows($verify_query) != 0){
           echo "<div class='message'>
           <p>This email is already in use. Please try another one.</p>
           </div><br>";
           echo "<a href='javascript:history.back()'><button class='btn'>Go Back</button></a>";
       }
       else{
           mysqli_query($con, "INSERT INTO donee(DoneeName, Email, Item,Number,Date,Address,Contact) VALUES('$donorName','$email','$items','$number','$date','$location','$contact')") or die("Error occurred while inserting data: " . mysqli_error($con));
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
                <h1>Donee</h1>
                <p>Please fill in this form  to post your request</p>
        
                <label for="doneeName">Donee name</label>
                <input type="text" placeholder="Enter Donee Name" name="doneeName" required>
        
                <label for="email">Email</label>
                <input type="text" placeholder="Enter Email" name="email" required>
        
                <label for="item">Item name received</label>
                <input type="text" placeholder="Enter item name" name="item" required>
        
                <label for="number">Enter number of items received</label>
                <input type="number" placeholder="Number of items donated" name="number" required>
        
                <label for="date">Enter the date of Donation</label>
                <input type="date" placeholder="Choose the date" name="date" required>
                  
                <label for="address">Enter your location</label>
                <input type="text" placeholder="Enter location" name="address" required>

                <label for="contact">Please Enter your contact number</label>
                <input type="number" placeholder="Contact number" name="contact" required>
                   
                <div class="clearfix">
                    <button type="button" class="cancelbtn">Cancel</button>
                    <button type="submit" class="signupbtn" name="submit">Submit</button>
                </div>
            </div>
        </form> 
    </div>
     <?php } ?> 
</body>
</html>
