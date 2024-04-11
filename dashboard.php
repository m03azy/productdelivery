<?php
 require "header.php"; 
 require "navigation.php";
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
            $.get('http://localhost/storeApi/totalusers', function(response) {
                // console.log(response.data);
                let totalusers = response.data[0]['total_users'];
                let todayusers = response.data[1]['today_users'];
                console.log(totalusers)
                var display = document.getElementById( "totalUsers" ).innerHTML= totalusers;
                var today = document.getElementById('newUsers').innerHTML=todayusers;
            })
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


        });
    </script>
</div>

<?php require "footer.php";?>