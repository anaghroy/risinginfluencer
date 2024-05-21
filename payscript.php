<?php
$apiKey = "rzp_test_O1BHpikcMAVew5";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Payment</title>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>

<body>
    <form action="service_renewal_form.php" method="POST">
        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="<?php echo $apiKey; ?>"
            data-amount="<?php echo $_POST['amount'] * 100; ?>"
            data-currency="INR"
            data-id="<?php echo 'OID'.rand(10,100).'END'; ?>"
            data-name="Rising Influencers"
            data-description="We really like what we do. Scaling businesses"
            data-image="https://example.com/your_logo.jpg"
            data-prefill.name="<?php echo $_POST['name']; ?>"
            data-prefill.contact="<?php echo $_POST['phone']; ?>"
            data-prefill.email="<?php echo $_POST['email']; ?>"
            data-prefill.address="<?php echo $_POST['address']; ?>"
            data-theme.color="#F37254"
            data-prefill.razorpay_payment_id="<?php echo $_POST['razorpay_payment_id']; ?>"
        ></script>
        <input type="hidden" custom="Hidden Element" name="hidden" />
         <input type="hidden" name="payment_success" value="true" />
    </form>

        
</body>

</html>

<?php
$apiKey = "rzp_test_O1BHpikcMAVew5";
if ($_POST['payment_success'] == "true") {
    // Payment successful, proceed to insert data into the payment table

    // Database connection parameters
    $servername = "localhost"; // Change to your database server name
    $username = "root"; // Change to your database username
    $password = ""; // Change to your database password
    $dbname = "registration"; // Change to your database name


    // Get the customer's name and email address from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement to insert data into payment table
    $stmt = $conn->prepare("INSERT INTO payment (customerid, name, phone, email, amount, address) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $_POST['customerid'], $_POST['name'], $_POST['phone'], $_POST['email'], $_POST['amount'], $_POST['address']);
    $stmt->execute();

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();

    // Send email to the customer

    $to = $email;
    $subject = "Welcome to Our RISING INFLUENCER";
    $message = "Dear $name,\n\n Thank you for payment with us. Your service has been successfully active.\n\n Please feel free to reach out to us for any questions or concerns regarding our services.\n\nRegards,\n\nRising influencer Team";
    $headers = "From: Your Website Team <royanagh1999@gmail.com>";

    if (mail($to, $subject, $message, $headers)) {
        echo '<script>
        alert("Thank you for successfull payment. Please check your email for further instructions.");
        
        </script>';
        exit();
    } else {
        $error_message = error_get_last()['message'] ?? 'Unknown error';
        echo '<script>
        alert("Failed to send email. Please try again later. Error: ' . $error_message . '"); 
    
        </script>';
        exit();
    }
        // Redirect to a success page or display a success message
        echo '<script>alert("Payment Successful");';
        
        exit();
    } else {
        // Payment not successful, handle accordingly
        // Redirect to a failure page or display a failure message
        header("Location: payment_failure.php?error=" . urlencode($stmt->error));
        exit();
    }


?>
