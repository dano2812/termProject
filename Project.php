<?php
require "AStorage.php";
$Astorage = new AStorage();

class Project
{
    private string $title;
    private string $description;

    public function __construct(string $title,string $description)
    {
        $this->title = $title;
        $this->description = $description;
    }


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

}