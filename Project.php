<?php

class Project
{
    private string $name;
    private string $description;
    private $id;
    private bool $toEdit;

    public function __construct(string $title,string $description)
    {
        $this->name = $title;
        $this->description = $description;
        $this->id = -1;
        $this->toEdit = false;
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
     * @return bool
     */
    public function Edit() : bool
    {
        return $this->toEdit;
    }

    public function setEdit(bool $e)
    {
        $this->toEdit = $e;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

}