<?php
require_once 'db_functions.php';

$recentActivities = getRecentActivities();
$courseCount = getCourseCount();
$studentCount = getStudentCount();
$averageGPA = getAverageGPA();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management Dashboard</title>
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
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Student Management</a>
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
                        <a class="nav-link active" aria-current="page" href="#">
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
                <h1 class="h2">Dashboard</h1>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Total Students</h5>
                            <p class="card-text display-4"><?php echo $studentCount; ?></p>
                            <p class="card-text"><small class="text-muted">Current enrolled students</small></p>
                        </div>
                        <div class="card-footer">
                            <a href="viewAllStudents.php" class="btn btn-primary">View all students</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Courses Offered</h5>
                            <p class="card-text display-4"><?php echo $courseCount; ?></p>
                            <p class="card-text"><small class="text-muted">Total courses in the system</small></p>
                        </div>
                        <div class="card-footer">
                            <a href="viewAllCourses.php" class="btn btn-primary">View all courses</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Average GPA</h5>
                            <p class="card-text display-4"><?php echo $averageGPA; ?></p>
                            <p class="card-text"><small class="text-muted">Overall student performance</small></p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary">View grade statistics</a>
                        </div>
                    </div>
                </div>
            </div>

            <h2>Recent Activities</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">Activity</th>
                        <th scope="col">Description</th>
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($recentActivities as $activity): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($activity['activity_type']); ?></td>
                            <td><?php echo htmlspecialchars($activity['description']); ?></td>
                            <td><?php echo date('F j, Y, g:i a', strtotime($activity['created_at'])); ?></td>
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