<?php

session_start();
if (!(!isset($_SESSION['username']) || empty($_SESSION['username']))) {
    $_SESSION['uname'] = $_SESSION['uname'];
}
?>
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
                    <a class="nav-link" href="ProjectsAlt.php">Projects <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="contact.php">Contact <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="career.php">Career <span class="sr-only">(current)</span></a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
            <?php
            if(isset($_SESSION['uname'])){ ?>
                <label><?php echo $_SESSION['uname']; ?></label>
                <a class="btn btn-outline-success my-2 my-sm-0" href="logout.php">Log out </a>
            <?php } else { ?>
                <a class="btn btn-outline-success my-2 my-sm-0" href="login.php" >Log in </a>
                <a class="btn btn-outline-success my-2 my-sm-0" href="signup.php" >Sign up </a>
            <?php } ?>
            </form>
        </div>
    </nav>
</div>
