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
                    <h1 class="h3 mb-4 text-gray-800">Expense</h1>
                    <div class="row">
                        <div class="col">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">DataTables For Expense</h6>
                                </div>
                                <?php
                                require("include/config.php");
                                if(isset($_GET['del'])){
                                  $del_id=$_GET['del'];

                                  $delete= "DELETE FROM expense WHERE expense_id='$del_id'";
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
                                                    <th>expense Amount</th>
                                                    <th>Category Name</th>
                                                    <th>Expense Details</th>
                                                    <th>Expense Receipt</th>
                                                    <th>Expense Date</th>
                                                    <th>Action</th>
                                                   
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                require("include/config.php");
                                                $select_expense = "SELECT * FROM expense";
                                                $run_expense= mysqli_query($conn,$select_expense);

                                                while($row_expense= mysqli_fetch_array($run_expense)){
                                                $expense_id = $row_expense[0];
                                                $expense_amount = $row_expense[1];
                                                $category_id=$row_expense[2];
                                                $expense_details = $row_expense[3];
                                                $expense_receipt = $row_expense[4];
                                                $expense_receipt = $row_expense[4];
                                                $expense_date = $row_expense[5];

                                                $select_category="SELECT * FROM category WHERE category_id='$category_id'";
                                                $run_category= mysqli_query($conn,$select_category);
                                                $row_category=mysqli_fetch_array($run_category);
                                                $category_name=$row_category['category_name'];

                                                ?>
                                                <tr>
                                                    <td><?php echo $expense_id;?></td></td>
                                                    <td><?php echo $expense_amount;?></td>
                                                    <td><?php echo $category_name;?></td>
                                                    <td><?php echo $expense_details;?></td>
                                                    <td><img src="images/<?php echo $expense_receipt;?>" alt="" height="60px" width="60px"></td>
                                                    <td><?php echo $expense_date;?></td>

                                                    <td><a href="expense.php?del=<?php echo $expense_id;?>" class="btn btn-danger ">Delete</a>
                                                    <a href="edit_expense.php?edit=<?php echo $expense_id;?>" class="btn btn-primary ">Update</a>
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