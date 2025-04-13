<!DOCTYPE html>
<html>
<head>
    <title>Student Manager</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link rel="stylesheet" type="text/css" href="css_js/css/bootstrap.min.css">
    <script type="text/javascript" src="css_js/js/jquery_latest.js"></script>
    <script type="text/javascript" src="css_js/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
    #ft {
        margin: 0px;
        padding: 0;
        padding-top: 10px;
        text-align: center;
    }
    #main_content {
        padding: 50px; /* Adjusted padding for better appearance */
        background-color: #B0B3D6;
    }
    #side_bar {
        background-color: #787CB5;
        padding: 100px;
        margin: 2%;
        width: 700px;
        height: 650px;
    }
</style>
<body class="ft">
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
    
    <div class="row justify-content-center"> <!-- Center the row -->
        <div class="col-md-8" id="main_content">
            <center><h3><u>Register New Student</u></h3></center>
            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="student_id">Student ID:</label>
                    <input type="text" name="student_id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="department">Department:</label>
                    <select class="form-control" id="department" name="department" required>
                        <option value="">Select department</option>
                        <option value="Pharmacy">Pharmacy</option>
                        <option value="Business Administration">Business Administration</option>
                        <option value="Computer Science and Engineering">Computer Science and Engineering</option>
                        <option value="Information and Communication Engineering">Information and Communication Engineering</option>
                        <option value="Software Engineering">Software Engineering</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="major">Major:</label>
                    <select class="form-control" id="major" name="major" required>
                        <option value="">Select Major</option>
                        <option value="Artificial Intelligence">Artificial Intelligence</option>
                        <option value="Data Science">Data Science</option>
                        <option value="Software Engineering">Software Engineering</option>
                        <option value="Cybersecurity">Cybersecurity</option>
                        <option value="Computer Systems">Computer Systems</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea name="address" class="form-control" required></textarea> 
                </div>
                <button type="submit" class="btn btn-primary">Register</button>	
            </form>
        </div>
    </div>
</body>
</html>