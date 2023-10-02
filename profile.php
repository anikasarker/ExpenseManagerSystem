<?php 
require('include/top.php')?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        
        <?php 
require('include/sidebar.php')?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
            <?php 
          
require('include/navbar.php')?>
                <!-- Topbar -->
              
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Profile</h1>
                    <div class="row">
                        <div class="col-md-3">
                        <img src="images/<?php echo $user_image;?>">
                        <ul class="list-group">
                            <li class="list-group-item"><b><?php echo $user_name;?></b></li>
                            <li class="list-group-item"><?php echo $email;?></li>
                            <li class="list-group-item"><?php echo $user_password;?></li>


                        </ul>
                        </div>

                        <div class="col-md-9">
                            <h2>Edit Profile</h2>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label >Name</label>
                                    <input type="text" name="user_name" value="<?php echo $user_name;?>" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label >Password</label>
                                    <input type="text" name="user_password" value="<?php echo $user_password;?>" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label >Image</label>
                                    <input type="file"   class="form-control" name="user_image"/>
                                </div>
                                <div class="form-group">
                                    <input type="submit"  value="Save Changes " class="btn btn-primary" name="insert_btn" />
                                </div>
                            </form>
                            <?php
                            require("include/config.php");
                            if(isset($_POST['insert_btn'])){
                                $edituser_name = $_POST['user_name'];
                                $edituser_password = $_POST['user_password'];
                                $edituser_image =$_FILES['user_image']['name'];
                                $edotuser_tmp_name =$_FILES['user_image']['tmp_name'];
                                
                                if(empty($edituser_image))
                                {
                                    $edituser_image=  $user_image;
                             
                                }
                                $update_user= "UPDATE user SET user_name='$edituser_name', user_password=' $edituser_password',user_image='$edituser_image' WHERE user_id='$user_id'";
                                 $run_update= mysqli_query($conn,$update_user);
                                 if( $run_update === true)
                                 {
                                    echo "User updated Successfully";
                                    move_uploaded_file($edotuser_tmp_name,"images/$edituser_image");
                                 } else{
                                    echo "Try Again";
                                 }

                            }
                          ?>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <?php 
require('include/footer.php')?>