<?php
 require "header.php";
?>
    <div class="form">
        <h2>sign in</h2>
        <form action="" method="post">
            <label for="email">email</label><br>
            <input type="text" name="email" id="email"><br>
            <label for="password">password</label><br>
            <input type="password" name="password" id="password"><br>
            <input type="submit" value="sign in" name="signin" onclick="login()" >
        </form>
        new member sign up <a href="signup.php">here</a>

    </div>
    <script>

        const email = document.getElementById('email');
        const password = document.getElementById('password');

        const login = async () => {
            try {
                const response = await fetch('http://localhost/storeApi/login.php', {
                method: 'POST',
                body: JSON.stringify(
                    {
                        email: email.value,
                        password: password.value 
                    }
                    ),
                headers: { 'Content-Type': 'application/json' },
                });

                if (response.ok) {
                    window.location = 'dashboard.php';
                    console.log("logged in")
                } else {
                console.log('Login failed');
                }

                const data = await response.json();
                console.log(data);
            } catch (error) {
                console.log('Error:', error);
            }
        };
        login(email,password)
        // email.addEventListener('change', login);
        // password.addEventListener('change', login);
    </script>
<?php
    require "footer.php"
?>