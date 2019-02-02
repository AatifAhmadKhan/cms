<?php include "includes/admin_header.php"; ?>
<?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $query = "select * from users where username = '{$username}' ";
        $select_user_profile_query = mysqli_query($connection,$query);
        queryCheker($select_user_profile_query);
        while($row = mysqli_fetch_assoc($select_user_profile_query)){
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        }
    }
?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>
        <div id="page-wrapper" style="background: url('../images/backgrounds/profilebanner-bg.png'); padding: 20px;">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header bg-success" style="padding: 10px 50px;">
                            Welcome <span class="text-success"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'];?></span>
                            <small><a href="index.php" class="text-danger">Dashboard</a></small>
                        </h2>
                        
                        <hr>
                    
                        <form action="" method="post" enctype="multipart/form-data">
                            <section>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="col-sm-3">
                                            <img src="../images/users/<?php echo $user_image;?>" alt="The image is not available" class="img-responsive" style="height: 200px; width: 200px; border: 4px solid #cfcfcf; border-radius: 50%;">
                                        </div>
                                        <div class="col-sm-9">
                                            <p><?php echo "<h1>" .$user_firstname . " " . $user_lastname . "</h1>";?></p>
                                            <div class="col-sm-4">
                                                <h3><i class="fas fa-user"></i> <?php echo $username;?></h3>
                                            </div>
                                            <div class="col-sm-8">
                                                <h3><i class="fas fa-envelope"></i> <?php echo $user_email;?></h3>
                                            </div>
                                            <div class="col-sm-12">
                                                <h3>
                                                    <?php
                                                        if ($user_role == 'Admin') {
                                                            echo "<i class='fas fa-user-shield'></i> " . $user_role;
                                                        } else if ($user_role == 'Subscriber') {
                                                            echo "<i class='fas fa-newspaper'></i> " . $user_role;
                                                        }
                                                    ?>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-sm-offset-9">
                                            <a class='btn btn-primary' href='users.php?source=edituser&edit_user=<?php echo $user_id;?>'>Edit Profile <i class='fas fa-edit'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>