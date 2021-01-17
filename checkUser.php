<?php

include "DBStorage.php";
$Storage = new DBStorage();

$uname = $_POST['username'];
$password = $_POST['password'];

if ($uname != "" && $password != ""){

    $user = $Storage->checkUser($uname, $password);

    if($user->getName() != ""){
        $_SESSION['uname'] = $uname;
        echo 1;
    }else{
       echo 0;
    }

}
