<?php

class Project
{
    private string $name;
    private string $description;
    private $id;

    public function __construct(string $title,string $description)
    {
        $this->name = $title;
        $this->description = $description;
        $this->id = -1;
    }


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

}