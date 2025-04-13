<?php
require("functions.php");
session_start();
# Fetch data from database
$connection = mysqli_connect("localhost", "root", "", "sm");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$student_id = "";
$course_code = "";
$course_title = "";

// Fetch student data based on session
if (isset($_SESSION['student_id'])) {
    $query = "SELECT * FROM users WHERE student_id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $_SESSION['student_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $student_id = $row['student_id'];
        $course_code = $row['course_code'];
        $course_title = $row['course_title'];
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New Book</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css_js/css/bootstrap.min.css">
    <script type="text/javascript" src="css_js/js/jquery_latest.js"></script>
    <script type="text/javascript" src="css_js/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Student Manager</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="add_student.php">Add Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="student_list.php">Student List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="enroll_in_course.php">Enroll in Course</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="enrollment_history.php">Enrollment History</a>
                </li>
            </ul>
        </div>
    </nav><br>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <center><h4>Enroll in a Course</h4><br></center>
            <form action="" method="post">
                <div class="form-group">
                    <label for="student_id">Student ID:</label>
                    <input type="text" name="student_id" class="form-control" value="<?php echo htmlspecialchars($student_id); ?>" required>
                </div>
                <div class="form-group">
                    <label for="course_code">Course Code:</label>
                    <input type="text" name="course_code" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="course_title">Course Title:</label>
                    <input type="text" name="course_title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="semester">Semester:</label>
                    <select class="form-control" id="semester" name="semester" required>
                        <option value="">Select Semester</option>
                        <option value="Fall-2025">Fall-2025</option>
                        <option value="Summer-2025">Summer-2025</option>
                        <option value="Spring-2025">Spring-2025</option>
                        <option value="Fall-2024">Fall-2024</option>
                        <option value="Summer-2024">Summer-2024</option>
                        <option value="Spring-2024">Spring-2024</option>
                        <option value="Fall-2023">Fall-2023</option>
                        <option value="Summer-2023">Summer-2023</option>
                        <option value="Spring-2023">Spring-2023</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="grade">Enter Grade:</label>
                    <input type="text" name="grade" class="form-control" required>
                </div>
                <br>
                <button type="submit" name="add_book" class="btn btn-primary">Enroll</button>
            </form>
            <?php
            if (isset($_POST['add_book'])) {
                $student_id = $_POST['student_id'];
                $course_code = $_POST['course_code'];
                $course_title = $_POST['course_title'];
                $semester = $_POST['semester'];
                $grade = $_POST['grade'];

                // Validate input data
                if (!empty($student_id) && !empty($course_code) && !empty($course_title) && !empty($semester)) {
                    $query = "INSERT INTO books (student_id, course_code, course_title, semester, grade) VALUES (?, ?, ?, ?,?)";
                    $stmt = $connection->prepare($query);
                    $stmt->bind_param("sssss", $student_id, $course_code, $course_title, $semester, $grade);
                    
                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success'>Book added successfully!</div>";
                        // Optionally redirect or clear the form
                    } else {
                        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
                    }
                    $stmt->close();
                } else {
                    echo "<div class='alert alert-warning'>Please fill in all fields.</div>";
                }
            }
            ?>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>
</html>

<?php
$connection->close();
?>