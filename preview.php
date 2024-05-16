<?php require "header.php"; ?>
<div class="product">
    <div class="details">
    <!-- HTML to display product details -->
        <h2 id="productName" style="color: rgba(21, 146, 255, 0.922)"></h2>
        <img id='imageUrl' src="" alt="">
        <p id="productDescription" style="color: rgba(21, 146, 255, 0.922)"></p>
        <div class="showProduct" id='showProduct'></div>
        available:<div class="stock" id='stock'></div>
        price:<div class="price" id='price'></div>
       
        <!-- Order button -->
        <!-- <button id="orderButton">Order Now</button> -->
        <!-- <div id="showproduct"></div> -->

    </div>
    <div class="order-form">
        <form action="">
            <!-- <div class="form"> -->
                <label for="email">email</label><br>
                <input type="email" name="email" id="email"><br>

                <label for="name">name</label><br>
                <input type="text" name="name" id="name"><br>

                <label for="quantity">quantity</label><br>
                <input type="number" name="quantity" id="quantity"><br>

                <label for="address">address</label><br>
                <input type="text" name="address" id="address"><br>
                <button id="orderButton">Order Now</button>
            <!-- </div> -->
           
        </form>
    </div>
</div>
<script>
    // Extract query parameters from URL
    const params = new URLSearchParams(window.location.search);
    const productName = params.get('name');
    const productDescription = params.get('description');
    const imageUrl = params.get('image_Url')
    const stock = params.get('stock')
    const price = params.get('price')

    // Display product details
    document.getElementById('productName').textContent = productName;
    document.getElementById('productDescription').textContent = productDescription;
    document.getElementById('imageUrl').textContent = imageUrl;
    document.getElementById('stock').textContent = stock;
    document.getElementById('price').textContent = price;

    // Handle order button click
    document.getElementById('orderButton').addEventListener('click', function(event) {
        event.preventDefault()
    // Add your order handling logic here
        var name=document.getElementById('name').value
        var email=document.getElementById('email').value
        var quantity=document.getElementById('quantity').value
        var address=document.getElementById('address').value

        // if(name && email && quantity && address !== ""){
        //     $(document).ready(function(){
        //         $.post()
        //     })
        // }
      
        alert(`Order placed for ${product.name}`);
    });

    // view selected product details

</script>
<?php require "footer.php" ?>