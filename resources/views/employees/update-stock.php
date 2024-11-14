<?php
ob_start(); // Start output buffering
include "header.php";
include 'config.php';

// Check if a specific stock ID is provided in the URL
if (isset($_GET['pr_id'])) {
    $stock_id = $_GET['pr_id'];

    // Fetch the specific stock entry
    $sel = "SELECT * FROM `stock` WHERE `stock_id` = '$stock_id'";
    $res = mysqli_query($conn, $sel);
    $row = mysqli_fetch_array($res);

    // Check if the stock exists
    if (!$row) {
        header('Location: view-stock.php?msg=Stock not found');
        exit();
    }
}

if (isset($_POST['up_stock'])) {
    $quantity = $_POST['quantity'];
    $product_id = $_POST['product_id'];

    // SQL query to update the stock
    $sql = "UPDATE `stock` SET `product_id`='$product_id', `quantity`='$quantity' WHERE `stock_id`='$stock_id'";

    // Execute the query
    $res = mysqli_query($conn, $sql);

    // Check if the update was successful
    if ($res) {
        header('Location: view-stock.php?msg=Stock updated successfully');
    } else {
        header('Location: view-stock.php?msg=Stock not updated');
    }
    exit();
}
?>

<div class="container">
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['stock_id']); ?>" />
        <div class="mb-3">
            <label for="" class="form-label">Quantity</label>
            <input
                type="number"
                class="form-control"
                name="quantity"
                value="<?php echo htmlspecialchars($row['quantity']); ?>"
                required />
        </div>

        <div class="mb-3">
            <label class="form-label">Select product Id</label>
            <select class="form-select" name="product_id" required>
                <option value="">Select product</option>
                <?php
                $sql = 'SELECT product_id FROM products';
                $product_res = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($product_res)) {
                ?>
                    <option value="<?php echo htmlspecialchars($data['product_id']); ?>" <?php if ($data['product_id'] == $row['product_id']) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($data['product_id']); ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" name="up_stock">
            Submit
        </button>
    </form>
</div>

<?php include "./footer.php"; ?>
<?php
ob_end_flush(); // Flush the output buffer and turn off output buffering
?>