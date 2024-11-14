<?php include "header.php" ?>

<?php
include "config.php ";
?>

<div
    class="table-responsive">
    <table
        class="table table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">full Name </th>
                <th scope="col">Email</th>

                <th scope="col">Contact</th>

                <th scope="col">Feedback</th>
                <th scope="col">Action</th>




            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM feedback";
            $res = mysqli_query($conn, $sql);
            $num = 1;
            while ($data = mysqli_fetch_array($res)) {
            ?>
                <tr>
                    <td><?php echo $num ?></td>
                    <td><?php echo $data['fullname'] ?></td>
                    <td><?php echo $data['email'] ?></td>
                    <td><?php echo $data['contact'] ?></td>
                    <td><?php echo $data['mesg'] ?></td>


                    <td>
                        <a href='function.php?delete=<?php echo $data['feed_id'] ?>'> <i class="bi bi-trash-fill text-danger"></i></a>

                    </td>
                </tr>
            <?php
                $num++;
            }




            ?>
        </tbody>
    </table>
</div>





<?php include "footer.php" ?>