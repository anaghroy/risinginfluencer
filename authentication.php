<?php      
    include('connection.php');  
    $username = $_POST['username'];  
    $password = $_POST['password'];  
    // Database name: registration //
// Table name: customer_details //
// Database type: 
// id:INT auto_increment primary key, not null,
// username:VARCHAR(50) NOT NULL,
// email: VARCHAR(50), NOT NULL, UNIQUE
// password: VARCHAR(20) NOT NULL

//Database connection
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from customer_details where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo '<script>
            window.location.href="homelogin.html";
            </script>';
            exit();

        }  
        else{  
            echo '<script>
            window.location.href="usernexist.html";
            </script>';
            exit(); 
        }
            
?>