<?php
$connection = mysqli_connect("localhost", "root", "", "sm");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL statement
$stmt = $connection->prepare("INSERT INTO users (name, email, student_id, department, major, address) VALUES (?, ?, ?, ?, ?, ?)");

// Bind parameters
$stmt->bind_param("ssssss", $_POST['name'], $_POST['email'], $_POST['student_id'], $_POST['department'], $_POST['major'], $_POST['address']);

// Execute the statement
if ($stmt->execute()) {
    echo '<script type="text/javascript">
            alert("Registration successful...You may Login now !!");
            window.location.href = "student_list.php";
          </script>';
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$connection->close();
?>