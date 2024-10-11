<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Registration Form</title>
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
        .form-control-contrast {
            border: 1px solid #ced4da;
            background-color: #fff;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .form-control-contrast:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    </style>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'DAO\CourseDAO.php';
include 'DAO\StudentDAO.php';
try {
    $courseDAO = new CourseDAO();
    $courses = $courseDAO->getCourses();

    $studentDAO = new StudentDAO();
    $students = $studentDAO->getStudents();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Error Code: " . $e->getCode() . "\n";
    echo "SQL State: " . $e->getSQLState() . "\n";
}
?>

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
                        <a class="nav-link active" aria-current="page" href="#">
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
                <h1 class="h2">Grade Registration Form</h1>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-container bg-light p-4 rounded">
                        <div id="success-message" class="alert alert-success" style="display: none;">
                            Grade Added Successfully!
                        </div>
                        <div id="error-message" class="alert alert-danger" style="display: none;">
                            Failed to Add Grade. Please Try Again.
                        </div>
                        <form id="gradeForm" name="gradeForm" action="process_registration.php" method="post" class="needs-validation" novalidate>
                            <input type="hidden" name="form_type" value="gradeForm">
                            <div class="mb-3">
                                <label for="courseSelect" class="form-label">Course:</label>
                                <select id="courseSelect" name="course_code" class="form-select form-control-contrast" required>
                                    <?php if(!empty($courses)):?>
                                        <?php foreach ($courses as $course):?>
                                            <option value="<?php echo htmlspecialchars($course->getCourseCode());?>"><?php echo htmlspecialchars($course->getCourseName());?></option>
                                        <?php endforeach;?>
                                    <?php else:?>
                                        <option value="" disabled selected>No courses available</option>
                                    <?php endif;?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="student_id" class="form-label">Student ID:</label>
                                <input type="text" id="student_id" name="student_id" class="form-control form-control-contrast" required>
                            </div>
                            <div class="mb-3">
                                <label for="final_marks" class="form-label">Final Marks:</label>
                                <input type="number" id="final_marks" name="final_marks" class="form-control form-control-contrast" required>
                            </div>
                            <div class="mb-3">
                                <label for="semester" class="form-label">Semester (1 for January, 2 for September):</label>
                                <input type="number" id="semester" name="semester" min="1" max="2" class="form-control form-control-contrast" required>
                            </div>
                            <div class="mb-3">
                                <label for="year" class="form-label">Year (4-digit):</label>
                                <input type="number" id="year" name="year" min="1000" max="9999" class="form-control form-control-contrast" required>
                            </div>
                            <div class="button-container">
                                <button type="button" class="btn btn-secondary" onclick="verifyStudent()">Verify Student</button>
                                <button type="button" class="btn btn-secondary" onclick="clearFormGrade()">Clear</button>
                                <button type="button" class="btn btn-secondary" onclick="goBack()">Back</button>
                                <button type="submit" id="submitBtn" class="btn btn-primary" disabled>Submit</button>
                            </div>
                        </form>
                        <p id="verifyMessage" class="mt-3"></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-container bg-light p-4 rounded">
                        <h2>Student List</h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Organization</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($students as $student): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($student->getStudentId()); ?></td>
                                        <td><?php echo htmlspecialchars($student->getFullName()); ?></td>
                                        <td><?php echo htmlspecialchars($student->getOrganization()); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="scripts.js"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
</body>
</html>