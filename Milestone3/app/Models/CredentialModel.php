<?php
//Milestone 3
//Emily Quevedo
//February 20, 2019
//This is my own work

/* Credential Object Model  */
namespace App\Models;

class CredentialModel {
    private $id;
    private $username;
    private $password;
    private $role;
    private $active;
    
    public function __construct($id, $username, $password, $role, $active) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
        $this->active = $active;
    }
    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    
    
}

