<?php include 'header.php'?>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

    <h2>Driver Dashboard</h2>
    <div id="deliveries"></div>

    <script>
        $(document).ready(function() {
            fetch('http://localhost/storeApi/get_deliveries.php')
            .then(response => response.json())
            .then(data => {
                if (data.status === 200) {
                    let deliveries = data.data;
                    deliveries.forEach(function(delivery) {
                        const deliveryDiv = `
                            <div>
                                <h3>Order ID: ${delivery.order_id}</h3>
                                <p>Status: ${delivery.status}</p>
                                <button onclick="updateStatus(${delivery.order_id}, 'in_transit')">Mark as In Transit</button>
                                <button onclick="updateStatus(${delivery.order_id}, 'delivered')">Mark as Delivered</button>
                            </div>
                        `;
                        $('#deliveries').append(deliveryDiv);
                    });
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });

        function updateStatus(orderId, status) {
            fetch('http://localhost/storeApi/updatedeliverystatus.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ order_id: orderId, status: status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 200) {
                    location.reload();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>
