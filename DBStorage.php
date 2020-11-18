<?php
declare(strict_types=1);

class DBStorage extends AStorage
{
    private $user = "root";
    private $pass = "dtb456";
    private $db = "projects";
    private $host = "localhost";

    private PDO $pdo;
    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname($this->db);host=($this->host)",$this->user,$this->pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    }
    public function getAll():array
    {
        $stmt = $this->pdo->query("SELECT * FROM projects");
        $projects = [];
        while($row = $stmt->fetch())
        {
            $projects = new Project($row['Title'],$row['Description']);
        }
    }

    public function createProject(string $title, string $description): void
    {
        //parent::createProject($title, $description); // TODO: Change the autogenerated stub
    }

    public function saveProject(Project $project)
    {
        $stmt = $this->pdo->prepare("INSERT INTO projects (Name, Description) VALUES(?,?)");
        $stmt->execute([$project->getTitle(), $project->getDescription()]);
    }
}