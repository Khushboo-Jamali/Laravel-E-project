<?php
include "header.php";
?>
<?php
if (isset($_POST['addorder'])) {

    $order_date = $_POST['date'];
    $totalAmount = $_POST['tamount'];
    $Cname = $_POST['names'];

    $sql = "INSERT INTO `orders`( `order_date`, `totalAmount` ,`customer_id`) 
    VALUES ('$order_date','$totalAmount' ,'$Cname') ";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('location:add-order.php?msg=Order added successfully');
    } else {
        header('location:add_order.php?msg=Order not added');
    }
}

?>
<div class="container">
    <form action="" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Order Date</label>
            <input
                type="date"
                class="form-control"
                name="date"
                id="" />

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Total Amount</label>
            <input
                type="number"
                class="form-control"
                name="tamount"
                id="" />

        </div>


        <div class="mb-3">
            <label class="form-label">Select Coustomer Id</label>

            <select class="form-select" name="names" required>
                <option value="Select customer">Select customer</option>
                <?php
                $sql = 'SELECT customer_id From customers';
                $res = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($res)) {
                ?>
                    <option value="<?php echo $data['customer_id']   ?>"><?php echo $data['customer_id'] ?></option>
                <?php
                }
                ?>
            </select>

        </div>

        <button
            type="submit"
            class="btn btn-primary"
            name="addorder">
            Submit
        </button>
    </form>
</div>


<?php
include "./footer.php";
?>