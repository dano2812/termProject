<?php

require "BaseClasses/DBStorage.php";
$Storage = new DBStorage();

$uname = $_POST['username'];
$password = $_POST['password'];

if ($uname != "" && $password != "")
{
    $user = $Storage->checkUser($uname, $password);

    if($user->getName() != "")
    {
        session_start();
        $_SESSION['uname'] = $uname;
        echo 1;
    }
    else
    {
       echo 0;
    }

}
