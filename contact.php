<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DK-Semestralny projekt Contact</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/contact.css">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="jquery-3.2.1.min.js"></script>
    <script src="contact.js"></script>
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

<div class="centered">
    <h2>Daniel Kopúň production</h2>
    <p>Pers. no.: 557116</p>
    <p>Email: daniel.kopun@gmail.com</p>
    <p>Address: Vysokoškolákov 20, Žilina</p>

    <div class="questions">
        <label class="visually-hidden projname">If you have any question, contact us, please.</label>
    </div>

    <div id="message" class="text-danger"></div>
    <input type="email" class="form-control projname" id="txt_mail" name="txt_mail" placeholder="Your email address" required="" autofocus="">
    <textarea class="form-control" id="txt_question" name="txt_question" rows="3" placeholder="Text"></textarea>
    <button type="submit" class=" form-control btn btn-primary" id="btn_question" name="btn_question">Send</button>
</div>

<div class="split right">
    <div class="centered">
        <h2>DK</h2>
        <p>Term Project</p>
    </div>
</div>

</body>
</html>