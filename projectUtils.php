<?php
require "DBStorage.php";
$Storage = new DBStorage();

if(isset($_POST['newproj']) && $_POST['newproj'] === "newproj" &&
    isset($_POST['projname']) && isset($_POST['descr']))
{
    $Storage->saveProject($Storage->createProject($_POST['projname'], $_POST['descr']));
    echo 1;
}
else if(isset($_POST['delproj']) && $_POST['delproj'] === "delproj")
{
    $Storage->deleteProjectById($_POST["id"]);
    echo 1;
}
else if(isset($_POST['editproj']))
{
    $Storage->updateProject($_POST['editproj'], $_POST['projname'], $_POST['descr']);
    echo 1;
}
else
{
    echo 0;
}

