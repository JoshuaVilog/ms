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
                    <!-- <h1 class="h3 mb-4 text-gray-800">Table Page</h1> -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">User Management</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <button class="btn btn-primary mb-4" id="btnOpenAddModal">New</button>
                                <table class="table table-bordered display" id="tableRecords" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>FullName</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>FullName</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="tbody-records">
                                        
                                    </tbody>
                                </table>
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

    <!-- Modal-->
    <?php 
    include "modal/modalAdd.php";
    include "modal/modalEdit.php";
    
    ?>

    <?php include "../script.php";?>
    <script src="js/table.js?v=<?php echo $generateRandomNumber; ?>"></script>
    <script src="js/functions.js?v=<?php echo $generateRandomNumber; ?>"></script>
</body>

</html>