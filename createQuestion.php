<?php
//require "Question.php";
require "DBStorage.php";

$mail = $_POST['mail'];
$text = $_POST['text'];

if ($mail != "" && $text != "")
{
    $question = new Question($mail, $text);

    if($question->checkMailFormat())
    {
        $storage = new DBStorage();
        $storage->createQuestion($question);
        echo 1;
    }
    else
    {
        echo 0;
    }

}