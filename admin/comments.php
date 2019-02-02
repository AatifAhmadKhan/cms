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
                                case 'addpost':
                                    include "includes/add_posts.php";
                                    break;
                                case 'editposts':
                                    include "includes/edit_posts.php";
                                    break;
                                default:
                                    include "includes/view_all_comments.php";
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