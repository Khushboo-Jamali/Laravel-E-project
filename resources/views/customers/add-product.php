<?php
include 'header.php';

if (isset($_POST['add_product'])) {

    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $sql = "INSERT INTO products ( product_name, description, price, category) 
            VALUES ( '$product_name', '$description', '$price', '$category')";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        header('Location: add-product.php?msg=Product added successfully');
    } else {
        header('Location: add-product.php?msg=Product not added');
    }
}
?>

<div class="container">
    <form action="" method="post">


        <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="product_name" id="productName" required />
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" required></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" name="price" id="price" required />
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" name="category" id="category" required />
        </div>

        <button type="submit" class="btn btn-primary" name="add_product">Add Product</button>
    </form>
</div>

<?php
include 'footer.php';
?>