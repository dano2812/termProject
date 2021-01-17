<?php
require "DBStorage.php";
$Storage = new DBStorage();
?>

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
    <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="login.js" type="text/javascript"></script>
</head>
<body>

    <div class="pageWrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">DK</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Projects.php">Projects <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="contact.html">Contact <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="career.html">Career <span class="sr-only">(current)</span></a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a class="btn btn-outline-success my-2 my-sm-0" href="login.php" type="submit">Log in </a>
                    <a class="btn btn-outline-success my-2 my-sm-0" href="signup.php" type="submit">Sign up </a>
                </form>
            </div>

        </nav>
    </div>

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

        <h1 class="h3 mb-3 fw-normal">Please log in</h1>
        <label for="inputEmail" class="visually-hidden projname">Email address</label>
        <input type="email" class="form-control projname" id="txt_uname" name="txt_uname" placeholder="Email address" required="" autofocus="">
        <label for="inputPassword" class="visually-hidden">Password</label>
        <input type="password" class="form-control projname" id="txt_pwd" name="txt_pwd" placeholder="Password" required="">
        <div class="checkbox mb-3"></div>
        <div id="message" class="text-danger"></div>
        <div class="checkbox mb-3"></div>
        <input class="btn-primary submitlogin" value="Submit" type="button" name="but_submit" id="but_submit"></input>
    </div>
</body>
</html>