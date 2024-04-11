<?php
include "config.php";

if(isset($_POST["login"])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql ="SELECT * FROM customer_details WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row){
        if(password_verify($password, $row["password"])){
            echo '<script>alert("Login successful. Welcome back!"); window.location.href="home.html";</script>';
            exit();
        } else {
            echo '<script>
            alert("Invalid password. Please try again."); 
            window.location.href="index.html";
            </script>';
            exit();
        }
    } else {
        echo '<script>
        alert("User does not exist. Please register."); 
        window.location.href="index.html";
        </script>';
        exit();
    }
}
?>


