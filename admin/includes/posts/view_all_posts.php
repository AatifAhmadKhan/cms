<?php
    if (isset($_POST['checkBoxArray'])) {
        foreach ($_POST['checkBoxArray'] as $postIDValue) {
            $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {
                case 'published':
                    $query = "update posts set post_status = '{$bulk_options}' where post_id = $postIDValue";
                    $publish_post_bulk_query = mysqli_query($connection,$query);
                    queryCheker($publish_post_bulk_query);
                    break;
                case 'draft':
                    $query = "update posts set post_status = '{$bulk_options}' where post_id = $postIDValue";
                    $draft_post_bulk_query = mysqli_query($connection,$query);
                    queryCheker($draft_post_bulk_query);
                    break;
                case 'delete':
                    $query = "delete from posts where post_id = $postIDValue";
                    $delete_post_bulk_query = mysqli_query($connection,$query);
                    queryCheker($delete_post_bulk_query);
                    break;
                default:
                    echo "<h3 class='bg-danger text-danger text-center' style='padding: 5px;'>No Option Selected</h3>";
                    break;
            }
        }
    }
?>
<form action="" method="post">
    <table class="table table-responsive table-bordered table-hover">
        <div id="bulkOptionContainer" class="col-xs-4" style="padding: 0px;">
            <select name="bulk_options" id="" class="form-control" style="cursor: pointer;">
                <option value="selectoption">Select Options</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
            </select>
        </div>
        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a href="./admin_posts.php?source=addpost" class="btn btn-primary">Add New</a>
        </div>
                        <thead>
                            <tr>
                                <th colspan=12 class="text-center"><h4><strong>All Posts</strong></h4></th>
                            </tr>
                            <tr>
                                <th><input type="checkbox" name="" id="selectAllBoxes"></th>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                                <th colspan=2 class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <?php
                                    $query = "SELECT * FROM posts";
                                    $select_posts = mysqli_query($connection, $query);
                                    while($row = mysqli_fetch_assoc($select_posts)){
                                        $post_id = $row['post_id'];
                                        $post_category_id = $row['post_category_id'];
                                        $post_title = $row['post_title'];
                                        $post_author = $row['post_author'];
                                        $post_date = $row['post_date'];
                                        $post_image = $row['post_image'];
                                        $post_content = $row['post_content'];
                                        $post_tags = $row['post_tags'];
                                        $post_comment_count = $row['post_comment_count'];
                                        $post_status = $row['post_status'];
                                        echo "<tr>";?>
                                        
                                        <td><input type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id;?>' class='checkBoxes'></td>
                                        
                                    <?php
                                        echo "<td>{$post_id}</td>";
                                        echo "<td>{$post_author}</td>";
                                        $short_title = substr($post_title, 0, 23) . "...";
                                        echo "<td><a class='btn' href='../post.php?p_id=$post_id'>{$short_title}</a></td>";


                                        $query = "select * from categories where cat_id = {$post_category_id} ";
                                        $select_category_id = mysqli_query($connection, $query);
                                            while($row = mysqli_fetch_assoc($select_category_id)){
                                                $cat_title = $row['cat_title'];
                                                $cat_id = $row['cat_id'];
                                            }

                                        echo "<td>{$cat_title}</td>";
                                        
                                        
                                        
                                        echo "<td>{$post_status}</td>";
                                        echo "<td><img src='../images/posts/{$post_image}' width='100'></td>";
                                        
                                        echo "<td>{$post_tags}</td>";
                                        echo "<td>{$post_comment_count}</td>";
                                        echo "<td>{$post_date}</td>";
                                        echo "<td><a  class='btn btn-warning' href='admin_posts.php?source=editposts&p_id={$post_id}'>Edit</a></td>";
                                        echo "<td><a onClick=\"javascript: return confirm('Are uou sure you want to delete?');\" class='btn btn-danger' href='admin_posts.php?delete={$post_id}'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                ?>
                            
                        </tbody>
                    </table>
</form>


<?php

    if (isset($_GET['delete'])) {
        $deletion_id = $_GET['delete'];
        $query = "delete from posts where post_id={$post_id}";
        $delete_query = mysqli_query($connection,$query);
        header("Location: admin_posts.php");
    }

?>
