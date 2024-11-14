<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Sign Up</title>
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  
    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <style>
    .input-box {
    position: relative;
  }


  .input-box i {
    position: absolute;
    right: 20px;
    /* Adjust as needed */
    top: 50%;
    transform: translateY(-50%);
    font-size: 20px;
    cursor: pointer;
    color: #463e4b;
    /* Adjust color as needed */
  }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 p-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Add New Employee Account</h5>
                                    </div>

                                    <form action="{{ route('employee.signup') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                                        @csrf

                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
                                            @error('first_name') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
                                            @error('last_name') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="col-12">
                                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                                            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="mb-3 my-4">
                                            <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required>
                                            @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="input-box my-3">
                                            <input type="password" class="form-control" name="password" id="Password" placeholder="Password" required>
                                            <i class="bi bi-eye-slash-fill" id="eyeIcon"></i>
                                            @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="date" class="form-control" name="hire_date" value="{{ old('hire_date') }}" required>
                                            @error('hire_date') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="pic" class="form-label">Choose Profile Picture (Optional)</label>
                                            <input type="file" class="form-control" name="pic" accept="image/*">
                                            @error('pic') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                                        </div>
                                        <div class="col-12">
                                            {{-- <span>Already have an account? <a href="{{ route('login') }}">Login</a></span> --}}
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <script>
        document.getElementById("eyeIcon").addEventListener("click", function () {
            var passwordInput = document.getElementById("Password");
            var eyeIcon = document.getElementById("eyeIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("bi-eye-slash-fill");
                eyeIcon.classList.add("bi-eye-fill");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("bi-eye-fill");
                eyeIcon.classList.add("bi-eye-slash-fill");
            }
        });
    </script>
</body>
</html>
