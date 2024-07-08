<!DOCTYPE html>
<html lang="en">
<?php include "../header.php";?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "../sidebar.php";?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "../navbar.php";?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row mb-4">
                        <div class="col pl-5 pr-5">
                            <div class="card">
                                <div class="card-header p-3">
                                    <h5>Account Profile</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Last Name:</label>
                                        <input type="text" id="txtLastName" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>First Name:</label>
                                        <input type="text" id="txtFirstName" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Middle Name:</label>
                                        <input type="text" id="txtMiddleName" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Username:</label>
                                        <input type="text" id="txtUsername" class="form-control">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" id="btnSaveUsername">Save</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col pl-5 pr-5">
                            <div class="card">
                                <div class="card-header p-3">
                                    <h5>Account Password</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Old Password:</label>
                                        <input type="password" id="txtOldPassword" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>New Password:</label>
                                        <input type="password" id="txtNewPassword" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Retype Password:</label>
                                        <input type="password" id="txtRetypePassword" class="form-control">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" id="btnSavePassword">Save</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "../footer.php";?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include "../script.php";?>
    <script src="js/functions.js?v=<?php echo $generateRandomNumber; ?>"></script>
</body>

</html>