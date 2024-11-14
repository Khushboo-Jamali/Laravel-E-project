<?php
include 'header.php';

// Ensure to connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'online_shopping');
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT product_id, product_name, description, price, category FROM products";
$res = mysqli_query($conn, $sql);
?>

<div class="container">
  <h2>Products List</h2>
  <table class="table table">
    <thead>
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Category</th>
        <th>Actions</th>

      </tr>
    </thead>
    <tbody>
      <?php
      if (mysqli_num_rows($res) > 0) {
        while ($data = mysqli_fetch_assoc($res)) {
      ?>
          <tr>
            <td><?php echo $data['product_id'] ?></td>
            <td><?php echo $data['product_name'] ?></td>
            <td><?php echo $data['description'] ?></td>
            <td><?php echo $data['price'] ?></td>
            <td><?php echo $data['category'] ?></td>
            <td>
              <a href="update-product.php?p_id=<?php echo $data['product_id'] ?>"><i class="bx bxs-edit text-success"></i></a>
              <a href="function.php?delete_id=<?php echo $data['product_id'] ?>"><i class="bi bi-trash-fill text-danger"></i></a>


            </td>


          </tr>
      <?php
        }
      } else {
        echo "<tr><td colspan='5'>No products found.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<?php
include 'footer.php';
?>