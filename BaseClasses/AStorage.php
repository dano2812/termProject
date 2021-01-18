<?php
declare(strict_types=1);

class AStorage
{
    private string $filepath = "proj.csv";

    /**
     * @return Project[]
     */

    public function getAll() : array
    {
        $projects = [];
        if(($handle = fopen($this->filepath, "r")) !== false)
        {
            while(($data = fgetcsv($handle, 1000,",")) !== false)
            {
                $projects = new Project($data[0], $data[1]);
            }
            fclose($handle);
        }
        return $projects;
    }

    public function createProject(string $title, string $description) : Project
    {
        if(($handle = fopen($this->filepath, "a")) !==false)
        {
            fputcsv($handle, [$title, $description], ",");
            fclose($handle);
        }

        return new Project($title, $description);
    }
}