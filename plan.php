<?php
// Established a database connection already 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

// Create connection
$conn = new mysqli($servername,$username,$password,$dbname);
//Check connection
if($conn->connect_error) {
    die("Connection failed:".$conn->connect_error);
}

// Handle form submission

    $username = $_POST['username'];
    $customer_id = $_POST['customer_id'];
    $company_name = $_POST['company_name'];
    $company_address = $_POST['company_address'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $select_plan = $_POST['select_plan'];
    $plan_duration = $_POST['plan_duration'];
    $purchase_date = date("Y-m-d H:i:s");
    $amount = $_POST['amount'];
    $submission_date = date("Y-m-d H:i:s");

    //Insert into database
$sql = "INSERT INTO new_service(user_name, customer_id, company_name, company_address, email, phoneno, select_plan, plan_duration, purchase_date, amount, submission_date) 
value('$user_name','".$customer_id."','$company_name','$company_address','$email','$phoneno','$select_plan','$plan_duration', '$purchase_date', '$amount', '$submission_date')";

if($conn->query($sql)===TRUE) {
    echo"<script>
    alert('Data submitted !')
    window.location.href='checkout.html';
    
    </script>";
} else {
    echo"<script>
    alert('Server down.. Sorry for inconvenience!')
    window.location.href='service_renewal.php';
    </script>";
}
?>