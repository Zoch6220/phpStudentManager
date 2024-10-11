<?php
require_once 'DAO\StudentDAO.php';

if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];

    $studentDAO = new StudentDAO();
    $student = $studentDAO->getStudentById($student_id);

    if ($student) {
        // If student exists, send a success response
        echo json_encode(['success' => true, 'student' => $student]);
    } else {
        // If student doesn't exist, send a failure response
        echo json_encode(['success' => false, 'message' => 'Student not found']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No student ID provided']);
}


