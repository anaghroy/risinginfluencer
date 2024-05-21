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


// Send email to the customer

$to = $email;
$subject = "Welcome to Our RISING INFLUENCER";
$message = "Dear $username,\n\n Thank you for registering with us. Your account has been successfully registered.\n\n Please feel free to reach out to us for any questions or concerns regarding our services.\n\nRegards,\n\nRising influencer Team";
$headers = "From: Your Website Team <royanagh1999@gmail.com>";

if (mail($to, $subject, $message, $headers)) {
    echo '<script>
    alert("Thank you for registering. Please check your email for further instructions.");
    window.location.href="thank_you.html";
    </script>';
    exit();
} else {
    $error_message = error_get_last()['message'] ?? 'Unknown error';
    echo '<script>
    alert("Failed to send email. Please try again later. Error: ' . $error_message . '"); 
   
    </script>';
    exit();
}    
echo '<script>
window.location.href="thank_you.html";
</script>';
exit();  
    $conn->close();
}

?>