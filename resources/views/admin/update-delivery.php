<?php
ob_start(); // Start output buffering
include "header.php";
include 'config.php';

// Check if a specific delivery ID is provided in the URL
if (isset($_GET['delivery'])) {
    $delivery_id = $_GET['delivery'];

    // Fetch the specific delivery entry
    $sel = "SELECT * FROM `deliveries` WHERE `delivery_id` = '$delivery_id'";
    $res = mysqli_query($conn, $sel);
    $row = mysqli_fetch_array($res);

    // Check if the delivery exists
    if (!$row) {
        header('Location: view-deliverie.php?msg=delivery not found');
        exit();
    }
}

if (isset($_POST['up_delivery'])) {
    $delivery_date = $_POST['date'];
    $order_id = $_POST['o_id'];

    // SQL query to update the delivery
    $sql = "UPDATE `deliveries` SET `order_id`='$order_id', `delivery_date`='$delivery_date' WHERE `delivery_id`='$delivery_id'";

    // Execute the query
    $res = mysqli_query($conn, $sql);

    // Check if the update was successful
    if ($res) {
        header('Location: view-deliverie.php?msg=delivery updated successfully');
    } else {
        header('Location: view-deliverie.php?msg=delivery not updated');
    }
    exit();
}
?>

<div class="container">
    <form action="" method="post">

        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['delivery_id']); ?>" />
        <div class="mb-3">
            <label for="" class="form-label">Quantity</label>
            <input
                type="date"
                class="form-control"
                name="date"
                value="<?php echo htmlspecialchars($row['delivery_date']); ?>"
                required />
        </div>


   

        <div class="mb-3">
            <label class="form-label">Select Order Id</label>
            <select class="form-select" name="o_id" required>
                <option value="">Select Order</option>
                <?php
                $sql = 'SELECT order_id FROM deliveries';
                $order_res = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($order_res)) {
                ?>
                    <option value="<?php echo $data['order_id']; ?>" <?php if ($data['order_id'] == $row['order_id']) echo 'selected'; ?>>
                        <?php echo $data['order_id']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" name="up_delivery">
            Submit
        </button>

    </form>
</div>

<?php include "./footer.php"; ?>
<?php
ob_end_flush(); // Flush the output buffer and turn off output buffering
?>