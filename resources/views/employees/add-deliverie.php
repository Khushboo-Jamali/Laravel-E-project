<?php
ob_start();
include 'header.php';

// Ensure to connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'online_shopping');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['add_deliverie'])) {
    $delivery_date = $_POST['date'];
    $order_id = $_POST['names']; // Capture the selected order ID

    // SQL query to insert the delivery record
    $sql = "INSERT INTO `deliveries` (`delivery_date`, `order_id`) 
            VALUES ('$delivery_date', '$order_id')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        header('Location: add-deliverie.php?msg=Delivery_added_successfully');
    } else {
        header('Location: add-deliverie.php?msg=Delivery not added');
    }
}
?>

<div class="container">
    <form action="" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Delivery Date</label>
            <input
                type="date"
                class="form-control"
                name="date"
                required
                id="" />
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Select Order ID</label>
            <select class="form-select" name="names" required>
                <option value="">Select Order</option>
                <?php
                $sql = 'SELECT order_id FROM orders';
                $res = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($res)) {
                ?>
                    <option value="<?php echo $data['order_id']; ?>"><?php echo $data['order_id']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" name="add_deliverie">
            Submit
        </button>
    </form>
</div>

<?php
ob_end_flush();
include 'footer.php';
?>