<?php
 require "header.php";
?>
    <div class="form">
        <h2>sign in</h2>
        <form action="" method="" id="loginForm">
            <label for="email">email</label><br>
            <input type="text" name="email" id="email" > <br>

            <label for="password">password</label><br>
            <input type="password" name="password" id="password"  ><br>
            
            <input type="submit" value="sign in" name="signin" >
        </form>
        new member sign up <a href="signup.php">here</a>

    </div>
    <script>
       
        const login = async () => {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            try {
                const response = await fetch('http://localhost/storeApi/login.php', {
                    method: 'POST',
                    body: JSON.stringify({ email, password }),
                    headers: { 'Content-Type': 'application/json' },
                });

                // Check if the response is okay (status 200-299)
                if (response.ok) {
                    const data = await response.json();
                    console.log('Logged in:', data);
                    // Redirect to the dashboard or another page
                    window.location.href= "userdashboard.php";
                    // window.location.href = 'dashboard.php';
                } else {
                    // Handle different status codes
                    console.log('Login failed:', response.status);
                    const errorData = await response.json();
                    console.log('Error details:', errorData);
                }
            } catch (error) {
                console.log('Error:', error);
            }
        };

    // Attach the login function to a form submit event
    document.getElementById('loginForm').addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent the default form submission
        login();
    });
    </script>
<?php
    require "footer.php"
?>