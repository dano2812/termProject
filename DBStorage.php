<?php
declare(strict_types=1);
session_start();
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
/*
    public function deleteProjectByName($name)
    {
        $sql = 'DELETE FROM projectstable WHERE name=?';
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([$name]);
    }*/

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

    public function saveUser(User $user)
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, password, isadmin) VALUES(?,?,?)");
        $stmt->execute([$user->getName(), $user->getPassword(), 0]);
    }

    public function checkUser(string $name, string $password): User
    {
        $stmt = $this->pdo->prepare("SELECT * users where name=?");
        $stmt->execute([$name]);
        //$stmt = $this->pdo->query("select * from users");
        $user = new User("","");
        //$projectCnt = 0;
        while($row = $stmt->fetch())
        {
            if(password_hash($password, PASSWORD_DEFAULT) == $row['password'])
            {
                $user = new User($row['name'],$row['password']);
                $user->setAdmin($row['isadmin']);
                $user->setPassword($row['password']);
            }


        }

        return $user;
    }
}