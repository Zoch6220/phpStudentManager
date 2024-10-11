<?php
require_once 'Database.php';
require_once 'Model/Course.php';
class CourseDAO
{
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }
    public function createCourse()
    {
        try{
            $course_code = $_POST['course_code'];
            $course_name = $_POST['course_name'];
            $course_description = $_POST['description'];

            $sql = "INSERT INTO course (course_code, course_name, description) VALUES (:course_code, :course_name, :description)";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':course_code', $course_code);
            $stmt->bindParam(':course_name', $course_name);
            $stmt->bindParam(':description', $course_description);



            if ($stmt->execute()) {
                header('Location:courseRegistration.php?success=1');
                exit();
            } else {
                // Optional: Log the error or display it for debugging
                error_log("Database error: " . $stmt->error);
                header('Location: courseRegistration.php?success=0');

            }
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function getCourses(): array
    {

        $stmt = $this->pdo->prepare("SELECT * FROM course");
        $stmt->execute();
        $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $courseList = [];
        foreach ($courses as $course) {
            $courseList[] = new Course($course['course_code'], $course['course_name'], $course['description']);
        }

        return $courseList;
    }
    public function getCourseById($course_code): Course
    {
        $stmt = $this->pdo->prepare("SELECT * FROM course WHERE course_code = :course_code");
        $stmt->bindParam(':course_code', $course_code);
        $stmt->execute();
        $course = $stmt->fetch(PDO::FETCH_ASSOC);

        return new Course($course['course_code'], $course['course_name'], $course['description']);
    }
    public function updateCourse(Course $course)
    {   $code=$course->getCourseCode();
        $name=$course->getCourseName();
        $description=$course->getDescription();
        $stmt = $this->pdo->prepare("UPDATE course SET course_name = :course_name, description = :description WHERE course_code = :course_code");
        $stmt->bindParam(':course_code', $code);
        $stmt->bindParam(':course_name', $name);
        $stmt->bindParam(':description', $description);

        /*if ($stmt->execute()) {
            header('Location:courseRegistration.php?success=1');
            exit();
        } else {
            // Optional: Log the error or display it for debugging
            error_log("Database error: " . $stmt->error);
            header('Location: courseRegistration.php?success=0');
            exit();
        }*/
    }

}