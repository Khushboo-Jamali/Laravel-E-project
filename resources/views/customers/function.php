<?php


// login code
session_start();
include "config.php";

// customer profile update
if (isset($_POST['up_customer'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $add = $_POST['address'];
    $img_name = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $folder = "images/" . $img_name;
    if (move_uploaded_file($tmp_name, $folder)) {
        $sql = "UPDATE `customers` SET `firstname`='$fname',`lastname`='$lname',`email`='$email',`phone`='$phone', `address`='$add' ,`pic`='$folder' WHERE customer_id ='$id'";
        $qurey = mysqli_query($conn, $sql);
        if ($qurey) {
            header("location:user_profile.php");
        }
    } else {
        $sql = "UPDATE `customers` SET `firstname`='$fname',`lastname`='$lname',`email`='$email',`phone`='$phone', `address`='$add'  WHERE customer_id ='$id'";
        $qurey = mysqli_query($conn, $sql);
        header("location:user_profile.php");
    }
}



// update delivery  like active deactive
if (isset($_GET['delivery'])) {
    $id = $_GET['delivery'];
    $status = $_GET['status'];
    if ($status == "Completed") {
        $requests = "UPDATE deliveries SET delivery_status = 'Uncompleted' WHERE delivery_id = '$id'";
    } else {
        $requests = "UPDATE deliveries SET delivery_status= 'Completed' WHERE  delivery_id = '$id'";
    }
    if (mysqli_query($conn,  $requests) == true) {
        header("location:view-deliverie.php?msg=status update successfully");
    } else {
        header("location:view-deliverie.php?msg=status not update successfully");
    }
}

// //delet Products
if (isset($_GET['delete_id'])) {
    $p_id = $_GET['delete_id'];

    // First, delete the related records in the stock table
    $delete_stock = "DELETE FROM `stock` WHERE product_id = '$p_id'";
    mysqli_query($conn, $delete_stock); // Run the query to remove the stock records

    // Now, delete the product
    $delete_product = "DELETE FROM `products` WHERE product_id = '$p_id'";
    $result = mysqli_query($conn, $delete_product);

    if ($result) {
        header('location:view-product.php');
    }
}


//delet Stock
if (isset($_GET['pr_id'])) {
    $id = $_GET['pr_id'];
    $del = "DELETE FROM `stock` WHERE stock_id = '$id'";
    $res = mysqli_query($conn, $del);
    if ($res) {
        header("location:view-stock.php");
    }
}
// delete orders
if (isset($_GET['orderid'])) {
    $o_id = $_GET['orderid'];

    // Start by deleting related records from order_details table
    $del_details = "DELETE FROM `order_details` WHERE order_id = '$o_id'";
    $details_res = mysqli_query($conn, $del_details);

    // Check if deletion from order_details was successful
    if ($details_res) {
        // Then delete related records from deliveries table
        $del_deliveries = "DELETE FROM `deliveries` WHERE order_id = '$o_id'";
        $deliveries_res = mysqli_query($conn, $del_deliveries);

        // Check if deletion from deliveries was successful
        if ($deliveries_res) {
            // Finally, delete the order itself
            $del_order = "DELETE FROM `orders` WHERE order_id = '$o_id'";
            $order_res = mysqli_query($conn, $del_order);
            if ($order_res) {
                header("location:view-orders.php");
                exit();
            } else {
                echo "Error deleting order: " . mysqli_error($conn);
            }
        } else {
            echo "Error deleting deliveries: " . mysqli_error($conn);
        }
    } else {
        echo "Error deleting order details: " . mysqli_error($conn);
    }
}

// detete details

if (isset($_GET['detail_delete'])) {
    $detail_id = $_GET['detail_delete'];

    // Run the DELETE query
    $delete_query = "DELETE FROM `order_details` WHERE orderDetail_id = '$detail_id'";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        header("Location: view_details.php?msg=Order detail deleted successfully.");
        exit();
    } else {
        echo "Error deleting order detail: " . mysqli_error($conn);
    }
}



// delete feedback
if (isset($_GET['delete'])) {
    $feed_id = $_GET['delete'];
    $del = "DELETE FROM `feedback` WHERE feed_id = '$feed_id'";
    $res = mysqli_query($conn, $del);
    if ($res) {
        header("location:view_feedback.php");
    }
}
