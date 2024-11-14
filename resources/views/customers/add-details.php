<?php
include "header.php";
$conn = mysqli_connect('localhost', 'root', '', 'online_shopping');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if (isset($_POST['add'])) {
    $order_id = $_POST['order_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiid", $order_id, $product_id, $quantity, $price);

    if ($stmt->execute()) {
        header("location:add-details.php?msg=Order detail added successfully.");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>


<div class="container mt-5">
    <h2 class="text-center">Add Order Details</h2>
    <form method="POST" class="mt-4">

        <div class="mb-3">
            <label class="form-label">Select Order ID:</label>
            <select class="form-select" name="order_id" required>
                <option value="">Select Order</option>
                <?php
                // Fetch all order_ids from the orders table
                $sql_orders = 'SELECT order_id FROM orders';
                $res_orders = mysqli_query($conn, $sql_orders);
                while ($data = mysqli_fetch_array($res_orders)) {
                ?>
                    <option value="<?php echo $data['order_id']; ?>"><?php echo $data['order_id']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Select Product ID:</label>
            <select class="form-select" name="product_id" required>
                <option value="">Select Product</option>
                <?php
                // Fetch all product_ids from the products table
                $sql_products = 'SELECT product_id FROM products';
                $res_products = mysqli_query($conn, $sql_products);
                while ($data = mysqli_fetch_array($res_products)) {
                ?>
                    <option value="<?php echo $data['product_id']; ?>"><?php echo $data['product_id']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity:</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="text" name="price" class="form-control" required>
        </div>

        <button type="submit" name="add" class="btn btn-primary">Add Order Detail</button>
    </form>
</div>



<?php include "footer.php"; ?>