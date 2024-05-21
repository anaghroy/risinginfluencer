<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--website icon-->
        <link rel="icon" type="image/png" href="images/rising logo.png">
        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/payment.css">
    </head>

    <body>
        <div class="container">

            <form action="payscript.php" method="POST">
            
                <div class="row">

                    <div class="col">

                        <h3 class="title">payment</h3>
        
                        <div class="inputBox">
                            <span>cards accepted :</span>
                            <img src="images/card_img.png" alt="">
                        </div>
                        <div class="inputBox">
                            <span>Full name :</span>
                            <input type="text" placeholder="Enter your name..." id="name" name="name">
                        </div>
                        <div class="inputBox">
                            <span>Phone number :</span>
                            <input type="text" placeholder="Enter your phone no..." id="phone" name="phone">
                        </div>
                        <div class="inputBox">
                            <span>Email :</span>
                            <input type="text" placeholder="Enter your email..." id="email" name="email">
                        </div>
                        <div class="inputBox">
                            <span>Enter your amount :</span>
                            <input type="number" placeholder="Enter your amount..." id="amount" name="amount">
                        </div>
                        <div class="inputBox">
                            <span> Delivery Address :</span>
                            <input type="text" placeholder="Enter your address..." id="address" name="address">
                        </div>
                        
                    </div>

                </div>
                <input type="hidden" name="payment_success" value="true" />
                <input type="submit" value="proceed to checkout" class="submit-btn">
               
            </form>

        </div>

    </body>

</html>