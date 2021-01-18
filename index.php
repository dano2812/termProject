<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DK-Semestralny projekt Home</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/home.css">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="slideshow.js"></script>
</head>
<body>

<?php
require "head.php"
?>

<div class="slideshow-container">
    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
        <div class="numbertext">1 / 4</div>
        <img src="Resources/building4.jpg" style="width:100%" alt="img1">
        <!--<div class="text">Caption One</div>-->
    </div>
    <div class="mySlides fade">
        <div class="numbertext">2 / 4</div>
        <img src="Resources/building2.jpg" style="width:100%" alt="img2">
        <!--div class="text">Caption Two</div>-->
    </div>
    <div class="mySlides fade">
        <div class="numbertext">3 / 4</div>
        <img src="Resources/building3.jpg" style="width:100%" alt="img3">
        <!--<div class="text">Caption Three</div>-->
    </div>
    <div class="mySlides fade">
        <div class="numbertext">4 / 4</div>
        <img src="Resources/building1.jpg" style="width:100%" alt="img4">
        <!--<div class="text">Caption Three</div>-->
    </div>
</div>

<div class="centered">
    <div class="text">Create your own home</div>
    <div>
        <a class="btn btn-secondary" href="ProjectsAlt.php" role="button">Projects</a>
    </div>

</div>
<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
<br>

<script>
    showSlides(0);
</script>

</body>
</html>