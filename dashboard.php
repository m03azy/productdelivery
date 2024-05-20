<?php
    require "header.php"; 
    require "navigation.php";

    if(!isset($_SESSION['email'])){
        header("location:signin.php");
    }
    
 ?>
 
     <div class="col-dashboard">
       <div class="card">
            <h1>users</h1>
            <ul>
                <li>total users:  <span id="totalUsers"></span></li>
                <li>today new users: <span id="newUsers"></span></li>
            </ul>
       </div>

       <div class="card">
            <h1>drivers</h1>
            <ul>
                <li>total drivers: <span id="totaldrivers"></span></li>
                <li>today new drivers: <span id="newDrivers"></span></li>
            </ul>
       </div>

       <div class="card">
            <h1>orders</h1>
            <ul>
                <li>total Orders:  <span id="totalOrders"></span></li>
                <li>today new Orders: <span id="newOrders"></span></li>
            </ul>
       </div>

       <div class="card">
            <h1>products</h1>
            <ul>
                <li>total products: <span id="totalProducts"></span></li>
                <li>today new products: <span id="newProducts"></span></li>
            </ul>
       </div>
        <!-- Add new drivers <a href="drivers.php">here</a> -->
    </div>

    </div>

    <script>
        $(document).ready(function() {
            //for total users
            $.get('http://localhost/storeApi/totalusers', function(response) {
                // console.log(response.data);
                let totalusers = response.data[0]['total_users'];
                let todayusers = response.data[1]['today_users'];
                console.log(totalusers)
                var display = document.getElementById( "totalUsers" ).innerHTML= totalusers;
                var today = document.getElementById('newUsers').innerHTML=todayusers;
            })
            // for total drivers
            $.get('http://localhost/storeApi/totaldrivers', function(response) {
                // console.log(response.data);
                let totaldrivers = response.data[0]['total_drivers'];
                let todaydrivers = response.data[1]['today_drivers'];
                console.log(totaldrivers)
                var display = document.getElementById( "totaldrivers" ).innerHTML= totaldrivers;
                var today = document.getElementById('newDrivers').innerHTML=todaydrivers;
            })
            
            .fail(function(error) {
                console.error('Error fetching drivers:', error);
            });
            // for total products
            $.get('http://localhost/storeApi/totalproducts', function(response) {
                // console.log(response.data);
                let totalproducts = response.data[0]['total_products'];
                let todayproducts = response.data[1]['today_products'];
                console.log(totalproducts)
                var display = document.getElementById( "totalProducts" ).innerHTML= totalproducts;
                var today = document.getElementById('newProducts').innerHTML=todayproducts;
            })
            
            .fail(function(error) {
                console.error('Error fetching drivers:', error);
            });

            $.get('http://localhost/storeApi/totalorders', function(response) {
                // console.log(response.data);
                let totalorders = response.data[0]['total_orders'];
                let todayorders = response.data[1]['today_orders'];
                console.log(totalorders)
                var display = document.getElementById( "totalOrders" ).innerHTML= totalorders;
                var today = document.getElementById('newOrders').innerHTML=todayorders;
            })
            
            .fail(function(error) {
                console.error('Error fetching orders:', error);
            });

        });
    </script>
</div>

<?php require "footer.php";?>