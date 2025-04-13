<?php
session_start();
# Fetch data from database
$connection = mysqli_connect("localhost", "root", "", "sm");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = "";
$student_id = "";
$department = "";
$major = "";
$email = "";

// Corrected SQL query
$query = "SELECT users.name, users.student_id, users.department, users.major, users.email FROM users";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Issued Books</title>
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
    
    <center><h4>Student List</h4><br></center>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form>
                <table class="table-bordered" width="1200px" style="text-align: center">
                    <tr>
                        <th>Name</th>
                        <th>Student ID</th>
                        <th>Department</th>
                        <th>Major</th>
                        <th>Email</th>
                    </tr>
                
                    <?php
                    $query_run = mysqli_query($connection, $query);
                    if ($query_run) {
                        while ($row = mysqli_fetch_assoc($query_run)) {
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['student_id']); ?></td>
                                <td><?php echo htmlspecialchars($row['department']); ?></td>
                                <td><?php echo htmlspecialchars($row['major']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='5'>No records found.</td></tr>";
                    }
                    ?>  
                </table>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>
</html>