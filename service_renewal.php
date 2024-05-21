<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost"; // Change to your database server name
    $username = "root"; // Change to your database username
    $password = ""; // Change to your database password
    $dbname = "registration"; // Change to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO service_renewal (user_name, customer_id, company_name, company_address, phoneno, email, select_plan, plan_duration, amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $_POST['user_name'], $_POST['customer_id'], $_POST['company_name'], $_POST['company_address'], $_POST['phoneno'], $_POST['email'], $_POST['select_plan'], $_POST['plan_duration'], $_POST['amount']);
    $stmt->execute();

    // Check for errors
    if ($stmt->error) {
        // Handle error, either show a user-friendly message or log it for debugging
        die("Error inserting data: " . $stmt->error);
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();

    // Redirect to a success page or display a success message
    echo '<script>alert("Form submitted Successfully");';
    echo 'window.location.href = "service.html";</script>';
    exit();
}
// Close the outermost if statement
$conn->close();
?>

