<?php
declare(strict_types=1);

require "AStorage.php";
require "Project.php";

class DBStorage extends AStorage
{
    private string $user = "root";
    private string $pass = "dtb456";
    private string $db = "projects";
    private string $host = "localhost";

    public int $projectCnt;

    private PDO $pdo;
    public function __construct()
    {
        try{
            $this->pdo = new PDO("mysql:dbname={$this->db};host={$this->host}",$this->user,$this->pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
        } catch (PDOException $e){
            echo 'Connection failed: ' . $e->getMessage();
        }
        $projectCnt = 0;

    }
    public function getAll():array
    {
        $stmt = $this->pdo->query("select * from projectstable");
        $projects = [];
        $projectCnt = 0;
        while($row = $stmt->fetch())
        {
            $project = new Project($row['Name'],$row['Description']);
            $project->setId($row['ID']);
            $projects[] = $project;
            $projectCnt = $projectCnt +1;
        }

        return $projects;
    }

    public function createProject(string $name, string $description): Project
    {
        $project = new Project($name, $description);
        return $project;
    }

    public function saveProject(Project $project)
    {
        $stmt = $this->pdo->prepare("INSERT INTO projectstable (Name, Description) VALUES(?,?)");
        $stmt->execute([$project->getTitle(), $project->getDescription()]);
    }

    public function deleteProjectById($id)
    {
        //DELETE FROM MyGuests WHERE id=3
        $sql = "DELETE FROM projectstable WHERE ID=$id";
        $stmt = $this->pdo->query("$sql");
    }

    public function deleteProjectByName($name)
    {
        $sql = "DELETE FROM projectstable WHERE Name=$name";
        $stmt = $this->pdo->query("$sql");
    }
}