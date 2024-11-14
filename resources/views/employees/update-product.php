<?php
ob_start(); // Start output buffering
include "header.php";
include 'config.php';

// Check if a specific delivery ID is provided in the URL
if (isset($_GET['p_id'])) {
    $delivery_id = $_GET['p_id'];

    // Fetch the specific delivery entry
    $sel = "SELECT * FROM `products` WHERE `product_id` = '$delivery_id'";
    $res = mysqli_query($conn, $sel);
    $row = mysqli_fetch_array($res);

    // Check if the delivery exists
    if (!$row) {
        header('Location: view-product.php?msg=delivery_not_found');
        exit();
    }
}

if (isset($_POST['up_product'])) {
    $product_id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // SQL query to update the product
    $sql = "UPDATE `products` 
            SET `product_name` = '$product_name', `description` = '$description', `price` = '$price', `category` = '$category' 
            WHERE `product_id` = '$product_id'";

    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('Location: view-product.php?msg=Product_updated_successfully');
        exit();
    } else {
        header('Location: view-product.php?msg=Product_not_updated');
        exit();
    }
}
?>

<div class="container">
    <form action="" method="post">

        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['product_id']); ?>" />

        <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input
                type="text"
                class="form-control"
                name="product_name"
                id="productName"
                value="<?php echo $row['product_name']; ?>" />
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea
                class="form-control"
                name="description"
                id="description"><?php echo $row['description']; ?></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input
                type="number"
                class="form-control"
                name="price"
                id="price"
                value="<?php echo $row['price']; ?>" />
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input
                type="text"
                class="form-control"
                name="category"
                id="category"
                value="<?php echo $row['category']; ?>" />
        </div>



        <button type="submit" class="btn btn-primary" name="up_product">
            Submit
        </button>

    </form>
</div>

<?php include "./footer.php"; ?>
<?php
ob_end_flush(); // Flush the output buffer and turn off output buffering
?>