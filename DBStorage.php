<?php
declare(strict_types=1);
//session_start();
require "AStorage.php";
require "Project.php";
require "user.php";

class DBStorage
{
    private string $user = "root";
    private string $pass = "dtb456";
    private string $db = "projects";
    private string $host = "localhost";

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

    }
    public function getAllProjects():array
    {
        $stmt = $this->pdo->query("select * from projectstable");
        $projects = [];
        $projectCnt = 0;
        while($row = $stmt->fetch())
        {
            $project = new Project($row['name'],$row['description']);
            $project->setId($row['id']);
            $projects[] = $project;
            $projectCnt = $projectCnt +1;
        }

        return $projects;
    }

    public function createProject(string $name, string $description): Project
    {
        return new Project($name, $description);
    }

    public function saveProject(Project $project)
    {
        $stmt = $this->pdo->prepare("INSERT INTO projectstable (name, description) VALUES(?,?)");
        $stmt->execute([$project->getTitle(), $project->getDescription()]);
    }

    public function deleteProjectById($id)
    {
        $sql = 'DELETE FROM projectstable WHERE id=?';
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function updateProject(int $id, string $name, string $description)
    {
        $sql = 'UPDATE projectstable SET projectstable.name=?, projectstable.description=? WHERE projectstable.id=?';
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([$name, $description, $id]);
    }

    public function createUser(string $name, string $password): User
    {
        return new User($name, $password);
    }

    public function saveUser(User $u): bool
    {
        $stmt = $this->pdo->prepare("SELECT * from users where name=?");
        $stmt->execute([$u->getName()]);
        if(($row = $stmt->fetch()))
        {
            return false;
        }
        $sql = 'INSERT INTO users (name, password, isadmin) VALUES(?,?,?)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$u->getName(), $u->getPassword(), 0]);
        return true;
    }

    public function checkUser(string $name, string $password): User
    {
        $sql = 'SELECT * from users where name=?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name]);
        $u = new User("","");

        while($row = $stmt->fetch())
        {
            if(password_verify($password, $row['password'] ))
            {
                $u = new User($row['name'],$password);
                $u->setAdmin($row['isadmin']);
                $u->setPassword($row['password']);
                return $u;
            }
        }

        return $u;
    }
}