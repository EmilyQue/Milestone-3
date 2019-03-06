<?php
//Milestone 3
//Emily Quevedo
//February 20, 2019
//This is my own work

/* User Model Object */
namespace App\Models;

class UserModel {
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $username;
    private $password;
    private $role;
    private $active;

    public function __construct($id, $firstname, $lastname, $email, $username, $password, $role, $active) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
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
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
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

    public function getRole() {
        return $this->role;
    }
    
    public function getActive() {
        return $this->active;
    }
    
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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

    public function setRole($role) {
        $this->role = $role;
    }
    
    public function setActive($active) {
        $this->active = $active;
    }


}

