<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/logo.png">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/user.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title>Product Delivery</title>
    </head>
    <body>
        <header>
            <div class="header">
                <a href="index.php">
                    <img src="images/logo.png" alt="Company Logo" id="logo">
                </a>
                
                <h1>Store Product Delivery</h1>
                <div class="nav">
                
                    <li > <a href="#" id="about">about us</a></li>
                    <li ><a href="#" id="home">home</a></li>
                    <?php
                        if(isset($_SESSION['email'])){
                            echo $_SESSION['name'];
                        }else{
                            echo " <a href='signin.php' id='sign'>Sign In</a>";
                        }
                   
                    ?>
                </div>
            </div>
        </header>

