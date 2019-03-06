<?php
//Milestone 3
//Emily Quevedo
//February 20, 2019
//This is my own work

/* Skills Object Model */
namespace App\Models;

class SkillsModel {
    private $id;
    private $userSkill;
    private $user_id;
    
    public function __construct($id, $userSkill, $user_id) {
        $this->id = $id;
        $this->userSkill = $userSkill;
        $this->user_id = $user_id;
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
    public function getUserSkill()
    {
        return $this->userSkill;
    }

    /**
     * @return mixed
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $userSkill
     */
    public function setUserSkill($userSkill)
    {
        $this->userSkill = $userSkill;
    }

    /**
     * @param mixed $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    
}