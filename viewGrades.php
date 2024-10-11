<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Grades - Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }
        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
        }
        @media (max-width: 767.98px) {
            .sidebar {
                position: static;
                height: auto;
                padding-top: 0;
            }
            main {
                margin-left: 0 !important;
            }
        }
        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
        }
        .navbar .navbar-toggler {
            top: .25rem;
            right: 1rem;
        }
    </style>
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Student Management System</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="#">Sign out</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="bi bi-house-door"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registerStudent.php">
                            <i class="bi bi-person-plus"></i>
                            Register Student
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="courseRegistration.php">
                            <i class="bi bi-journal-plus"></i>
                            Register Course
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addGrade.php">
                            <i class="bi bi-pencil-square"></i>
                            Manage Grades
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <i class="bi bi-table"></i>
                            View Grades
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="updateStudent.php">
                            <i class="bi bi-person-lines-fill"></i>
                            Update Student Info
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">View Grades</h1>
            </div>

            <h2 class="mb-3">Select a student to view grades</h2>

            <div class="table-responsive mb-4">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Full Name</th>
                        <th>Organization</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State/Province</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once 'DAO\StudentDAO.php';
                    require_once 'Database.php';

                    $studentDAO = new StudentDAO();
                    $students = $studentDAO->getStudents();
                    foreach ($students as $student) {
                        echo "<tr>";
                        echo "<td>{$student->getStudentId()}</td>";
                        echo "<td>{$student->getFullName()}</td>";
                        echo "<td>{$student->getOrganization()}</td>";
                        echo "<td>{$student->getAddress()}</td>";
                        echo "<td>{$student->getCity()}</td>";
                        echo "<td>{$student->getStateProvince()}</td>";
                        echo "<td>{$student->getTelephone()}</td>";
                        echo "<td>{$student->getEmail()}</td>";
                        echo "<td>{$student->getDob()}</td>";
                        echo "<td><a href='viewGrades.php?id={$student->getStudentId()}' class='btn btn-primary btn-sm'>View grades</a></td>";
                        echo "</tr>";
                    }
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $student = $studentDAO->getStudentById($id);
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <?php
            if (isset($_GET['id'])) {
                $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
                $student = $studentDAO->getStudentById($id);
                if ($student) {
                    ?>
                    <h2 class="mb-3">Grades for: <?php echo $student->getFullName()?></h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th>Final Marks</th>
                                <th>Semester</th>
                                <th>Year</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require_once 'DAO\GradeDAO.php';
                            require_once 'Database.php';
                            require_once 'DAO\CourseDAO.php';

                            $gradeDAO = new GradeDAO();
                            $grades = $gradeDAO->getGradesByStudentId($id);
                            $courseDAO = new CourseDAO();

                            foreach ($grades as $grade) {
                                echo "<tr>";
                                echo "<td>{$grade->getCourseCode()}</td>";
                                echo "<td>{$courseDAO->getCourseById($grade->getCourseCode())->getCourseName()}</td>";
                                echo "<td>{$grade->getFinalMarks()}</td>";
                                echo "<td>{$grade->getSemester()}</td>";
                                echo "<td>{$grade->getYear()}</td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
            }
            ?>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>