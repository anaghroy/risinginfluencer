<?php
// Database connection
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "registration"; // Your MySQL database name

//database name: registration and table name: campaign_form
// id: int(11), AUTO_INCREMENT, PRIMARY KEY, NOT NULL
// name: varchar(255),
// brand: varchar(255),
// email: varchar(255),
// phoneno: bigint(11),
// objective: text,
// platform: varchar(20),
// campaign_type: varchar(20),
// influencer_type: varchar(20),
// budget: decimal(10,2),
// about_yourself: text,
// submission_date: timestamp, DEFAULT CURRENT_TIMESTAMP;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO campaign_form (name, brand, email, phoneno, objective, platform, campaign_type, influencer_type, budget, about_yourself) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssissssds", $name, $brand, $email, $phoneno, $objective, $platform, $campaign_type, $influencer_type, $budget, $about_yourself);

    // Set parameters
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $objective = $_POST['objective'];
    $platform = $_POST['platform'];
    $campaign_type = $_POST['campaign_type'];
    $influencer_type = $_POST['influencer_type'];
    $budget = $_POST['budget'];
    $about_yourself = $_POST['about_yourself'];

    // Execute statement
    if ($stmt->execute()) {
        echo '<script>
        alert("Application submitted successfully!"); 
        window.location.href="designcampaign.html";
        </script>';
        exit();
    } else {
        echo "Something went wrong! " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>