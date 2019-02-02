<?php
    include "includes/admin_header.php";
?>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            Welcome <span class="text-success"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'];?></span>
                            <small><a href="index.php" class="text-danger">Dashboard</a></small>
                        </h2>

                    <?php
                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = '';
                        }
                            switch ($source) {
                                case 'adduser':
                                    include "includes/users/add_users.php";
                                    break;
                                case 'edituser':
                                    include "includes/users/edit_users.php";
                                    break;
                                default:
                                    include "includes/users/view_all_users.php";
                                    break;
                            }

                        
                    ?>
                    
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>