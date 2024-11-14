<?php include "header.php"; ?>
<?php
include "config.php";

// SQL query to fetch order details
$sql = "SELECT 
            s.stock_id,
            s.quantity,
        
            p.product_name
        FROM 
            stock s
        LEFT JOIN 
            products p ON s.product_id = p.product_id";

$res = mysqli_query($conn, $sql);
?>
<?php
if (isset($_GET['msg'])) {
    echo $_GET['msg'];
}
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Stock Id</th>

            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>

            <th scope="col">Actions</th>

        </tr>
    </thead>
    <tbody>
        <?php
        // Check if the query was successful
        if (!$res) {
            die("Query failed: " . mysqli_error($conn));
        }

        // Using the detailed query results
        while ($data = mysqli_fetch_array($res)) {
        ?>
            <tr>
                <td><?php echo $data['stock_id']; ?></td>
                <td><?php echo $data['product_name'] ?></td> <!-- Display customer name -->
                <td><?php echo $data['quantity']; ?></td>

                <td>

                    <a href="update-stock.php?pr_id=<?php echo $data['stock_id'] ?>"><i class="bx bxs-edit text-success"></i></a>
                    <a href="function.php?pr_id=<?php echo $data['stock_id'] ?>"><i class="bi bi-trash-fill text-danger"></i></a>


                    <a href="add-stock.php"> <i class="bx bxs-pencil"></i></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php include "footer.php"; ?>