<?php 
require("include/config.php");

$current_month= date('m');
$select_income= "SELECT SUM(income_amount)FROM income WHERE income_month='$current_month'"  ;
$run_income=mysqli_query($conn,$select_income);
$row_income= mysqli_fetch_array($run_income);
  $total_income= $row_income['SUM(income_amount)'];

  $select_expense= "SELECT SUM(expense_amount)FROM expense WHERE expense_month='$current_month'"  ;
$run_expense=mysqli_query($conn,$select_expense);
$row_expense= mysqli_fetch_array($run_expense);
  $total_expense= $row_expense['SUM(expense_amount)'];

  $total_balance= $total_income - $total_expense;
?>
<div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">TK. <?php echo $total_income;?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa fa-money" style="font-size:36px"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Expense (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">TK. <?php echo $total_expense;?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa fa-money" style="font-size:36px"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Balance
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">TK. <?php echo $total_balance;?></div></div>
                                                </div>
                                                
                                            </div>
                                     
                                        <div class="col-auto">
                                        <i class="fa fa-money" style="font-size:35px"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                    
            