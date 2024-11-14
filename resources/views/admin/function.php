<?php


// login code
session_start();
include "config.php";

// customer profile update
if (isset($_POST['up_user'])) {
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
        $sql = "UPDATE `users` SET `firstname`='$fname',`lastname`='$lname',`email`='$email',`phonenumber`='$phone', `address`='$add' ,`pic`='$folder' WHERE user_id ='$id'";
        $qurey = mysqli_query($conn, $sql);
        if ($qurey) {
            header("location:user_profile.php");
        }
    } else {
        $sql = "UPDATE `users` SET `firstname`='$fname',`lastname`='$lname',`email`='$email',`phonenumber`='$phone', `address`='$add'  WHERE user_id ='$id'";
        $qurey = mysqli_query($conn, $sql);
        header("location:user_profile.php");
    }
}

// add employees
if (isset($_POST['addemp'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['contact'];
    $date = $_POST['hiredate'];
    $img_name = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $folder = "images/" . $img_name;
    $sql = "INSERT INTO `employees`( `first_name`, `last_name`, `email`, `phone`, `hire_date`,`pic`) 
    VALUES ('$fname','$lname','$email','$phone','$date','$folder')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('location: view-employee.php?msg=Employee_Add_successfully');
    } else {
        header('location: view-employee.php?msg=Employee_Not_Add_successfully');
    }
}

// update delivery  like active deactive
if (isset($_GET['delivery'])) {
    $id = $_GET['delivery'];


    $delete_query = "DELETE FROM `deliveries` WHERE delivery_id = '$id'";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        header("Location:view-deliverie.php?msg=Delivery_Deleted_successfully");
        exit();
    } else {
        echo "Error deleting Delivery detail: " . mysqli_error($conn);
    }
}

// //delet Products
if (isset($_GET['delete_id'])) {
    $p_id = $_GET['delete_id'];

    $delete_stock = "DELETE FROM `stock` WHERE product_id = '$p_id'";
    mysqli_query($conn, $delete_stock);
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


    $del_details = "DELETE FROM `order_details` WHERE order_id = '$o_id'";
    $details_res = mysqli_query($conn, $del_details);


    if ($details_res) {

        $del_deliveries = "DELETE FROM `deliveries` WHERE order_id = '$o_id'";
        $deliveries_res = mysqli_query($conn, $del_deliveries);


        if ($deliveries_res) {

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

    $delete_query = "DELETE FROM `order_details` WHERE orderDetail_id = '$detail_id'";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        header("Location: view_details.php?msg=Order_detail_deleted_successfully.");
        exit();
    } else {
        echo "Error deleting order detail: " . mysqli_error($conn);
    }
}
// delete employees
if (isset($_GET['emp_id'])) {
    $detail_id = $_GET['emp_id'];

    $delete_query = "DELETE FROM `employees` WHERE employee_id = '$detail_id'";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        header("Location: view-employee.php?msg=Employee_deleted_successfully.");
        exit();
    } else {
        echo "Error deleting Employee detail: " . mysqli_error($conn);
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
