<?php
include 'header.php';
include 'config.php';
if (isset($_POST['upemp'])) {
    $emp_id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['contact'];
    $date = $_POST['hiredate'];


    $sql = "UPDATE `employees` SET `first_name`='$fname',`last_name`='$lname',`email`='$email',`phone`='$phone',`hire_date`='$date' WHERE employee_id ='$emp_id'";

    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('Location: view-employee.php?msg=Employee_Updated_successfully');
        exit();
    } else {
        header('Location: view-employee.php?msg=Employee_Updated_successfully');
        exit();
    }
}
?>

<div class="container">
    <form action="" method="post">
        <?php


        $sql = 'SELECT * FROM employees';
        $res = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($res)) {
        ?>

            <div class="mb-3">
                <label for="" class="form-label">First Name</label>
                <input type="hidden" name="id" value="<?php echo $data['employee_id'] ?>">
                <input
                    type="text"
                    class="form-control"
                    name="fname"
                    value="<?php echo $data['first_name'] ?>"
                    id=""
                    required
                    placeholder="" />

            </div>

            <form action="function.php" method="post">
                <div class="mb-3">
                    <label for="" class="form-label">Last Name</label>
                    <input
                        type="text"
                        class="form-control"
                        name="lname"
                        value="<?php echo $data['last_name'] ?>"
                        id=""
                        required
                        placeholder="" />

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input
                        type="email"
                        value="<?php echo $data['email'] ?>"
                        class="form-control"
                        name="email"
                        id=""
                        required />

                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Phone Number</label>
                    <input
                        type="number"
                        value="<?php echo $data['phone'] ?>"
                        class="form-control"
                        name="contact"
                        id=""
                        required />

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Hire Date</label>
                    <input
                        type="date"
                        class="form-control"
                        name="hiredate"
                        value="<?php echo $data['hire_date'] ?>"
                        id=""
                        required />

                </div>


                <button
                    type="submit"
                    name="upemp"
                    class="btn btn-primary">
                    Submit
                </button>
            <?php
        }
            ?>
            </form>
</div>

<?php
include 'footer.php';

?>