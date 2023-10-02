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
                    <h1 class="h3 mb-4 text-gray-800">Budget</h1>
                    <div class="row">
                        <div class="col">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                                </div>
                                <?php
                                require("include/config.php");
                                if(isset($_GET['del'])){
                                  $del_id=$_GET['del'];

                                  $delete= "DELETE FROM budget WHERE budget_id='$del_id'";
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
                                                    <th>Budget Id</th>
                                                    <th>Category</th>
                                                    <th>Budget Amount</th>
                                                    <th>Action</th>
                                                   
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                require("include/config.php");
                                                $select_budget = "SELECT * FROM budget";
                                                $run_budget= mysqli_query($conn,$select_budget);

                                                while($row_budget= mysqli_fetch_array($run_budget)){
                                                $budget_id = $row_budget[0];
                                                $category_id=$row_budget[1];
                                                $budget_amount = $row_budget[2];

                                            

                                                $select_category="SELECT * FROM category WHERE category_id='$category_id'";
                                                $run_category= mysqli_query($conn,$select_category);
                                                $row_category=mysqli_fetch_array($run_category);
                                                $category_name=$row_category['category_name'];

                                                ?>
                                                <tr>
                                                    <td><?php echo $budget_id;?></td></td>
                                                    <td><?php echo $category_name;?></td>
                                                    <td><?php echo $budget_amount;?></td>

                                                    <td><a href="budget.php?del=<?php echo $budget_id;?>" class="btn btn-danger ">Delete</a>
                                                    <a href="edit_budget.php?edit=<?php echo $budget_id;?>" class="btn btn-primary ">Update</a>
                                                </td>

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