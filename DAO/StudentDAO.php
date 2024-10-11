<?php
require_once 'Database.php';
require 'Model/Student.php';
class StudentDAO {
        private $pdo;

        public function __construct() {
            $this->pdo = Database::getInstance()->getConnection();
        }

    public function createStudent(): void
    {
        try {

            $full_name = $_POST['full_name'];
            $organization = $_POST['organization'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state_province = $_POST['state_province'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $dob = $_POST['dob'];

            $sql = "INSERT INTO student (full_name, organization, address, city, state_province, telephone, email, dob) VALUES (:full_name, :organization, :address, :city, :state_province, :telephone, :email, :dob)";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':full_name', $full_name);
            $stmt->bindParam(':organization', $organization);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':state_province', $state_province);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':dob', $dob);


            if ($stmt->execute()) {
                header('Location:registerStudent.php?success=1');
                exit();
            } else {
                // Optional: Log the error or display it for debugging
                error_log("Database error: " . $stmt->error);
                header('Location: registerStudent.php?success=0');

            }

        }catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
    public function getStudents(): array
    {
        $sql = "SELECT * FROM Student";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $students=$stmt->fetchAll(PDO::FETCH_ASSOC);

        $studentsArray=[];
        foreach ($students as $student) {
           $studentsArray[] = new Student($student['student_id'], $student['full_name'], $student['organization'], $student['address'], $student['city'], $student['state_province'],
               $student['telephone'], $student['email'], $student['dob']);
        }
       return $studentsArray;
    }

    public function getStudentById($student_id):? Student
    {
        $sql = "SELECT * FROM student WHERE student_id = :student_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->execute();
        $student = $stmt->fetch(PDO::FETCH_ASSOC);
        if($student){
            return new Student($student['student_id'], $student['full_name'], $student['organization'], $student['address'], $student['city'], $student['state_province'],
                $student['telephone'], $student['email'], $student['dob']);
        }else{
            return null;
        }
    }
    public function updateStudent($student_id, $full_name, $organization, $address, $city, $state_province, $telephone, $email, $dob): void
    {
        $sql = "UPDATE student SET full_name = :full_name, organization = :organization, address = :address, city = :city, state_province = :state_province, telephone = :telephone, email = :email, dob = :dob WHERE student_id = :student_id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':student_id', $student_id);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':organization', $organization);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state_province', $state_province);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':dob', $dob);

        $stmt->execute();
    }
}
