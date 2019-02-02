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
                            <div class="col-sm-6">

                            <?php insert_categories(); ?>

                            <form action="" method="post">
                                <label for="cat-title">Add Categories</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="cat_title" id="">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                    </div>
                            </form>

                            <hr>
                            
                            <?php  updateCategories(); ?>
                            
                                </div>
                            <h3>All Categories</h3>
                            <div class="col-sm-6">
                                <table class="table table-bordered table-hover table-responsive-xs">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Title</th>
                                            <th colspan="2" class="text-center">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php findAllCategories(); ?>
                                    <?php deleteCategories(); ?>
                                    </tbody>
                                </table>
                            </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>