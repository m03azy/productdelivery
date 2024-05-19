<?php require "header.php"; ?>

        <div class="show">
            <div class="display">
                <div class="search">
                    <h3>Search category</h3> <br>
                    <form>
                        <select id="category" name="category">
                            <!-- Options for product categories -->
                            <option value="food and beverages">food and beverages</option>
                            <option value="electronics">electronics</option>
                            <option value="clothing and apreal">clothing and apreal</option>
                            <option value="hardware">hardware</option>
                            <option value="home and kitchen">home and kitchen</option>
                            <option value="health and beauty">health and beauty</option>
                            <option value="books and media">books and media</option>
                            <option value="toys and games">toys and games</option>
                            <option value="sports and fitness">sports and fitness</option>
                            <option value="office supplies">office supplies</option>
                            <option value="automotives">automotives</option>
                        </select><br>
                        <input type="submit" name="search" id="submit" onclick="categories(event)">
                    </form>
                </div>
                <div class="showProduct" id='showProduct'></div>
            </div>
        </div>

        <script>
            function categories() {
                event.preventDefault()
                var selectedCategory = document.getElementById('category').value;
                $.get('http://localhost/storeApi/products', function(response) {
                    console.log(response.data);
                    let products = response.data;
                    $('#showProduct').empty(); // Clear previous results
                    products.forEach(function(product) {
                        if (product.category == selectedCategory) { // Filter products by selected category
                            const card = `
                                <div class="prodcard">
                                    <h3 class="card-title" id='name'>${product.name}</h3>
                                    <img src="${product.image_url}" alt="Card image cap" id="prodImage">
                                    <p class="card-text" id='description'>${product.description}</p>
                                    <p class="card-text" id='quantity'>available: ${product.stock_quantity}</p>
                                    <p class="card-text" id='quantity'>price: ${product.price}</p>
                                    <button  class="order-btn" onclick="orderProduct('${product.name}', '${product.description}','${product.image_url}',${product.price},${product.stock_quantity},${product.product_id})">         
                                </div>
                            `;
                            $('#showProduct').append(card);
                        }
                    });


                }).fail(function(error) {
                    console.error('Error fetching products:', error);
                });
            }

            // Initial loading of products
            $(document).ready(function() {
                $.get('http://localhost/storeApi/products', function(response) {
                    console.log(response.data);
                    let products = response.data;
                    products.forEach(function(product) {
                        const card = `
                            <div class="prodcard">
                                <h3 class="card-title" id='name'>${product.name}</h3>
                                <img src="${product.image_url}" alt="Card image cap" id="prodImage">
                                <p class="card-text" id='description'>${product.description}</p>
                                <p class="card-text" id='quantity'>available: ${product.stock_quantity}</p>
                                <p class="card-text" id='quantity'>price: ${product.price}</p>
                                <button  class="order-btn" onclick="orderProduct('${product.name}', '${product.description}','${product.image_url}',${product.price},${product.stock_quantity},${product.product_id})">
                                View More
                                </button>
                            </div>
                        `;

                        
                        $('#showProduct').append(card);
                    });
                }).fail(function(error) {
                    console.error('Error fetching products:', error);
                });
                
                
            });


            function orderProduct(name, description, image_url,price,stock_quantity,product_id) {
                console.log(name)
                console.log(description)
                console.log(image_url)
                console.log(product_id)
                window.location.href = `preview.php?
                name=${encodeURIComponent(name)}
                &description=${encodeURIComponent(description)}
                &image_url=${encodeURIComponent(image_url)}
                &stock=${encodeURIComponent(stock_quantity)}
                &price=${encodeURIComponent(price)}
                &product_id=${encodeURIComponent(product_id)}`;
            }

        </script>

<?php require "footer.php"; ?>
