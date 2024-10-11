<?php
require_once 'Model/Grade.php';
require_once 'Database.php';
class GradeDAO
{
    private $pdo;
    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function createGrade(): void
    {
        try {
            $course_code = $_POST['course_code'];
            $student_id = $_POST['student_id'];
            $final_marks = $_POST['final_marks'];
            $semester = $_POST['semester'];
            $year = $_POST['year'];

            $sql = "INSERT INTO grade (student_id,course_code , final_marks, semester, year) VALUES (:student_id,:course_code,  :final_marks, :semester, :year)";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':course_code', $course_code);
            $stmt->bindParam(':student_id', $student_id);
            $stmt->bindParam(':final_marks', $final_marks);
            $stmt->bindParam(':semester', $semester);
            $stmt->bindParam(':year', $year);

            if ($stmt->execute()) {
                header('Location:addGrade.php?success=1');
                exit();
            } else {
                // Optional: Log the error or display it for debugging
                error_log("Database error: " . $stmt->error);
                header('Location: addGrade.php?success=0');

            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function getGradesByStudentId($id): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM grade WHERE student_id = :student_id ");
        $stmt->bindParam(':student_id', $id);
        $stmt->execute();
        $grades = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $gradeList = [];
        foreach ($grades as $grade) {
            $gradeList[] = new Grade($grade['grade_id'], $grade['student_id'], $grade['course_code'], $grade['final_marks'], $grade['semester'], $grade['year']);
        }

        return $gradeList;
    }
}