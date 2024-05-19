<?php require "header.php"; ?>
<div class="product">
    <div class="details">
    <?= $_SESSION['name'];?>
    <h2 id="productName"></h2>
    <img id="productImage" alt="Product Image" />
    <p id="productDescription"></p>
    <p id="productPrice"></p>
    <form id="orderForm" onsubmit="placeOrder(event)">
        <input type="hidden" id="productId" name="product_id" />
        <input type="hidden" id="productPriceValue" name="price" />
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required /><br>
        <button type="submit">Order Now</button>
    </form>
</div>

</div>

<script>
    function getQueryParams() {
        const params = new URLSearchParams(window.location.search);
        return {
            productId: params.get('product_id'),
            name: params.get('name'),
            description: params.get('description'),
            imageUrl: params.get('image_url'),
            price: params.get('price')
            
        };
    }
   

    function displayProductDetails() {
        const { productId, name, description, imageUrl, price } = getQueryParams();
        document.getElementById('productName').textContent = name;
        document.getElementById('productDescription').textContent = description;
        document.getElementById('productImage').src = imageUrl;
        document.getElementById('productPrice').textContent = `$${price}`;
        document.getElementById('productId').value = productId;
        document.getElementById('productPriceValue').value = price;
    }

    document.addEventListener('DOMContentLoaded', displayProductDetails);

    async function placeOrder(event) {
        event.preventDefault();
        const userId = "<?=$_SESSION['user_id'];?>"; //user_id from API database
        const productId = document.getElementById('productId').value;
        const quantity = document.getElementById('quantity').value;
        const price = document.getElementById('productPriceValue').value;


        const orderData = {
            user_id: userId,
            order_items: [{
                product_id: productId,
                quantity: quantity,
                price: price
            }]
        };

        try {
            const response = await fetch('http://localhost/storeApi/orders', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(orderData)
            });

            const data = await response.json();
            if (response.ok) {
                alert('Order placed successfully!');
            } else {
                alert('Failed to place order: ' + data.message);
            }
        } catch (error) {
            console.error('Error placing order:', error);
        }
    }
</script>


<?php require "footer.php" ?>