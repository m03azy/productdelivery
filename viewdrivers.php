<?php 
    require "header.php";
    require "navigation.php";

    if(!isset($_SESSION['email'])){
        header("location:signin.php");
    }
?>
    <div class="col">
        <h2>Drivers Information</h2>
        <table id='driverinfo'>
            <thead>
                <tr>
                    <th>Driver ID</th>
                    <th>Driver Name</th>
                    <th>Driver Email</th>
                    <th>Driver Address</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody id="row">
                <!-- Table rows will be dynamically populated here -->
            </tbody>
        </table>  
        Add new drivers <a href="drivers.php">here</a>
    </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $.get('http://localhost/storeApi/drivers', function(response) {
            console.log(response.data);
            let drivers = response.data;
            drivers.forEach(function(driver) {
                const row = `
                    <tr>
                        <td>${driver.id}</td>
                        <td>${driver.name}</td>
                        <td>${driver.email}</td>
                        <td>${driver.address}</td>
                        <td>
                            <button onclick=editDriver(${driver.id})>Edit</button> 
                            <button onclick=deleteDriver(${driver.id})>delete</button>
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

</script>
<?php require "footer.php"; ?>