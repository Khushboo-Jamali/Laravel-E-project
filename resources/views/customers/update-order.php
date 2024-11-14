<?php include "header.php"; ?>
<?php
// Ensure to connect to the database
include 'config.php';

if (isset($_POST['up_order'])) {
    $order_id = $_POST['id'];
    $order_date = $_POST['date'];
    $totalAmount = $_POST['tamount'];
    $customer_id = $_POST['customer_id'];

    // SQL query to update the order
    $sql = "UPDATE `orders` 
            SET `customer_id` = '$customer_id', `order_date` = '$order_date', `totalAmount` = '$totalAmount' 
            WHERE `order_id` = '$order_id'";

    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('Location: view-orders.php?msg=Order_updated_successfully');
        exit();
    } else {
        header('Location: view-orders.php?msg=Order_not_updated');
        exit();
    }
}
?>

<div class="container">
    <form action="" method="post">
        <?php
        $sel = "SELECT * FROM orders";
        $res = mysqli_query($conn, $sel);
        while ($row = mysqli_fetch_array($res)) {
        ?>

            <div class="mb-3">
                <input type="hidden" name="id" value="<?php echo $row['order_id']; ?>" />
                <label for="" class="form-label">Order Date</label>
                <input
                    type="date"
                    class="form-control"
                    name="date"
                    value="<?php echo $row['order_date'] ?>"
                    id="" />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Total Amount</label>
                <input
                    type="number"
                    class="form-control"
                    name="tamount"
                    value="<?php echo $row['totalAmount'] ?>"
                    id="" />
            </div>

            <div class="mb-3">
                <label class="form-label">Select Customer Id</label>
                <select class="form-select" name="customer_id" required>
                    <option value="">Select customer</option>
                    <?php
                    $sql = 'SELECT customer_id FROM customers';
                    $res = mysqli_query($conn, $sql);
                    while ($data = mysqli_fetch_array($res)) {
                    ?>
                        <option value="<?php echo $data['customer_id']; ?>" <?php echo ($data['customer_id'] == $row['customer_id']) ? 'selected' : ''; ?>>
                            <?php echo $data['customer_id']; ?>
                        </option>

                    <?php
                    }
                    ?>
                </select>
            </div>

            <button
                type="submit"
                class="btn btn-primary"
                name="up_order">
                Submit
            </button>
        <?php
        }
        ?>
    </form>
</div>

<?php
include "./footer.php";

?>