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
                    <h1 class="h3 mb-4 text-gray-800">Add Budget</h1>
                    <div class="row">
                        <div class="col">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" name="budget_amount" class="form-control" required/>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >Category</label>
                                            <select class="form-control" name="category_id" >
                                                <option >Select Category</option>

                                                <?php 
                                                require("include/config.php");
                                                $select_category = "SELECT * FROM category WHERE category_purpose='expense'";
                                                $run_category= mysqli_query($conn,$select_category);
                                                while($row_category= mysqli_fetch_array($run_category)){
                                                    $category_id = $row_category[0];
                                                    $category_name = $row_category[1];
                                                   

                                                ?>
                                                <option value="<?php echo $category_id; ?>"><?php echo $category_name;?></option>
                                                 <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                               
                                 <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="insert_btn" value="Add Budget">
                                </div>
                                
                            </form>

                            <?php
                            require("include/config.php");
                            if(isset($_POST['insert_btn']))
                            {
                                $budget_amount= $_POST['budget_amount'];
                                $category_id=$_POST['category_id'];

                                $insert_budget= "INSERT INTO budget(category_id,budget_amount) VALUES(' $category_id','$budget_amount')";

                                $run_budget= mysqli_query($conn,$insert_budget);
                                if ($run_budget === true) {
                                    echo "<div class='alert alert-success'>Data Has Been Inserted </div>";
                                    echo "<script >window.open('budget.php','_blank')</script>";

                                } else {
                                    echo "<div class='alert alert-danger'>Failed</div>";
                                }

                            }
                            ?>
                          
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    

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
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php 
    require("include/footer.php");?>