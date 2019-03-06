<?php
//Milestone 3
//Emily Quevedo
//February 20, 2019
//This is my own work

/* Job History Object Model*/
namespace App\Models;

class JobHistoryModel {
    private $id;
    private $previousJobTitle;
    private $previousJobDescription;
    private $startDate;
    private $endDate;
    private $companyName;
    private $city;
    private $state;
    private $user_id;
    
    public function __construct($id, $previousJobTitle, $previousJobDescription, $startDate, $endDate, $companyName, $city, $state, $user_id) {
        $this->id = $id;
        $this->previousJobTitle = $previousJobTitle;
        $this->previousJobDescription = $previousJobDescription;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->companyName = $companyName;
        $this->city = $city;
        $this->state = $state;
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
    public function getPreviousJobTitle()
    {
        return $this->previousJobTitle;
    }

    /**
     * @return mixed
     */
    public function getPreviousJobDescription()
    {
        return $this->previousJobDescription;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
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
     * @param mixed $previousJobTitle
     */
    public function setPreviousJobTitle($previousJobTitle)
    {
        $this->previousJobTitle = $previousJobTitle;
    }

    /**
     * @param mixed $previousJobDescription
     */
    public function setPreviousJobDescription($previousJobDescription)
    {
        $this->previousJobDescription = $previousJobDescription;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
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
     * @param mixed $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    
}