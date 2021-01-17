<?php


class User
{
    private string $name;
    private string $password;
    private int $isAdmin;

    public function __construct(string $name,string $password)
    {
        $this->name = $name;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->isAdmin = 0;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return bool
     */
    public function getAdmin(): bool
    {
        return ($this->isAdmin == 0) ? false : true;
    }

    public function setAdmin(string $admin)
    {
        $this->isAdmin = $admin;
    }

    public function setPassword(string $pass)
    {
        $this->password = $pass;
    }

}