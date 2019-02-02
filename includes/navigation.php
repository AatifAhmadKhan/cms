<?php
    include "db.php";
    session_start();
?>
<nav class="navbar navbar-inverse navbar-fixed-top navbar-custom-color" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="color:#fff;">Blog System</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <?php 
                    
                    $query = "SELECT * FROM categories";
                    $select_all_categories_query = mysqli_query($connection, $query);
                    //queryCheker($select_all_categories_query);
                    while($row = mysqli_fetch_assoc($select_all_categories_query)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo "<li><a href='category.php?category={$cat_id}' style='color:#fff;'>{$cat_title}</a></li>";
                    }
                ?>
                <?php
                    if (isset($_SESSION['user_role'])) {
                        echo "<li><a href='admin' style='color:#fff;'>Admin Area</a></li>
                              <li><a href='includes/logout.php' style='color:#fff;'>Logout</a></li>";
                    } else {
                        echo "<li><a href='signup.php' style='color:#fff;'>Signup</a></li>";
                    }
                ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
