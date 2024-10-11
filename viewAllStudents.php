<?php
require_once 'DAO\StudentDAO.php';
require_once 'Database.php';

$studentDAO = new StudentDAO();
$students = $studentDAO->getStudents();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Students - Student Management System</title>
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
                        <a class="nav-link" href="viewGrades.php">
                            <i class="bi bi-table"></i>
                            View Grades
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <i class="bi bi-people"></i>
                            View All Students
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
                <h1 class="h2">View All Students</h1>
            </div>

            <div class="table-responsive">
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
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($student->getStudentId()); ?></td>
                            <td><?php echo htmlspecialchars($student->getFullName()); ?></td>
                            <td><?php echo htmlspecialchars($student->getOrganization()); ?></td>
                            <td><?php echo htmlspecialchars($student->getAddress()); ?></td>
                            <td><?php echo htmlspecialchars($student->getCity()); ?></td>
                            <td><?php echo htmlspecialchars($student->getStateProvince()); ?></td>
                            <td><?php echo htmlspecialchars($student->getTelephone()); ?></td>
                            <td><?php echo htmlspecialchars($student->getEmail()); ?></td>
                            <td><?php echo htmlspecialchars($student->getDob()); ?></td>
                            <td>
                                <a href="viewGrades.php?id=<?php echo $student->getStudentId(); ?>" class="btn btn-primary btn-sm">View Grades</a>
                                <a href="updateStudent.php?id=<?php echo $student->getStudentId(); ?>" class="btn btn-secondary btn-sm">Update</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
