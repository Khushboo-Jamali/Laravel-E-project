<?php
include 'header.php';

?>

<div class="container">
    <form action="function.php" method="post">
        <div class="mb-3">
            <label for="" class="form-label">First Name</label>
            <input
                type="text"
                class="form-control"
                name="fname"

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
                    id=""
                    required
                    placeholder="" />

            </div>

            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    id=""
                    required />

            </div>
            <div class="mb-3">
                <label for="" class="form-label">Phone Number</label>
                <input
                    type="number"
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
                    id=""
                    required />

            </div>

            <div class="mb-3">
                <label for="" class="form-label">Choose file</label>
                <input
                    type="file"
                    class="form-control"
                    name="img"
                    id=""
                    required />

            </div>


            <button
                type="submit"
                name="addemp"
                class="btn btn-primary">
                Submit
            </button>

        </form>
</div>

<?php
include 'footer.php';

?>