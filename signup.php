<?php require "header.php"; ?>

<div class="form">
    <h2>Sign up</h2>
    <form action="" method="POST" id="signupForm">
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name"><br>
        
        <label for="email">Email</label><br>
        <input type="text" name="email" id="email"><br>

        <label for="phone">Phone</label><br>
        <input type="text" name="phone" id="phone"><br>

        <label for="address">Address</label><br>
        <input type="text" name="address" id="address"><br>

        <label for="password">Create Password</label><br>
        <input type="password" name="password" id="password"><br>

        <input type="submit" value="Signup" name="signup" onclick="signup(event)">
    </form>
    Already a member? Sign in <a href="signin.php">here</a>
</div>

<script>
function signup(event) {
    event.preventDefault(); // Prevent form submission

    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var address = document.getElementById('address').value;
    var password = document.getElementById('password').value;

    const data = {
        name: name,
        email: email,
        phone: phone,
        address: address,
        password: password
    };

    fetch('http://localhost/storeApi/users', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        console.log('User registered:', data);
        // Handle successful registration, e.g., show a success message
    })
    .catch(error => {
        console.error('Error registering user:', error);
        // Handle registration error, e.g., show an error message
    });
}
</script>

<?php require "footer.php"; ?>
