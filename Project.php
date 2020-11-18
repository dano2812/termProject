<?php


class Project
{
    private string $title;
    private string $description;
    private int $id;

    public function __construct(string $title,string $description)
    {
        $this->title = $title;
        $this->description = $description;
        $this->id = -1;
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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

}