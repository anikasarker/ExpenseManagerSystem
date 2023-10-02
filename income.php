<?php require 'include/top.php'; ?>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require 'include/sidebar.php'; ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require 'include/navbar.php'; ?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Income </h1>
                    <div class="row">
                        <div class="col">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">DataTables For Income</h6>
                                </div>
                                <?php
                                require("include/config.php");
                                if(isset($_GET['del'])){
                                  $del_id=$_GET['del'];

                                  $delete= "DELETE FROM income WHERE income_id='$del_id'";
                                  $run = mysqli_query($conn,$delete);
                                  if ($run === true) {
                                    echo "<div class='alert alert-success'>Data Has Been Deleted </div>";
                                } else {
                                    echo "<div class='alert alert-danger'>Failed</div>";
                                }
                                }
                                ?>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Income Amount</th>
                                                    <th>Category Name</th>
                                                    <th>Income Details</th>
                                                    <th>Income Receipt</th>
                                                    <th>Income Date</th>
                                                    <th>Action</th>
                                                   
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                require("include/config.php");
                                                $select_income = "SELECT * FROM income";
                                                $run_income= mysqli_query($conn,$select_income);

                                                while($row_income= mysqli_fetch_array($run_income)){
                                                $income_id = $row_income[0];
                                                $income_amount = $row_income[1];
                                                $category_id=$row_income[2];
                                                $income_details = $row_income[3];
                                                $income_receipt = $row_income[4];
                                                $income_date = $row_income[5];

                                                $select_category="SELECT * FROM category WHERE category_id='$category_id'";
                                                $run_category= mysqli_query($conn,$select_category);
                                                $row_category=mysqli_fetch_array($run_category);
                                                $category_name=$row_category['category_name'];

                                                ?>
                                                <tr>
                                                    <td><?php echo $income_id;?></td></td>
                                                    <td><?php echo $income_amount;?></td>
                                                    <td><?php echo $category_name;?></td>
                                                    <td><?php echo $income_details;?></td>
                                                    <td><img src="images/<?php echo $income_receipt;?>" alt="" height="60px" width="60px"></td>
                                                    <td><?php echo $income_date;?></td>

                                                    <td><a href="income.php?del=<?php echo $income_id;?>" class="btn btn-danger ">Delete</a>
                                                    <a href="edit_income.php?edit=<?php echo $income_id;?>" class="btn btn-primary ">Update</a>
                                                </td>
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>

                    <!-- /.container-fluid -->

                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Your Website 2020</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            require "include/footer.php"; ?>