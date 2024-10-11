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
    <link href="styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
        label{
            font-weight: bold;
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
        .table-bordered {
            border: 1px solid #dee2e6;
        }
        .bg-light {
            background-color: #f8f9fa !important;
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
                        <a class="nav-link active" aria-current="page" href="index.php">
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
                <h1 class="h2">Student Management</h1>
            </div>

            <div class="content-wrapper">
                <div class="table-responsive">
                    <h2 class="mb-3">List of Students</h2>
                    <table id="studentTable" class="table table-striped table-sm table-bordered">
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
                            echo "<td><a href='updateStudent.php?id={$student->getStudentId()}' class='btn btn-primary btn-sm'>Update</a></td>";
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
            </div>
<hr >
            <?php
            if (isset($_GET['id'])) {
                $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
                $student = $studentDAO->getStudentById($id);
                if ($student) {
                    ?>
                    <div class="mt-5 bg-light rounded" id="updateForm">
                        <h2 class="mb-3">Update Student Information</h2>
                        <form action="process_registration.php" method="post" class="needs-validation" novalidate>
                            <input type="hidden" name="form_type" value="updateStudent">
                            <input type="hidden" name="student_id" value="<?php echo $student->getStudentId(); ?>">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="full_name" class="form-label">Full Name:</label>
                                    <input type="text" class="form-control form-control-contrast" id="full_name" name="full_name" value="<?php echo $student->getFullName(); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="organization" class="form-label">Organization:</label>
                                    <input type="text" class="form-control form-control-contrast" id="organization" name="organization" value="<?php echo $student->getOrganization(); ?>" required>
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label">Address:</label>
                                    <input type="text" class="form-control form-control-contrast" id="address" name="address" value="<?php echo $student->getAddress(); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="city" class="form-label">City:</label>
                                    <input type="text" class="form-control form-control-contrast" id="city" name="city" value="<?php echo $student->getCity(); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="state_province" class="form-label">State/Province:</label>
                                    <input type="text" class="form-control form-control-contrast" id="state_province" name="state_province" value="<?php echo $student->getStateProvince(); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="telephone" class="form-label">Telephone:</label>
                                    <input type="tel" class="form-control form-control-contrast" id="telephone" name="telephone" value="<?php echo $student->getTelephone(); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control form-control-contrast" id="email" name="email" value="<?php echo $student->getEmail(); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="dob" class="form-label">Date of Birth:</label>
                                    <input type="date" class="form-control form-control-contrast" id="dob" name="dob" value="<?php echo $student->getDob(); ?>" required>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" name="update" class="btn btn-primary">Update Student Information</button>
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
            ?>
        </main>

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
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>