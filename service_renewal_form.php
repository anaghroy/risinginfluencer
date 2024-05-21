<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>service renewal form</title>

    <!--website icon-->
    <link rel="icon" type="image/png" href="images/rising logo.png">
    
    <!-- Swiper JS CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!--scroll Reveal-->
    <script src="https://unpkg.com/scrollreveal"></script>
        
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!--ionic.io-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/service_renewal.css">
    </head>

    <body>
        <!-- home section starts here -->
        <section class="home" id="home">
            <div class="home-content">
                <img src="images/service/service renewal form.jpg" alt="" class="home-img">

                     <div class="home-details">
                            <div class="home-text">
                                <h4 class="homeSubtitle">AT RISING INFLUENCERS.</h4>
                                <h2 class="homeTitle">What we do is far important than <br> What we say</h2>
                           </div>     
                     </div>
            </div>
        </section>
        <!-- home section ends here -->

        <!-- service renewal form starts here -->
        <div class="blog-list-container">
            <h2>FILL THE FORM PROPERLY</h2>
                    
        </div>

        <div class="container">

            <form action="service_renewal.php" method="POST">
             
                <label  for="title"><b><h3><center>APPLICATION FOR SERVICE RENEWAL</h3></center></b></label><br><br>
                
                    <legend> Customer Information</legend><br>
                        <label for="user_name">User Name</label>
                        <input type="text" id="user_name" name="user_name" placeholder="Your username..." required>

                        <label for="customer_id">Customer Id</label> <!--This is an auto generating in the (value) field-->
                        <input type="text" id="customer_id" name="customer_id" style="color: #f35b04" value="<?php echo uniqid('RISING'); ?>" readonly>

                        <label for="company_name">Company Name</label>
                        <input type="text" id="company_name" name="company_name" placeholder="Your company name..." required>

                        <label for="company_address">Company Address</label>
                        <input type="text" id="company_address" name="company_address" placeholder="Your company address..." required>

                        <label for="phoneno">Phone no.</label>
                        <input type="text" id="phoneno" name="phoneno" placeholder="Your phone no..." required>

                        <label for="email">Email Id</label>
                        <input type="text" id="email" name="email" placeholder="Your email id..." required>

                               
                    <legend>Service Information</legend><br>
                        <label for="Select_plan">Select Your Plan</label>
                        <select id="select_plan" name="select_plan" required>
                        <option value="">--Please choose an option--</option>
                        <option value="silver">Silver</option>
                        <option value="gold">Gold</option>
                        <option value="platinum">Platinum</option>
                        </select>

                        <label for="plan_duration">Select Your Plan</label>
                        <select id="plan_duration" name="plan_duration" required>
                        <option value="">--Please choose an option--</option>
                        <option value="1 year">1 Year</option>
                        </select>

                        <label for="amount">Amount</label>
                        <input type="text" id="amount" name="amount" placeholder="Enter amount..." required>
                
                        
                <input type="submit" value="Submit" id="submission_date" name="submission_date">
                <button type="submit" formaction="pdf.php" method="post" value="download" id="download" name="download">Download <i class="fa-solid fa-download"></i></button><br>
               
                <center><p>&#169; 2024 Rising Influencer https://www.risinginfluencer.com </p></center>


            </form>
        </div>

        <!-- service renewal form ends here -->


    </body>
</html>