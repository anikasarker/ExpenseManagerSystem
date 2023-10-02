<?php  require('include/top.php') ;

?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require('include/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <!-- End of Topbar -->
                <?php  require('include/navbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Report</h1>
                        <button onclick="window.print();" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</button>
                    </div><br>
                    <form class="form-inline" method="post">
                      <label >Month</label>
                    <select class="form-control"  name="month">
                     <option value="01">January</option>
                     <option value="02">February</option>                    
                     <option value="03">March</option>
                     <option value="04">April</option>
                     <option value="05">May</option>
                     <option value="06">June</option>
                     <option value="07">July</option>
                     <option value="08">August</option>
                     <option value="09">September</option>
                     <option value="10">October</option>
                     <option value="11">November</option>
                     <option value="12">December</option>
                    </select>

                    <label >Year</label> 
                    <select class="form-control"  name="year">
                     <option value="2023">2023</option>
                     <option value="2022">2022</option>
                     <option value="2021">2021</option>
                     <option value="2020">2020</option>
                     <option value="2019">2019</option>
                     <option value="2018">2018</option>
                     <option value="2017">2017</option>
                     <option value="2016">2016</option>
                     <option value="2015">2015</option>
                    </select>
                       <input type="submit"  name="submit"  class="btn btn-primary" value="Generate Report" />
                             </form> <br><br>

                             <?php
                             require('include/config.php');
                             if(isset($_POST['submit']))
                             {
                                     $months = $_POST['month'];
                                     $years= $_POST['year'];

                             
                             ?>
                    <!-- Content Row -->
                    <?php require("include/report_panel.php");?>
                   
                </div>
                <!-- /.container-fluid -->

                <?php 
                require("include/report_expense_section.php");
                ?>
<?php }?>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-6 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Income Record</h6>
            
            
                              
        </div>
        <!-- Card Body -->
        <div class="card-body">
        <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Income Amount</th>
                                                    <th>Category Name</th>
                                                    <th>Income Details</th>
                                                    <th>Income Date</th>
                                                  
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                require("include/config.php");
                                                $select_income = "SELECT * FROM income WHERE income_month='$months' AND income_year='$years'";
                                                $run_income= mysqli_query($conn,$select_income);

                                                while($row_income= mysqli_fetch_array($run_income)){
                                                $income_amount = $row_income[1];
                                                $category_id=$row_income[2];
                                                $income_details = $row_income[3];
                                                $income_date = $row_income[5];

                                                $select_category="SELECT * FROM category WHERE category_id='$category_id'";
                                                $run_category= mysqli_query($conn,$select_category);
                                                $row_category=mysqli_fetch_array($run_category);
                                                $category_name=$row_category['category_name'];

                                                ?>
                                                <tr>
                                                    <td><?php echo $income_amount;?></td>
                                                    <td><?php echo $category_name;?></td>
                                                    <td><?php echo $income_details;?></td>
                                                    <td><?php echo $income_date;?></td>

                                                   
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
        </div>
    </div>
</div>

<!-- Pie Chart -->
<div class="col-xl-6 col-lg-5">
    <div class="card shadow mb-4 pre-scrollable">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Expense record</h6>
           
        </div>
        <!-- Card Body -->
        <div class="card-body">

        
            </div>
            <!-- End of Main Content -->

            

        </div>
         </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
