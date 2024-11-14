<?php

include 'header.php';
?>
<?php
include 'config.php';
$sql = "SELECT * FROM employees";
$res = mysqli_query($conn, $sql);
?>

<div class="container">
    <h2>Employees Details</h2>
    <table class="table table">
        <thead>
            <tr>
                <th>Employees ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>hire_date</th>

                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($res) > 0) {
                while ($data = mysqli_fetch_assoc($res)) {
            ?>
                    <tr>
                        <td><?php echo $data['employee_id'] ?></td>
                        <td><?php echo $data['first_name'] ?></td>
                        <td><?php echo $data['last_name'] ?></td>
                        <td><?php echo $data['email'] ?></td>
                        <td><?php echo $data['phone'] ?></td>
                        <td><?php echo $data['hire_date'] ?></td>

                        <td>
                            <a href="update-employee.php?p_id=<?php echo $data['employee_id'] ?>"><i class="bx bxs-edit text-success"></i></a>
                            <a href="function.php?emp_id=<?php echo $data['employee_id'] ?>"><i class="bi bi-trash-fill text-danger"></i></a>


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