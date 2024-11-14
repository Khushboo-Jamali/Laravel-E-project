<?php
include 'header.php';

// Ensure to connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'online_shopping');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch deliveries along with their associated order details
$sql = "SELECT d.delivery_id, d.order_id, d.delivery_date, d.delivery_status 
        FROM deliveries d 
        JOIN orders o ON d.order_id = o.order_id";
$res = mysqli_query($conn, $sql);
?>

<div class="container">
    <h2>Deliveries List</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Delivery ID</th>
                <th scope="col">Order ID</th>
                <th scope="col">Delivery Date</th>
                <th scope="col">Delivery Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($res) > 0) {
                while ($data = mysqli_fetch_assoc($res)) {
            ?>
                    <tr>
                        <td><?php echo $data['delivery_id']; ?></td>
                        <td><?php echo $data['order_id'] ?></td> <!-- Display customer name -->
                        <td><?php echo $data['delivery_date']; ?></td>
                        <td><?php echo $data['delivery_status']; ?></td>
                        <td>

                            <a href="function.php?delivery=<?php echo $data['delivery_id'] ?>&status=<?php echo $data['delivery_status'] ?>"> <i class="bi bi-trash-fill text-danger"></i></a>
                            <a href="update-delivery.php?delivery=<?php echo $data['delivery_id'] ?>"><i class="bx bxs-edit text-success"></i></a>


                            <a href="add-deliverie.php"> <i class="bx bxs-pencil"></i></a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include 'footer.php';
?>