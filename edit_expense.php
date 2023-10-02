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
                    <?php 
                    require("include/config.php");

                    if(isset($_GET['edit']))
                    {
                        $edit_id=$_GET['edit'];
                       $select_expense= "SELECT * FROM expense WHERE expense_id='$edit_id'";
                       $run_edit=mysqli_query($conn,$select_expense);
                       $row=mysqli_fetch_array($run_edit);

                       $dbexpense_amount=$row['expense_amount'];
                       $dbcategory_id=$row['category_id'];
                       $dbexpense_details=$row['expense_details'];
                       $dbexpense_receipt=$row['expense_receipt'];
                       $dbexpense_date=$row['expense_date'];

                    }
                    ?>
                 <h1 class="h3 mb-4 text-gray-800">Update Expense</h1>

                    <div class="row">
                        <div class="col">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" name="expense_amount" value="<?php echo $dbexpense_amount;?>" class="form-control" required />
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Category</label>
                                            <select class="form-control" name="category_id" required >

                                                <option disabled >Select Category</option>

                                                <?php 
                                                require("include/config.php");
                                                $select_category = "SELECT * FROM category WHERE category_purpose='expense'";
                                                $run_category= mysqli_query($conn,$select_category);
                                                while($row_category= mysqli_fetch_array($run_category)){
                                                    $category_id = $row_category['category_id'];
                                                    $category_name = $row_category['category_name'];
                                                   

                                                ?>
                                                <option <?php if($dbcategory_id=== $category_id) {echo "selected";}?> value="<?php echo $category_id; ?>"> <?php echo $category_name;?></option>
                                                 <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Receipt</label>
                                            <input type="file" class="form-control" name= "expense_receipt" value="<?php echo $dbexpense_receipt;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form=control" name="expense_date" value="<?php echo $dbexpense_date;?>">
                                </div>
                                <div class="form-group">
                                    <label>Details</label>
                                    <textarea class="form-control" name="expense_details"><?php echo $dbexpense_details;?></textarea>                               
                                 </div>
                                 <div class="form-group">
                                    <input type="submit" class="btn btn-success" name="insert_btn" value="Add Expense">
                                </div>
                                
                            </form>

                            <?php
                            require("include/config.php");
                            if(isset($_POST['insert_btn']))
                            {
                                $expense_amount= $_POST['expense_amount'];
                                $category_id=$_POST['category_id'];
                                $expense_date= $_POST['expense_date'];
                                $expense_details=$_POST['expense_details'];
                                $expense_receipt_name=$_FILES['expense_receipt'] ['name'];
                                $expense_receipt_tmp_name=$_FILES['expense_receipt'] ['tmp_name'];

                                if(empty($expense_receipt_name)){
                                    $expense_receipt_name= $dbexpense_receipt;
                                }
                                $month=date('m');
                                $year=date('y');

                                $category_id=$_POST['category_id'];
                                $category_id=$_POST['category_id'];
                                $update_expense= "UPDATE expense SET expense_amount='$expense_amount',category_id='$category_id', expense_details='$expense_details',expense_receipt='$expense_receipt_name',expense_date='$expense_date',expense_month='$month',expense_year='$year' WHERE expense_id='$edit_id'";

                                $run_update= mysqli_query($conn,$update_expense);
                                if ($run_update === true) {

                                    echo "<div class='alert alert-success'>Data Has Been Updated</div>";
                                    echo "<script >window.open('expense.php','_blank')</script>";
                                    move_uploaded_file($income_receipt_tmp_name,"images/$expense_receipt_name");
                                    
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
    require("include/footer.php");?>