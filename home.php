<?php
session_start();
include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
    exit(); // Ensure script stops executing after redirect
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
</head>
<body>
  
    <div class="containers">
        <nav class="nav-bar">
            <div class="left-item">
                <a href="home.php">Home</a>
                <a href="donee.php">Donnee</a>
                <a href="donation.php">Donor</a>
                <a href="login.php">Login</a>
                <a href="logout.php">logout</a>
                <a href="editaccount.php">Update profile</a>
                <a href="editdonation.php">Edit Donor</a>
                <a href="editdonee.php">Edit Donee</a>
            </div>
        </nav>
    </div>

    <div class="im">
        <h2>HTML Image</h2>
    </div>
    <img src="Images/needy5.jpg" alt="Trulli" width="850" height="400px">
    <div class="more">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque molestiae, doloremque officiis expedita quia, pariatur sapiente voluptatibus repudiandae reprehenderit repellat omnis nisi ab possimus dolore commodi unde minus, error est!
    </div>

    <button type="donate">Donate</button>
    <div class="photo">
        <br>
        <p class="heading">Our Works</p>
        <br>
        <p style="font-size: 28px; text-align: center;">"Look what we can do together."</p>
        <br>
        <div class="wrapper">
            <div class="box"><img src="images/needy1.jpg" alt=""></div>
            <div class="box"><img src="images/needy5.jpg" alt=""></div>
            <div class="box"><img src="images/needy7.jpg" alt=""></div>
        </div>
        <!-- <p style="font-size: 19px;"> The basic concept of this project  Food Waste Management is to collect theexcess/leftover food from donors such as hotels, restaurants, marriage halls, etc and distribute to  the  needy people .
        </p> -->
        <br>
    </div>

    <!-- FOOTER SECTION -->
    <footer class="footer">
        <div class="footer-left col-md-4 col-sm-6">
            <p class="about">
                <span> About us</span>The core principle driving our initiative is the seamless connection between surplus resources and those in need. With intuitive interfaces and community engagement, we aim to facilitate impactful giving, uniting hearts for a better tomorrow
            </p>
        </div>
        <div class="footer-center col-md-4 col-sm-6">
            <div>
                <p><span> Contact</span> </p>
            </div>
            <div>
                <p> (+256)708332127</p>
            </div>
            <div>
                <!-- <i class="fa fa-envelope" style="font-size: 17px; line-height: 38px; color:white;"></i> -->
                <p><a href="#"> nkbksharon@gmail.com</a></p>
            </div>
            <div class="sociallist">
                <ul class="social">
                    <li><a href="https://www.facebook.com/TheAkshayaPatraFoundation/"><img src="https://i.ibb.co/x7P24fL/facebook.png"></a></li>
                    <li><a href="https://twitter.com/globalgiving"><img src="https://i.ibb.co/Wnxq2Nq/twitter.png"></a></li>
                    <li><a href="https://www.instagram.com/charitism/"><img src="https://i.ibb.co/ySwtH4B/instagram.png"></a></li>
                    <li><a href="https://web.whatsapp.com/"><i class="fa fa-whatsapp" style="font-size:50px;color: black;"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-right col-md-4 col-sm-6">
            <h2> DONATE<span> TODAY</span></h2>
            <!-- <h2>Food donate</h2> -->
            <p class="menu">
                <a href="home.php"> Home</a> |



</body>
</html>
