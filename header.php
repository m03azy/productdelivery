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
                <li><a href="#" id="about">About Us</a></li>
                <li><a href="#" id="home">Home</a></li>
                <?php
                    session_start();
                    if (isset($_SESSION['name'])) {
                        echo "<div id='sign'>".$_SESSION['name']."
                            <button id='logoutButton'>Logout</button>
                         </div>";
                    } else {
                        echo "<a href='signin.php' id='sign'>Sign In</a>";
                    }
                ?>
            </div>
        </div>
    </header>

    <script>
        $(document).ready(function() {
            $('#logoutButton').click(function() {
                fetch('http://localhost/storeApi/logout.php', {
                    method: 'POST'
                })
                .then(response => {
                    if (response.ok) {
                        window.location.href = 'signin.php'; // Redirect to login page
                    } else {
                        throw new Error('Failed to logout');
                    }
                })
                .catch(error => {
                    console.error('Error logging out:', error);
                });
            });
        });
    </script>
</body>
</html>
