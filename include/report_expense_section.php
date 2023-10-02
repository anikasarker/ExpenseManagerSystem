<div class="row">

<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Expense Breakdown</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                    aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
            <script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: ""
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{}",
		indexLabelFontSize: 14,
		indexLabel: "{label} - {y}%",
		dataPoints: [
            <?php 
                require("include/config.php");

                $select_category= " SELECT * FROM category ";
                $run = mysqli_query($conn,$select_category);
                while ($row_category= mysqli_fetch_array($run))
                {
                    $category_id= $row_category['category_id'];
                    $category_name= $row_category['category_name'];


                    
                 $select_total_expense= "SELECT SUM(expense_amount)FROM expense WHERE expense_month='$months' "  ;
                 $run_total_expense=mysqli_query($conn,$select_total_expense);
                 $row_total_expense= mysqli_fetch_array($run_total_expense);
                 $total_expense= $row_total_expense['SUM(expense_amount)'];

                    
                    $select_expense= "SELECT * FROM expense where category_id= '$category_id' AND expense_month ='$months'";
                    $run_expense= mysqli_query($conn,$select_expense);
                    while($row_expense=mysqli_fetch_array($run_expense))
                    {
                        $expense_id= $row_expense['expense_id'];
                        $expense_amount= $row_expense['expense_amount'];

                        $percentage = $expense_amount * 100 / $total_expense;
                        $expense_percentage= number_format($percentage, 2);

                
              
                ?>
			{ y: <?php echo $expense_percentage;?>, label: "<?php echo $category_name ;?>" },
            <?php   } }?>
            

			
		]
	}]
});
chart.render();

}
</script>
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
           <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>            </div>
        </div>
    </div>
</div>

<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4 pre-scrollable">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Budget</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                    aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">

        <?php 
        require("include/config.php");

        $select_category= "SELECT * FROM category WHERE category_purpose='expense'";
        $run_category=mysqli_query($conn,$select_category);
       while( $row=mysqli_fetch_array($run_category)){
                 $category_id=$row['category_id'];
                 $category_name=$row['category_name'];

                 $select_total_expense= "SELECT SUM(expense_amount) FROM expense WHERE expense_month='$months' AND category_id='$category_id'";
                 $run_total= mysqli_query($conn,$select_total_expense);
                 $row_total= mysqli_fetch_array($run_total);
                 $total_expense= $row_total['SUM(expense_amount)'];


                 $select_budget= "SELECT SUM(budget_amount) FROM budget WHERE category_id='$category_id'";
                 $run_budget=mysqli_query($conn,$select_budget);
                 $row_budget= mysqli_fetch_array($run_budget);
                 $total_budget= $row_budget['SUM(budget_amount)'];

                 if($total_expense >0 && $total_budget >0)
                 {  
                    $percentage= $total_expense / $total_budget  *100;
                    $percentage_progress= number_format($percentage, 2);

        ?>
            <h4 class="small font-weight-bold"><?php echo $category_name?> <span
                    class="float-right"><span class="text-success">Spent:<?php echo $total_expense;?> |</span ><span class="text-danger">Budget: <?php echo $total_budget;?></span></span></h4>
            <div class="progress mb-4">
                <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $percentage_progress?>%"
                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> <?php echo $percentage_progress?>%</div>
            </div>
            <?php } }?>
        </div>
                
    </div>
</div>
</div>