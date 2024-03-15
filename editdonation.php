<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="donation.css">
    <title>Donation</title>
</head>
<body>
<?php
if(isset($_POST['submit'])){
    $donorName = $_POST['donorName'];
    $email = $_POST['email'];
    $items = $_POST['itmes'];
    $photo = $_POST['photo'];
    $number = $_POST['number'];
    $email = $_POST['date '];
    $location = $_POST['location'];
    $contact = $_POST['contact'];

    $id = $_SESSION['Id'];
    $edit_query = mysqli_query($con,"UPDATE donor SET Donorname='$userName',Email='email' 
    ,Items='$items',Photo='$photo',Number='$number',Date='$date',Location='$location',Contact='$contact'
    WHERE Id=$id") or die("Error occured please!");
    if($edit_query){
        echo  "<div class = 'message'>
        <p> You have updated  successfully</p>
        </div> <br>";
        echo "<a href = 'home.php'> <button class = 'btn'>Go home</button>";

    }
}
else{
    $id = $_SESSION['id'];
    $query = mysqli_query($con,"SELECT*FROM donor WHERE Id=$id");
    while($results = mysqli_fetch_assoc($query)){
        $res_Uname = $results['Username'];
        $res_Email = $results['Email'];
        $res_Items = $results['Items'];
        $res_Photo = $results['Photo'];
        $res_Number = $results['Number'];
        $res_Date = $results['Date'];
        $res_Location = $results['Location'];
        $res_Contact = $results['Contact'];

    }
?>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
         Sit commodi repellendus adipisci sunt dolorem quis libero
          provident dicta modi ratione iste in quaerat, beatae quibusdam
         cum expedita! Distinctio, exercitationem illo?</p>
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