<?php
//Milestone 3
//Emily Quevedo
//February 20, 2019
//This is my own work

/* Job Object Model */
namespace App\Models;

class JobModel {
    private $id;
    private $jobTitle;
    private $position;
    private $description;
    private $companyName;
    private $city; 
    private $state;
    private $datePosted;
    

    
    public function __construct($id, $jobTitle, $position, $jobDescription, $employerName, $employerCity, $employerState, $datePosted) {
        $this->id = $id;
        $this->jobTitle = $jobTitle;
        $this->position = $position;
        $this->description = $jobDescription;
        $this->companyName = $employerName;
        $this->city = $employerCity;
        $this->state = $employerState;
        $this->datePosted = $datePosted;
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
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
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
    public function getDatePosted()
    {
        return $this->datePosted;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $jobTitle
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
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
     * @param mixed $datePosted
     */
    public function setDatePosted($datePosted)
    {
        $this->datePosted = $datePosted;
    }


    

    
}