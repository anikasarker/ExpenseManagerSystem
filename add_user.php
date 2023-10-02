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
                    <h1 class="h3 mb-4 text-gray-800">Add User</h1>
                    <div class="row">
                        <div class="col">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="user_name" class="form-control" required/>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Email</label>
                                            <input type="email" name="user_email" class="form-control" required/>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Password</label>
                                            <input type="text" class="form-control" name= "user_password">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form=control" name="user_image">
                                </div>
                                
                                 <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="insert_btn" value="Add User">
                                </div>
                                
                            </form>

                            <?php
                            require("include/config.php");
                            if(isset($_POST['insert_btn']))
                            {
                                $user_name=$_POST['user_name'];
                                $user_email=$_POST['user_email'];
                                $user_password=$_POST['user_password'];
                                $user_image=$_FILES['user_image']['name'];
                                $user_tmp_name=$_FILES['user_image']['tmp_name'];

                                $check_email= "SELECT * FROM user WHERE user_email='$user_email'";
                                $run_check_email= mysqli_query($conn,$check_email);
                                if(mysqli_num_rows($run_check_email)>0)
                                {
                                    echo "Email already exist";
                                } else{
                                    $insert_user= "INSERT INTO user(user_name,user_email,user_password,user_image) VALUES(' $user_name','$user_email','$user_password','$user_image')" ;
                                    $run_user= mysqli_query($conn,$insert_user);
                                   if ($run_user === true) {
                                       echo "<div class='alert alert-success'>User Has Been Inserted </div>";
                                       move_uploaded_file($user_tmp_name,"images/$user_image");
                                   } else {
                                       echo "<div class='alert alert-danger'>Failed</div>";
                                   }
   
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