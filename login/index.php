<!DOCTYPE html>
<html lang="en">

<?php include "../header.php";?>

<body class="" id="loginBody" style="background-color:#EEEEEE;">

    <div class="container d-flex align-items-center justify-content-center">

        <!-- Outer Row -->
        <div class="row justify-content-center" style="width: 500px" id="containerLogin">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <!-- <img src="/<?php echo $rootFolder; ?>/assets/img/logo.png" style="max-width: 150px"> -->
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            id="txtUsername" aria-describedby="emailHelp"
                                            placeholder="Enter Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="txtPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                    </div>
                                    <button  class="btn btn-success btn-user btn-block" id="btnLogin">
                                        Login
                                    </button>
                                    <div class="text-center ">
                                        <a class="small text-dark" href="#" id="btnForgotPassword">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container Email -->
        <div class="row justify-content-center" style="width: 500px; display:none;" id="containerEmail">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <!-- <img src="/<?php echo $rootFolder; ?>/assets/img/logo.png" style="max-width: 150px"> -->
                                    </div>
                                    <div class="form-group">
                                        <p class="text-center">Please contact to admin for reseting and changing your password.</p>
                                    </div>
                                    <!-- WAG MUNA BURAHIN BAKA GAMITIN PA  -->
                                    <!-- <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Find your Account</h1>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            id="" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address">
                                    </div>
                                    <div class="form-group">
                                    </div>
                                    <button  class="btn btn-success btn-user btn-block" id="">
                                        Login
                                    </button>
                                    <div class="text-center ">
                                        <a class="small text-dark" href="#" id="btnAlreadyHaveAccount">Already have account?</a>
                                    </div> -->
                                    <button  class="btn btn-success btn-user btn-block" id="btnAlreadyHaveAccount">
                                        Go back to Login
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../script.php";?>
    <script src="js/function.js?v=<?php echo $generateRandomNumber; ?>"></script>
</body>

</html>