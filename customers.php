<?php 
    require "header.php";
    require "navigation.php";

    if(!isset($_SESSION['email'])){
        header("location:signin.php");
    }
?>
     <div class="col">
        <h2>users Information</h2>
        <table id='driverinfo'>
            <thead>
                <tr>
                    <th>user ID</th>
                    <th>user Name</th>
                    <th>user Email</th>
                    <th>user Address</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody id="row">
                <!-- Table rows will be dynamically populated here -->
            </tbody>
        </table>  
        <!-- Add new drivers <a href="drivers.php">here</a> -->
    </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $.get('http://localhost/storeApi/users', function(response) {
            console.log(response.data);
            let users = response.data;
            users.forEach(function(user) {
                const row = `
                    <tr>
                        <td>${user.user_id}</td>
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                        <td>${user.address}</td>
                        <td><button onclick=editDriver(${user.id})>Edit</button> <button onclick=deleteDriver(${user.id})>delete</button>
                        </td>
                    </tr>`;
                $('#row').append(row);
            });
        })
        .fail(function(error) {
            console.error('Error fetching drivers:', error);
        });
    });
</script>
<?php require "footer.php"?>