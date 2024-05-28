<?php 
    require "header.php";
    require "navigation.php";

    if(!isset($_SESSION['email'])){
        header("location:signin.php");
    }
?>

    <div class="col">
        <h2>Orders Information</h2>
        <table id='orderinfo'>
            <thead>
                <tr>
                    <th>order ID</th>
                    <th>user Id</th>
                    <th>total amount</th>
                    <th>status</th>
                    <th>confirmation</th>
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
<script>
    $(document).ready(function() {
        $.get('http://localhost/storeApi/orders', function(response) {
            console.log(response.data);
            let orders = response.data;
            orders.forEach(function(order) {
                const row = `
                    <tr>
                        <td>${order.order_id}</td>
                        <td>${order.user_id}</td>
                        <td>${order.total_amount}</td>
                        <td>${order.status}</td>
                        <td>
                            <button onclick="editDriver(${order.order_id})">Edit</button> 
                            <button onclick="deleteDriver(${order.order_id})">Delete</button>
                            <button onclick="confirmOrder(${order.order_id})">Confirm</button>
                        </td>
                    </tr>`;
                $('#row').append(row);
            });
        })
        .fail(function(error) {
            console.error('Error fetching orders:', error);
        });
    });
    function editDriver(orderId) {
            // Your edit function here
            console.log('Edit order', orderId);
        }

        function deleteDriver(orderId) {
            // Your delete function here
            console.log('Delete order', orderId);
        }

        function confirmOrder(orderId) {
            fetch(`http://localhost/storeApi/orderconfirm/${orderId}`, {
                method: 'POST'
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 200) {
                    document.getElementById(`status-${orderId}`).innerText = 'Confirmed';
                } else {
                    alert('Failed to confirm order');
                }
            })
            .catch(error => {
                console.error('Error confirming order:', error);
            });
        }

</script>
<?php require "footer.php"?>