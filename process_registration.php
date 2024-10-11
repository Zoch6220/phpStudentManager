<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $form_type=$_POST['form_type'];
    switch ($form_type){
        case 'registrationStudent':
            require_once 'DAO\StudentDAO.php';
            $studentDAO=new StudentDAO();
            $studentDAO->createStudent();
            break;

        case 'registrationCourse':
            require_once 'DAO\CourseDAO.php';
            $courseDAO=new CourseDAO();
            $courseDAO->createCourse();
            break;
        case'gradeForm':
            require_once 'DAO\GradeDAO.php';
            $gradeDAO=new GradeDAO();
            $gradeDAO->createGrade();
            break;
        case 'updateStudent':
            require_once 'DAO\StudentDAO.php';
            $studentDAO=new StudentDAO();
            $student_id = $_POST['student_id'];
            $full_name = $_POST['full_name'];
            $organization = $_POST['organization'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state_province = $_POST['state_province'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $dob = $_POST['dob'];
            $studentDAO->updateStudent($student_id, $full_name, $organization, $address, $city, $state_province, $telephone, $email, $dob);
            header('Location: updateStudent.php?success=1');

            break;
    }


}