<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DK-Semestralny projekt Projects</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="Projects.css">
    <link rel="stylesheet" href="login.css">
    <!-- jQuery and JS bundle w/ Popper.js -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="jquery-3.2.1.min.js"></script>
    <script src="signup.js"></script>
</head>
<body>

<?php
    require "head.php"
?>

<div class="split left">
    <div class="centered">
        <h2>DK</h2>
        <p>Term Project</p>
    </div>
</div>

<div class="split right">
    <div class="centered">
        <h2>DK</h2>
        <p>Term Project</p>
    </div>
</div>

<div  class="leftMiddle">

    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
    <label for="txt_uname" class="visually-hidden projname">User name</label>
    <input type="email" class="form-control projname" id="txt_uname" name="txt_uname" placeholder="User name" required="" autofocus="">

    <label for="txt_pwd" class="visually-hidden">Password</label>
    <input type="password" class="form-control projname" id="txt_pwd" name="txt_pwd" placeholder="Password" required="">

    <label for="txt_pwd2" class="visually-hidden">Password again</label>
    <input type="password" class="form-control projname" id="txt_pwd2" name="txt_pwd2" placeholder="Password" required="">

    <div id="message" class="text-danger mb-3"></div>

    <input class="btn-primary submitlogin" value="Submit" type="button" name="but_submit" id="but_submit">
</div>
</body>
</html>