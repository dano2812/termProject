<?php

require "DBStorage.php";
$Storage = new DBStorage();

$uname = $_POST['username'];
$password = $_POST['password'];

if ($uname != "" && $password != ""){

    if($Storage->saveUser(new User($uname, $password)) == true)
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
}