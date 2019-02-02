<?php
    function queryCheker($result){
        global $connection;
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

// INSERT NEW CATEGORY WITH THIS FUNCTION
    function insert_categories(){
        global $connection;
        if (isset($_POST['submit'])) {
            $cat_title = $_POST['cat_title'];
            if ($cat_title == "" || empty($cat_title)) {
                echo "<h4 class='bg-danger'>Please fill this field</h4>";
            } else {
                $query = "insert into categories(cat_title) ";
                $query .= "values('{$cat_title}')";

                $create_category_title = mysqli_query($connection, $query);
                if (!$create_category_title) {
                    die('Query Failed' .mysqli_error($connection));
                }
            }
        }
    }


//  RETRIEVE ALL CATEGORY WITH THIS FUNCTION
    function findAllCategories(){
        global $connection;
        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_categories)){
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                echo "<tr>";
                echo "<td>{$cat_id}</td>";
                echo "<td>{$cat_title}</td>";
                echo "<td><a class='btn btn-warning' href='categories.php?edit={$cat_id}'>Edit</a></td>";
                echo "<td><a class='btn btn-danger' href='categories.php?delete={$cat_id}'>Delete</a></td>";
                echo "</tr>";
        }
    }

//  DELETE CATEGORY FROM THIS FUNCTION
    function deleteCategories(){
        global $connection;
        if (isset($_GET['delete'])) {
            $deletion_id = $_GET['delete'];
            $query = "delete from categories where cat_id = {$deletion_id}";
            $delete_query = mysqli_query($connection, $query);
            header("Location: categories.php");
        }
    }

// UPDATE CATEGORY FROM THIS FUNCTION
//  THIS FUNCTION WILL GENERATE AN UPDATE FORM WITHIN THE CONTAINER AND THE FORM WILL VANISH AFTER UPDATING THE VALUE
    function updateCategories(){
        global $connection;
        //function to retrieve the specific data from database whose value is to be updated
        if (isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];
        
            $query = "select * from categories where cat_id = $cat_id ";
            $update_categories = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($update_categories)){
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
            ?>
            <!-- form generation -->
            <form action="" method="post">
                <label for="cat-title">Edit Categories</label>
                
                <div class="form-group">

                    <label for="cat-title">Category ID</label>
                    <!-- creating fields with dynamic data from database -->
                    <input value="<?php if (isset($cat_id)) { echo $cat_id; } ?>" type="text" name="cat_id" class="form-control" readonly>

                    <label for="cat-title">New Category Title</label>
                    <input value="<?php if (isset($cat_title)) { echo $cat_title; } ?>" type="text" name="cat_title" class="form-control">
                    
                    <br>
                    
                    <input class="btn btn-primary" type="submit" name="update" value="Update Category">
                </div>
            <?php
                    }
                }
                //main update function that performs the updation to specific data
                if (isset($_POST['update'])) {
                    $cat_id = $_POST['cat_id'];
                    $cat_title = $_POST['cat_title'];
                    
                    $query = "UPDATE categories SET cat_title = '$cat_title' WHERE categories.cat_id = $cat_id";
                    $update_query = mysqli_query($connection, $query);
                    header("Location: categories.php");
                        
                    }?>
            </form> 
            <!--  closing of the form -->
                <?php
    }

    


?>