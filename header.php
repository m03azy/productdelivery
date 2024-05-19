<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/logo.png">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/user.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('logout').addEventListener('click', logout);
            });

            function logout() {
                fetch('http://localhost/storeApi/logout.php', {
                    method: 'POST',
                    credentials: 'include' // Include credentials for session-based auth
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 200) {
                        // Clear local storage or cookies where the token is stored
                        localStorage.removeItem('token');
                        // alert(data.message);
                        // Redirect to login page or home page
                        window.location.href = 'index.php';
                    } else {
                        alert('Failed to log out');
                    }
                })
                .catch(error => {
                    console.error('Error logging out:', error);
                });
            }

            // Call the function to log out
            logout();

        </script> -->
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
                    session_start();
                        if(isset($_SESSION['use_id'])){
                            echo $_SESSION['name'];
                            echo " <button id='sign'>logout</button>";
                        }else{
                            echo " <a href='signin.php' id='sign'>Sign In</a>";
                        }
                   
                    ?>
                </div>
            </div>
        </header>

