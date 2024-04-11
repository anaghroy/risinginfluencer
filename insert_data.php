<?php
include 'jobform.php';
// database structure details:
// table name: employment and database name:registration

// id : int(1), PRIMARY KEY, AUTO_INCREMENT, NOT NULL,
// firstname: varchar(50),
// lastname: varchar(50),
// email: varchar(100), unique, NOT NULL,
// phoneno: bigint(11),
// street: varchar(100),
// apt: bigint(11),
// state: varchar(50),
// country: varchar(50),
// position: varchar(50),
// citizen: varchar(3),
// nocitizen: varchar(3),
// company: varchar(10),
// year: year(4),
// employed: varchar(3),
// employed: varchar(3),
// employment_type: text,
// highschool_name: varchar(100),
// highschool_address: varchar(100),
// graduated: varchar(3),
// college_name: varchar(100),
// college_address: varchar(100),
// company_name: varchar(100),
// company_address:  varchar(100),
// supervisor_name_title: varchar(100),
// starting_salary: bigint(11),
// ending_salary: bigint(11),
// responsibilities: text,
// reason_for_leaving: varchar(50),
// previous_supervisor_contact: text,
// acknowledgement: varchar(3),
// authorize_investigation:  varchar(3),
// false_information_consequences: varchar(3),
// digital_document_type: varchar(50),
// digital_document_upload: longblob,
// digital_signature_upload: longblob,
// about_yourself: longtext,
// submission_date: timestamp, current_timestamp();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // error message will be display if not connected to the database
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['digital_document_upload']) && !empty($_FILES['digital_document_upload']['name']) && isset($_FILES['digital_signature_upload']) && !empty($_FILES['digital_signature_upload']['name'])) {
        // Escape user inputs for security
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phoneno = mysqli_real_escape_string($conn, $_POST['phoneno']);
        $street = mysqli_real_escape_string($conn, $_POST['street']);
        $apt = mysqli_real_escape_string($conn, $_POST['apt']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $position = mysqli_real_escape_string($conn, $_POST['position']);
        $citizen = mysqli_real_escape_string($conn, $_POST['citizen']);
        $nocitizen = mysqli_real_escape_string($conn, $_POST['nocitizen']);
        $company = mysqli_real_escape_string($conn, $_POST['company']);
        $year = mysqli_real_escape_string($conn, $_POST['year']);
        $employed = mysqli_real_escape_string($conn, $_POST['employed']);
        $employe_contact = mysqli_real_escape_string($conn, $_POST['employe_contact']);
        $employment_type = mysqli_real_escape_string($conn, $_POST['employment_type']);
        $highschool_name = mysqli_real_escape_string($conn, $_POST['highschool_name']);
        $highschool_address = mysqli_real_escape_string($conn, $_POST['highschool_address']);
        $graduated = mysqli_real_escape_string($conn, $_POST['graduated']);
        $college_name = mysqli_real_escape_string($conn, $_POST['college_name']);
        $college_address = mysqli_real_escape_string($conn, $_POST['college_address']);
        $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
        $company_address = mysqli_real_escape_string($conn, $_POST['company_address']);
        $supervisor_name_title = mysqli_real_escape_string($conn, $_POST['supervisor_name_title']);
        $starting_salary = mysqli_real_escape_string($conn, $_POST['starting_salary']);
        $ending_salary = mysqli_real_escape_string($conn, $_POST['ending_salary']);
        $responsibilities = mysqli_real_escape_string($conn, $_POST['responsibilities']);
        $reason_for_leaving = mysqli_real_escape_string($conn, $_POST['reason_for_leaving']);
        $previous_supervisor_contact = mysqli_real_escape_string($conn, $_POST['previous_supervisor_contact']);
        $acknowledgement = mysqli_real_escape_string($conn,$_POST['acknowledgement']);
        $authorize_investigation = mysqli_real_escape_string($conn,$_POST['authorize_investigation']);
        $false_information_consequences = mysqli_real_escape_string($conn, $_POST['false_information_consequences']);
        $digital_document_type = $_POST['digital_document_type'];

        // Upload images to a folder and get their paths
        $digital_document_upload = 'D:\xampp\htdocs\Rising influencer website' . basename($_FILES['digital_document_upload']['name']);
        move_uploaded_file($_FILES['digital_document_upload']['tmp_name'], $digital_document_upload);

        $digital_signature_upload = 'D:\xampp\htdocs\Rising influencer website' . basename($_FILES['digital_signature_upload']['name']);
        move_uploaded_file($_FILES['digital_signature_upload']['tmp_name'], $digital_signature_upload);
        $about_yourself = mysqli_real_escape_string($conn, $_POST['about_yourself']);
        $submission_date = date("Y-m-d H:i:s");

        // Proceed with database insertion
        $sql = "INSERT INTO employment (firstname, lastname, email, phoneno, street, apt, state, country, position, citizen, nocitizen, company, `year`, employed, employe_contact, employment_type, highschool_name, highschool_address, graduated, college_name, college_address, company_name, company_address, supervisor_name_title, starting_salary, ending_salary, responsibilities, reason_for_leaving, previous_supervisor_contact, acknowledgement, authorize_investigation, false_information_consequences, digital_document_type, digital_document_upload, digital_signature_upload, about_yourself, submission_date)
        VALUES ('$firstname', '$lastname', '$email', '$phoneno', '$street', '$apt', '$state', '$country', '$position', '$citizen', '$nocitizen', '$company', '$year', '$employed', '$employe_contact', '$employment_type', '$highschool_name', '$highschool_address', '$graduated', '$college_name', '$college_address', '$company_name', '$company_address', '$supervisor_name_title', '$starting_salary', '$ending_salary', '$responsibilities', '$reason_for_leaving', '$previous_supervisor_contact', '$acknowledgement', '$authorize_investigation', '$false_information_consequences', '$digital_document_type', '$digital_document_upload', '$digital_signature_upload', '$about_yourself', '$submission_date')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>
            alert("Application submitted successfully!"); 
            window.location.href="jobform.html";
            </script>';
            exit();
        } else {
            echo '<script>
            alert("Something went wrong!"); 
            alert("Error: ' . $sql . '<br>' . $conn->error . '");
            </script>';
            exit();
        }
    } else {
        echo '<script>
            alert("Please upload both digital document and signature files!"); 
            window.location.href="jobform.html";
            </script>';
        exit();
    }
}

// Close connection
$conn->close();
?>