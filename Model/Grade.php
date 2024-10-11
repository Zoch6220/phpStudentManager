<?php

class Grade
{


    private $grade_id;
    private $student_id;
    private $course_code;
    private $final_marks;
    private $semester;
    private $year;

    public function __construct($grade_id, $student_id, $course_code, $final_marks, $semester, $year)
    {
        $this->grade_id = $grade_id;
        $this->student_id = $student_id;
        $this->course_code = $course_code;
        $this->final_marks = $final_marks;
        $this->semester = $semester;
        $this->year = $year;
    }


    /**
     * @return mixed
     */
    public function getGradeId()
    {
        return $this->grade_id;
    }

    /**
     * @param mixed $grade_id
     */
    public function setGradeId($grade_id): void
    {
        $this->grade_id = $grade_id;
    }

    /**
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->student_id;
    }

    /**
     * @param mixed $student_id
     */
    public function setStudentId($student_id): void
    {
        $this->student_id = $student_id;
    }

    /**
     * @return mixed
     */
    public function getCourseCode()
    {
        return $this->course_code;
    }

    /**
     * @param mixed $course_code
     */
    public function setCourseCode($course_code): void
    {
        $this->course_code = $course_code;
    }

    /**
     * @return mixed
     */
    public function getFinalMarks()
    {
        return $this->final_marks;
    }

    /**
     * @param mixed $final_marks
     */
    public function setFinalMarks($final_marks): void
    {
        $this->final_marks = $final_marks;
    }

    /**
     * @return mixed
     */
    public function getSemester()
    {
        return $this->semester;
    }

    /**
     * @param mixed $semester
     */
    public function setSemester($semester): void
    {
        $this->semester = $semester;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year): void
    {
        $this->year = $year;
    }

}