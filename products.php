<?php 
    require "header.php";
    require "navigation.php";
    if(!isset($_SESSION['email'])){
        header("location:signin.php");
    }
?>
    <p> add new <a href="addproducts.php">product</a></p>
    <div class="showProduct" id='showProduct'>
    <table id='productinfo'>
            <thead>
                <tr>
                    <th>image ID</th>
                    <th>product image</th>
                    <th>description</th>
                    <th>price</th>
                    <th>category</th>
                    <th>quantity</th>
                    <th>action</th>
                    
                </tr>
            </thead>
            <tbody id="row">
                <!-- Table rows will be dynamically populated here -->
            </tbody>
        </table>  
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
                const row = `
                    <tr>
                        <td>${product.product_id}</td>
                        <td><img  src="${product.image_url}"  alt='product image' id="td-image"></td>
                        <td>${product.description}</td>
                        <td>${product.price}</td>
                        <td>${product.category}</td>
                        <td>${product.stock_quantity}</td>
                        <td><button onclick=editDriver(${product.product_id})>Edit</button> <button onclick=deleteDriver(${product.id})>delete</button>
                        </td>
                    </tr>`;
                $('#row').append(row);
            });
        })
        .fail(function(error) {
            console.error('Error fetching drivers:', error);
        });
    });

</Script>

<?php require "footer.php"?>