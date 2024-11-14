<?php include "header.php"; ?>
<?php
include "config.php";

// SQL query to fetch order details
$sql = "SELECT 
            o.order_id,
            o.customer_id,
            o.order_date,
            o.totalAmount,
            c.firstname 
        FROM 
            orders o
        LEFT JOIN 
            customers c ON o.customer_id = c.customer_id";

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
      <th scope="col">Order Id</th>

      <th scope="col">Customer Name</th>
      <th scope="col">Order Date</th>
      <th scope="col">Total Amount</th>
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
        <td><?php echo $data['order_id']; ?></td>
        <td><?php echo $data['firstname'] ?></td> <!-- Display customer name -->
        <td><?php echo $data['order_date']; ?></td>
        <td><?php echo $data['totalAmount']; ?></td>
        <td>

          <a href="update-order.php?id=<?php echo $data['order_id'] ?>"><i class="bx bxs-edit text-success"></i></a>
          <a href="function.php?orderid=<?php echo $data['order_id'] ?>"><i class="bi bi-trash-fill text-danger"></i></a>


          <a href="add-order.php"> <i class="bx bxs-pencil"></i></a>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>

<?php include "footer.php"; ?>