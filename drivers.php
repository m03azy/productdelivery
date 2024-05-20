<?php 
    require "header.php";
    require "navigation.php";

    if(!isset($_SESSION['email'])){
        header("location:signin.php");
    }
?>
        <div class="col">
            <h2>register driver</h2>
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

                <input type="submit" value="register" name="register" onclick="add(event)">
                <span id="message"></span>
            </form>
            
            view drivers informations <a href="viewdrivers.php">here</a>
        </div>
    </div>
</div>

<script>
function add(event) {
    event.preventDefault(); // Prevent form submission

    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var address = document.getElementById('address').value;
    var password = document.getElementById('password').value;

    if(name =='' && email =='' && phone =="" && address =="" && password ==""){
        var message =document.getElementById('message').innerHTML="fill both fields"
    }

    const data = {
        name: name,
        email: email,
        phone: phone,
        address: address,
        password: password
    };

    fetch('http://localhost/storeApi/drivers', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    // .then(response => response.json())
    .then(response => {
        if(response.ok){
            window.location.href='viewdrivers.php';
            console.log('driver registered:', data);
        
        }else if(response.ok =="false"){
            console.log(response);
        }
        else{
            console.error(response)
        }
    });
}
</script>
<?php require "footer.php"; ?>