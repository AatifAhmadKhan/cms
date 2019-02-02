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
                            <small class="text-danger">Dashboard</small>
                        </h2>
                               
                <!-- /.row -->
                
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fas fa-file-alt fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                        <?php
                                            $query = "select * from posts";
                                            $select_all_posts = mysqli_query($connection,$query);
                                            $post_counts = mysqli_num_rows($select_all_posts);
                                        ?>
                                        <div class='huge'><?php echo $post_counts; ?></div>
                                            <div>Posts</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="admin_posts.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                        <?php
                                            $query = "select * from comments";
                                            $select_all_comments = mysqli_query($connection,$query);
                                            $comment_counts = mysqli_num_rows($select_all_comments);
                                        ?>
                                        <div class='huge'><?php echo $comment_counts; ?></div>
                                        <div>Comments</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="comments.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                        <?php
                                            $query = "select * from users";
                                            $select_all_users = mysqli_query($connection,$query);
                                            $users_counts = mysqli_num_rows($select_all_users);
                                        ?>
                                        <div class='huge'><?php echo $users_counts; ?></div>
                                            <div> Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="users.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-list fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                        <?php
                                            $query = "select * from categories";
                                            $select_all_categories = mysqli_query($connection,$query);
                                            $cat_counts = mysqli_num_rows($select_all_categories);
                                        ?>
                                            <div class='huge'><?php echo $cat_counts;?></div>
                                            <div>Categories</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="categories.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                <!-- /.row -->


                <?php
                    // Selecting all draft posts
                    $query = "select * from posts where post_status = 'draft'";
                    $select_all_draft_posts = mysqli_query($connection,$query);
                    $post_draft_counts = mysqli_num_rows($select_all_draft_posts);

                    //Selecting all published posts
                    $query = "select * from posts where post_status = 'published'";
                    $select_all_published_posts = mysqli_query($connection,$query);
                    $post_published_counts = mysqli_num_rows($select_all_published_posts);

                    //Selecting all appproved comments
                    $query = "select * from comments where comment_status = 'Approved'";
                    $select_all_approved_comments = mysqli_query($connection,$query);
                    $approved_comment_counts = mysqli_num_rows($select_all_approved_comments);

                    //Selecting all unappproved comments
                    $query = "select * from comments where comment_status = 'Unapproved'";
                    $select_all_unapproved_comments = mysqli_query($connection,$query);
                    $unapproved_comment_counts = mysqli_num_rows($select_all_unapproved_comments);

                    //Selecting all subscribers
                    $query = "select * from users where user_role = 'Subscriber'";
                    $select_all_subscriber_comments = mysqli_query($connection,$query);
                    $subscriber_counts = mysqli_num_rows($select_all_subscriber_comments);

                    //Selecting all admins
                    $query = "select * from users where user_role = 'Admin'";
                    $select_all_admin_comments = mysqli_query($connection,$query);
                    $admin_counts = mysqli_num_rows($select_all_admin_comments);
                
                
                ?>
                    <div class="row">
                        <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                ['', 'Total'],

                                <?php
                                    $element_text = ['All Posts','Published Posts','Draft Posts','All Comments','Approved','Unapproved','Users','Subscribers','Admins','Categories'];
                                    $element_count = [$post_counts,$post_published_counts,$post_draft_counts,$comment_counts,$approved_comment_counts,$unapproved_comment_counts,$users_counts,$subscriber_counts,$admin_counts,$cat_counts];
                                    for ($i = 0; $i< sizeof($element_text); $i++) {
                                        echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                                        
                                    }
                                ?>

                                //['Post', 1000]
                                ]);

                                var options = {
                                chart: {
                                    title: 'Site Data',
                                    subtitle: 'Easily view all data at a glance',
                                }
                                };

                                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                            </script>
                            <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                    </div>
                </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>