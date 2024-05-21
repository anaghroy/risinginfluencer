<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and sanitize form data
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $submission_date = date('Y-m-d H:i:s'); // Capture current date and time

    // Insert form data into the database
    $sql = "INSERT INTO blog (fname, lname, email, country, subject, submission_date)
            VALUES ('$fname', '$lname', '$email', '$country', '$subject', '$submission_date')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>
        alert("Application submitted successfully!");
        window.location.href = "blog.html"; // Redirect to a thank you page or homepage
        </script>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
