<?php 
    require "header.php";
    require "navigation.php";
?>
   
    <div class="productform">
    <h3>Add New Product</h3>
    <form action="" method="POST" enctype="multipart/form-data" >
        <label for="name">Name</label><br>
        <input type="text" id="name" name="name"><br><br>

        <label for="quantity">Quantity</label><br>
        <input type="number" id="quantity" name="quantity"><br><br>

        <label for="category">Category</label><br>
        <select id="category" name="category">
            <!-- Options for product categories -->
            <option value="food and beverages">food and beverages</option>
            <option value="electronics">electronics</option>
            <option value="clothing and apreal">clothing and apreal</option>
            <option value="home and kitchen">home and kitchen</option>
            <option value="health and beauty">health and beauty</option>
            <option value="books and media">books and media</option>
            <option value="toys and games">toys and games</option>
            <option value="sports and fitness">sports and fitness</option>
            <option value="office supplies">office supplies</option>
            <option value="automotives">automotives</option>
        </select><br><br>

        <label for="image">Image</label><br>
        <input type="file" id="image" name="image" accept="image/*"><br><br>

        <label for="description">Description</label><br>
        <textarea id="description" name="description"></textarea><br><br>

        <label for="price">Price (€)</label><br>
        <input type="number" step="0.01" id="price" name="price"><br>

        <input type="submit" value="Add Product" name="addproduct" onclick="addProduct()" >
    </form>
</div>

    </div>
</div>
<script>

    function addProduct() {
        event.preventDefault();

        var name = document.getElementById('name').value;
        var category = document.getElementById('category').value;
        var quantity = document.getElementById('quantity').value;
        var image = document.getElementById('image').files[0];
        var description = document.getElementById('description').value;
        var price = document.getElementById('price').value;

        const formData = new FormData();
        formData.append('name', name);
        formData.append('category', category);
        formData.append('quantity', quantity);
        formData.append('image', image);
        formData.append('description', description);
        formData.append('price', price);

        fetch('http://localhost/storeApi/products', {
            method: 'POST',
            headers:{'Contetnt-type':'multipart/form-data'},
            body:formData
           
        })

        .then(response => {
            if(response.ok){
                
                console.log('product registered:');
                window.location("products.php");
            
            }else if(response.ok =="false"){
                console.log(formData)
                console.log(response);
            }
            else{
                console.error(response)
            }
        });
          
    } 
</script>
<?php require "footer.php"?>