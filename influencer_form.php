<?php
include 'influencer_config.php'; // Include the PHP script containing database connection

//database name: registration and table name: influencer_form
// id: int(11)  AI, primary key, not null,
// firstname: varchar(50), not null,
// lastname: varchar(50),  not null,
// email: varchar(254), unique, not null,
// phoneno: bigint(11), not null,
// whatsappno: bigint(11), not null,
// instagram: blob,
// followers: int(11),
// category: varchar(50), not null (select from dropdown list),
// location: varchar(50), not null (select from dropdown list),
// address:  text, not null,
// full_frame_photo: longblob,
// close_frame_photo: longblob,
// about_yourself: longtext,
// submission_data: timestamp, current_timestamp();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $whatsappno = $_POST['whatsappno'];
    $instagram = $_FILES['instagram'];
    $followers = $_POST['followers'];
    $category = $_POST['category'];
    $location = $_POST['location'];
    $address = $_POST['address'];
    $full_frame_photo = $_FILES['full_frame_photo'];
    $close_frame_photo = $_FILES['close_frame_photo'];
    $about_yourself = $_POST['about_yourself'];

    
    // Insert data into database
    $sql = "INSERT INTO influencer_form (firstname, lastname, email, phoneno, whatsappno, instagram, followers, category, location, address, full_frame_photo, close_frame_photo, about_yourself)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiisissbsss", $firstname, $lastname, $email, $phoneno, $whatsappno, $instagram, $followers, $category, $location, $address, $full_frame_photo, $close_frame_photo, $about_yourself);
    $stmt->execute();

    // Check if data was inserted successfully
    if ($stmt->affected_rows > 0) {
        echo '<script>
            alert("Application submitted successfully!"); 
            window.location.href="influencerform.html";
            </script>';
            exit();
    } else {
        echo "Error submitting application.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>