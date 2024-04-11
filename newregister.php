<?php
include "connection.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


// Database name: registration //
// Table name: customer_details //
// Database type: 
// id:INT auto_increment primary key, not null,
// username:VARCHAR(50) NOT NULL,
// email: VARCHAR(50), NOT NULL, UNIQUE
// password: VARCHAR(20) NOT NULL

//Database connection
$conn = new mysqli( "localhost", "root","", "registration" );
if ($conn->connect_error) { //object line
    die("Connection failed: " .$conn->connect_error); // error message will be display
} else {
    

    // Check for duplicate email
    $check_email_query = "SELECT * FROM customer_details WHERE email='$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);
    if(mysqli_num_rows($check_email_result) > 0) {
        echo '<script>
        alert("Email already exists. Please use a different email."); 
        window.location.href="home.html";
        </script>';
        exit();
    }
    // Check for duplicate username
    $check_username_query = "SELECT * FROM customer_details WHERE username='$username'";
    $check_username_result = mysqli_query($conn, $check_username_query);
    if(mysqli_num_rows($check_username_result) > 0) {
        echo '<script>
        alert("Username already exists. Please choose a different username."); 
        window.location.href="home.html";
        </script>';
        exit();
    }
    // Insert new user into database
   $insert_user_query = "INSERT INTO customer_details (username, email, password) VALUES ('$username', '$email', '$password')";
   mysqli_query($conn, $insert_user_query);

        echo '<script>
        window.location.href="thank_you.html";
        </script>';
        exit();
   
    // Close statement and connection
    $stmt->close();
    $conn->close();
}


?>