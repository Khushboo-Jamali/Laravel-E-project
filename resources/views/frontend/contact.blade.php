@include('frontend.header')

    <!-- contact -->
    <div class="container" id="contact">
        <h1 class="text-center">CONTACT US</h1>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <i class="fas fa-phone"> Phone</i>
                    <h6>+00000000000000000</h6>
                </div>
            </div>
            <br>
            <br>

            <br>
            <br>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <i class="fa-solid fa-envelope"> Email</i>
                    <h6>example@gmail.com</h6>
                </div>
            </div>
       
           
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <i class="fa-solid fa-location-dot"> Address</i>
                    <h6>Karachi Sinfh Pakistan</h6>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 30px;">
            <form action="" method="post">
                <div class="col-md-4 py-3 py-md-1">
                    <input type="text" class="form-control form-control" placeholder="Name" name="fname">
                </div>
                <div class="col-md-4 py-3 py-md-1">
                    <input type="text" class="form-control form-control" placeholder="Email" name="email">
                </div>
                <div class="col-md-4 py-3 py-md-1">
                    <input type="number" class="form-control form-control" placeholder="Phone" name="contact">
                </div>
                <div class="form-group" style="margin-top: 20px;">
                    <textarea class="form-control" id="" rows="5" placeholder="Message" name="msg"></textarea>
                </div>
                <div id="messagebtn" class="text-center"><button name="addfeed">Add Feedback</button></div>
            </form>
        </div>
    </div>
    <!-- contact -->







    @include('frontend.footer')