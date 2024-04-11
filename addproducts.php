<?php 
    require "header.php";
    require "navigation.php";
?>
    <h3>add new product</h3>

    <div class="productform">
        <form action="" method="POST">
            <label for="name">name</label><br>
            <input type="text"><br>
            <label for="quantity">quantity</label>
            <input type="number" name="quantity"><br>

            <label for="category">category</label>
            <select id="category" name="category">
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
              
            </select><br>
            <label for="image">image</label>
            <input type='file' id='image' name='image'><br>
            <label for="description">description</label><br>
            <textarea name="description" id="description" ></textarea><br>

            <label for="price">price (€)</label>
            <input type="number" step=".01"><br>

            <input type="submit" value="Add Product" name="addproduct">
        </form>
    </div>

    

    </div>
</div>

<?php require "footer.php"?>