<?php 
    require "header.php";
    require "navigation.php";
?>
    <p> add new <a href="addproducts.php">product</a></p>
    <div class="showProduct" id='showProduct'>
        <div class="card">
            <h5 class="card-title" id='name'>Card title</h5>
            <img src="" alt="Card image cap" id="prodImage" id='image'>
            <p class="card-text" id='description'></p>
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">View More</a>
        </div>
    </div>
    

    </div>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script>
    $(document).ready(function() {
        $.get('http://localhost/storeApi/products', function(response) {
            console.log(response.data);
            let products = response.data;
            products.forEach(function(product) {
                const card = `
                    <div class="card">
                        <h5 class="card-title" id='name'>${product.name}</h5>
                        <img src="${product.image_url}" alt="Card image cap" id="prodImage" id='image'>
                        <p class="card-text" id='description'>${product.description}</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">View More</a>
                    </div>
                    `;
                $('#showProduct').append(card);
            });
        })
        .fail(function(error) {
            console.error('Error fetching drivers:', error);
        });
    });

</Script>

<?php require "footer.php"?>