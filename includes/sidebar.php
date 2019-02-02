<div class="col-md-4 ">
<!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" name="search_string" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form> <!-- search form -->
                    <!-- /.input-group -->
                </div>


                <!-- Login Form -->
                <div class="well">
                    <?php
                        if (isset($_SESSION['username'])) {
                            echo "<h2 class='lead'>Logged in as " . $_SESSION['firstname'] . " ". $_SESSION['lastname'] . "</h2>";
                            echo "<a href='includes/logout.php' class='btn btn-primary'>Logout</a>";
                        } else { ?>
                            <h4>Login</h4>
                            <form action="includes/login.php" method="post">
                            <div class="form-group">
                                <input type="text" name="username" placeholder="Enter Username" class="form-control">
                            </div>
                            <div class="input-group">
                                <input type="password" name="password" placeholder="Enter password" class="form-control">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" name="login" type="submit">Login</button>
                                </span>
                            </div>
                            </form>
                    <?php }  ?>
                    <!-- /.input-group -->
                </div>
                <!-- Login form ends -->





                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                            <?php 
                                $query = "SELECT * FROM categories";
                                $select_categories_sidebar = mysqli_query($connection, $query);
                                queryCheker($select_categories_sidebar);

                                while($row = mysqli_fetch_assoc($select_categories_sidebar)){
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['cat_id'];
                                    echo "<li><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";
                                }
                            ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "widgets.php";?>

            </div>