<?php
//Milestone 3
//Emily Quevedo
//February 20, 2019
//This is my own work

/* Education Object Model */
namespace App\Models;

class EducationModel {
    private $id;
    private $degree;
    private $schoolName;
    private $city;
    private $state;
    private $graduationYear;
    private $user_id;
    
    public function __construct($id, $degree, $schoolName, $city, $state, $graduationYear, $user_id) {
        $this->id = $id;
        $this->degree = $degree;
        $this->schoolName = $schoolName;
        $this->city = $city;
        $this->state = $state;
        $this->graduationYear = $graduationYear;
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
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * @return mixed
     */
    public function getSchoolName()
    {
        return $this->schoolName;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return mixed
     */
    public function getGraduationYear()
    {
        return $this->graduationYear;
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
     * @param mixed $degree
     */
    public function setDegree($degree)
    {
        $this->degree = $degree;
    }

    /**
     * @param mixed $schoolName
     */
    public function setSchoolName($schoolName)
    {
        $this->schoolName = $schoolName;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @param mixed $graduationYear
     */
    public function setGraduationYear($graduationYear)
    {
        $this->graduationYear = $graduationYear;
    }

    /**
     * @param mixed $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }
}