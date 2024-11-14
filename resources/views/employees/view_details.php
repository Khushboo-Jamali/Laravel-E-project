<?php include "header.php"; ?>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'online_shopping');

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['msg'])) {
  echo $_GET['msg'];
}
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Order Detail Id</th>
      <th scope="col">Order Id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Order Date</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // SQL query to fetch detailed order information
    $sql = "SELECT 
        od.orderDetail_id,
        od.order_id,
        p.product_name,
        od.quantity,
        od.price,
        c.firstname,
        o.order_date
    FROM 
        order_details od
    INNER JOIN 
        products p ON od.product_id = p.product_id
    INNER JOIN 
        orders o ON od.order_id = o.order_id
    INNER JOIN 
        customers c ON o.customer_id = c.customer_id";

    $res = mysqli_query($conn, $sql);

    // Check if the query was successful
    if (!$res) {
      die("Query failed: " . mysqli_error($conn));
    }

    // Using the detailed query results
    while ($data = mysqli_fetch_array($res)) {
    ?>
      <tr>
        <td><?php echo $data['orderDetail_id']; ?></td>
        <td><?php echo $data['order_id']; ?></td>
        <td><?php echo $data['product_name']; ?></td>
        <td><?php echo $data['quantity']; ?></td>
        <td><?php echo $data['price']; ?></td>
        <td><?php echo $data['firstname']; ?></td>
        <td><?php echo $data['order_date']; ?></td>
        <td>

          <a href="function.php?detail_delete=<?php echo $data['orderDetail_id'] ?>"><i class="bi bi-trash-fill text-danger"></i></a>
          <a href="update-details.php?detail=<?php echo $data['orderDetail_id'] ?>"><i class="bx bxs-edit text-success"></i></a>


          <a href="add-details.php"> <i class="bx bxs-pencil"></i></a>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>

<?php include "footer.php"; ?>