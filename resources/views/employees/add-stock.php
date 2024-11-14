<?php
include "header.php";
?>
<?php
if (isset($_POST['add_stock'])) {

    $quantity = $_POST['quantity'];
    // $ = $_POST['tamount'];
    $Cname = $_POST['names'];

    $sql = "INSERT INTO `stock`( `quantity`, `product_id`) 
    VALUES ('$quantity','$Cname') ";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('Location: add-stock.php?msg=Stock added successfully');
    } else {
        header('location:add-stock.php?msg=Order not added');
    }
}

?>
<div class="container">
    <form action="" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Quantity</label>
            <input
                type="number"
                class="form-control"
                name="quantity"
                id="" />

        </div>



        <div class="mb-3">
            <label class="form-label">Select Product Id</label>

            <select class="form-select" name="names" required>
                <option value="Select products">Select Product</option>
                <?php
                $sql = 'SELECT product_id From products';
                $res = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($res)) {
                ?>
                    <option value="<?php echo $data['product_id']   ?>"><?php echo $data['product_id'] ?></option>
                <?php
                }
                ?>
            </select>

        </div>

        <button
            type="submit"
            class="btn btn-primary"
            name="add_stock">
            Submit
        </button>
    </form>
</div>


<?php
include "footer.php";
?>