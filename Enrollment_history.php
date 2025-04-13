<?php
session_start();
# Fetch data from database
$connection = mysqli_connect("localhost", "root", "", "sm");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$student_id = "";
$course_code = "";
$course_title = "";
$semester = "";
$grade = "";
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Reg Books</title>
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

    <center><h4>Enrollment History</h4><br></center>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form method="POST">  
                <label for="student_id">Enter Student ID:</label>  
                <input type="text" id="student_id" name="student_id" placeholder="e.g. 123456" required>  
                <button type="submit" class="btn btn-primary">Search</button>  
            </form>  
            <br>
            <table class="table-bordered" width="1200px" style="text-align: center">
                <tr>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Semester</th>
                    <th>Grade</th>
                </tr>
                
                <?php  
                if ($_SERVER["REQUEST_METHOD"] == "POST") {  
                    $student_id = $_POST['student_id'];  

                    // Prepare and execute SQL statement  
                    $stmt = $connection->prepare("SELECT course_code, course_title, semester, grade FROM books WHERE student_id = ?");  
                    $stmt->bind_param("s", $student_id);  
                    $stmt->execute();  
                    $result = $stmt->get_result();  

                    if ($result->num_rows > 0) {  
                        while($row = $result->fetch_assoc()) {  
                            echo "<tr>  
                                    <td>" . htmlspecialchars($row["course_code"]) . "</td>  
                                    <td>" . htmlspecialchars($row["course_title"]) . "</td>  
                                    <td>" . htmlspecialchars($row["semester"]) . "</td>  
                                    <td>" . htmlspecialchars($row["grade"]) . "</td>  
                                  </tr>";  
                        }  
                    } else {  
                        echo "<tr><td colspan='4'>No data available</td></tr>";  
                    }  

                    $stmt->close();  
                }  
                ?>  	
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>
</html>

<?php