<?php

class Course
{
    private $course_code;
    private $course_name;
    private $description;

    public function __construct($course_code, $course_name, $description)
    {
        $this->course_code = $course_code;
        $this->course_name = $course_name;
        $this->description = $description;
    }

    public function getCourseCode()
    {
        return $this->course_code;
    }

    public function getCourseName()
    {
        return $this->course_name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setCourseCode($id)
    {
        $this->course_code = $id;
    }

    public function setCourseName($name)
    {
        $this->course_name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
}