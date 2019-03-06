<?php
//Milestone 3
//Emily Quevedo
//February 20, 2019
//This is my own work

/* Contact Object Model */
namespace App\Models;

class ContactModel {
    private $id;
    private $businessEmail;
    private $phone;
    private $aboutMe;
    private $streetAddress;
    private $city;
    private $state;
    private $zipcode;
    private $user_id;
    
    public function __construct($id, $businessEmail, $phone, $aboutMe, $streetAddress, $city, $state, $zipcode, $user_id) {
        $this->id = $id;
        $this->businessEmail = $businessEmail;
        $this->phone = $phone;
        $this->aboutMe = $aboutMe;
        $this->streetAddress = $streetAddress;
        $this->city = $city;
        $this->state = $state;
        $this->zipcode = $zipcode;
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
    public function getBusinessEmail()
    {
        return $this->businessEmail;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getAboutMe()
    {
        return $this->aboutMe;
    }

    /**
     * @return mixed
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
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
    public function getZipcode()
    {
        return $this->zipcode;
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
     * @param mixed $businessEmail
     */
    public function setBusinessEmail($businessEmail)
    {
        $this->businessEmail = $businessEmail;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @param mixed $aboutMe
     */
    public function setAboutMe($aboutMe)
    {
        $this->aboutMe = $aboutMe;
    }

    /**
     * @param mixed $streetAddress
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;
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
     * @param mixed $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @param mixed $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }


}