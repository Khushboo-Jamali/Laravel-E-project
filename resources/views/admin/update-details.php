<?php include "header.php"; ?>
<?php
// Ensure to connect to the database
include 'config.php';

// Check if the form has been submitted
if (isset($_POST['update_detail'])) {
    $orderDetail_id = $_POST['orderDetail_id'];
    $order_id = $_POST['order_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // SQL query to update the order detail
    $sql = "UPDATE `order_details` 
            SET `order_id` = '$order_id', `product_id` = '$product_id', 
                `quantity` = '$quantity', `price` = '$price' 
            WHERE `orderDetail_id` = '$orderDetail_id'";

    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('Location: view_details.php?msg=Order_detail_updated_successfully');
        exit();
    } else {
        header('Location: view-details.php?msg=Order_detail_not_updated');
        exit();
    }
}
?>

<div class="container mt-5">
    <form action="" method="post">
        <?php
        // Fetch the order detail to be updated
        if (isset($_GET['detail'])) {
            $detail_id = $_GET['detail'];
            $sel = "SELECT * FROM order_details WHERE orderDetail_id = '$detail_id'";
            $result = mysqli_query($conn, $sel);
            $row = mysqli_fetch_array($result);
        ?>
            <input type="hidden" name="orderDetail_id" value="<?php echo $row['orderDetail_id']; ?>" />

            <div class="mb-3">
                <label class="form-label">Select Order Id</label>
                <select class="form-select" name="order_id" required>
                    <option value="">Select Order</option>
                    <?php
                    // Fetch all orders
                    $order_query = 'SELECT order_id FROM orders';
                    $order_res = mysqli_query($conn, $order_query);
                    while ($order = mysqli_fetch_array($order_res)) {
                    ?>
                        <option value="<?php echo $order['order_id']; ?>" <?php echo ($order['order_id'] == $row['order_id']) ? 'selected' : ''; ?>>
                            <?php echo $order['order_id']; ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Select Product Id</label>
                <select class="form-select" name="product_id" required>
                    <option value="">Select Product</option>
                    <?php
                    // Fetch all products
                    $product_query = 'SELECT product_id FROM products';
                    $product_res = mysqli_query($conn, $product_query);
                    while ($product = mysqli_fetch_array($product_res)) {
                    ?>
                        <option value="<?php echo $product['product_id']; ?>" <?php echo ($product['product_id'] == $row['product_id']) ? 'selected' : ''; ?>>
                            <?php echo $product['product_id']; ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity" value="<?php echo $row['quantity']; ?>" required />
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" name="price" value="<?php echo $row['price']; ?>" required />
            </div>

            <button type="submit" class="btn btn-primary" name="update_detail">
                Update Details
            </button>
        <?php
        } else {
            echo "<p>Order detail not found!</p>";
        }
        ?>
    </form>
</div>

<?php include "footer.php"; ?>