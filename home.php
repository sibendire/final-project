
<?php
session_start();
include("php/config.php");
 if(!isset($_SESSION['valid'])){
     reader("Location:login.php");
 }
 else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home </title>
</head>
<body>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="#contact">Contact</a></li>
        <li style="float:center"><a href="#donate">Donate</a></li>
        <li style="float:right"><a class="active" href="login.php">login</a></li>
      </ul>
      <h2>HTML Image</h2>
<img src="Images/needy5.jpg" alt="Trulli" width="850" height="400px">
<div class="p">
   Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque molestiae, doloremque officiis expedita quia, pariatur sapiente voluptatibus repudiandae reprehenderit repellat omnis nisi ab possimus dolore commodi unde minus, error est!
    </div>
    <?php}?>
</body>
</html>