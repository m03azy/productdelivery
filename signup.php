<?php
    require "header.php";
?>
    <div class="form">
        <h2>sign up</h2>
        <form action="" method="POST" id='signupForm'>
            <label for="email">name</label><br>
            <input type="text" name="name" id="name"><br>
            <label for="email">email</label><br>
            <input type="text" name="email" id="email"><br>
            <label for="email">phone</label><br>
            <input type="text" name="phone" id="phone"><br>
            <label for="email">address</label><br>
            <input type="text" name="address" id="address"><br>
            <label for="email">create password</label><br>
            <input type="password" name="" id="password"><br>
            <!-- <label for="password">confirm password</label><br>
            <input type="password" name="password" id="password2"><br> -->
            <input type="submit" value="signup" name="signup" onclick="show()">
           
        </form>
        arleady member, sign in <a href="signin.php">here</a>
    </div>
    <!-- <script > -->
    <script >
        var name= document.getElementById('name').value
        var email= document.getElementById('email').value
        var phone= document.getElementById('phone').value
        var address= document.getElementById('address').value
        var password= document.getElementById('password').value

        function show(){
        const data = {
                name:name,
                email:email,
                phone:phone,
                address:address,
                password:password
            }
            console.log(data)

            console.log(name)
        }
        // var password2= document.getElementById('password2')
        show(name)
        // registerUser(address, email, name, phone, password)

        // if(name || email || phone || address || password !=""){
          
            // async function signin() {
            //     const data = {
            //         name:name,
            //         email:email,
            //         phone:phone,
            //         address:address,
            //         password:password
            //     }
            //     try {
            //         const response = await fetch('http://localhost/storeApi/users',{
            //         method: "POST",
            //         headers: { "Content-Type": "application/json" },
            //         body: JSON.stringify(data)});
            //         // const data = await response.json();
            //         // console.log('Fetched data:', data);
            //         // Perform further processing with the fetched data
            //     } catch (error) {
            //         console.error('Error to register user data:', error);
            //     }
            // }
            // signin(name,email,phone,address,password)
        // }
    </script>


<?php
    require "footer.php";
?>