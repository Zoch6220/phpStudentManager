<?php

class Student
{
    private $student_id;
    private $full_name;
    private $organization;
    private $address;
    private $city;
    private $state_province;
    private $telephone;
    private $email;
    private $dob;

    public function __construct($student_id, $full_name, $organization, $address, $city, $state_province, $telephone, $email, $dob)
    {
        $this->student_id = $student_id;
        $this->full_name = $full_name;
        $this->organization = $organization;
        $this->address = $address;
        $this->city = $city;
        $this->state_province = $state_province;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->dob = $dob;
    }

    public function getStudentId()
    {
        return $this->student_id;
    }

    public function getFullName()
    {
        return $this->full_name;
    }

    public function getOrganization()
    {
        return $this->organization;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getStateProvince()
    {
        return $this->state_province;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getDob()
    {
        return $this->dob;
    }
}