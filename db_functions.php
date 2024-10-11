<?php
require_once 'Database.php';

function getRecentActivities($limit = 5) {
    $pdo = Database::getInstance()->getConnection();

    $sql = "
    (SELECT 'New Student' AS activity_type,
            CONCAT('New student ', full_name, ' registered') AS description,
            created_at
     FROM student
     ORDER BY created_at DESC
     LIMIT 5)
    UNION ALL
    (SELECT 'New Course' AS activity_type,
            CONCAT('New course ', course_name, ' added') AS description,
            created_at
     FROM course
     ORDER BY created_at DESC
     LIMIT 5)
    UNION ALL
    (SELECT 'Grade Update' AS activity_type,
            CONCAT('Grade updated for course ', course_code) AS description,
            updated_at AS created_at
     FROM grade
     ORDER BY updated_at DESC
     LIMIT 5)
    ORDER BY created_at DESC
    LIMIT ?";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $limit, PDO::PARAM_INT);
    $stmt->execute();
    $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = null;
    $pdo = null;

    return $activities;
}


function getCourseCount() {
    $pdo = Database::getInstance()->getConnection();

    $sql = "SELECT COUNT(*) as course_count FROM course";
    $result = $pdo->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $pdo = null;
    return $row['course_count'];
}

function getStudentCount() {
    $pdo = Database::getInstance()->getConnection();

    $sql = "SELECT COUNT(*) as student_count FROM student";
    $result = $pdo->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $pdo = null;
    return $row['student_count'];
}

function getAverageGPA() {
    $pdo = Database::getInstance()->getConnection();

    $sql = "SELECT AVG(final_marks) as final_marks FROM grade";
    $result = $pdo->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $pdo = null;
    return number_format($row['final_marks'], 2);
}
