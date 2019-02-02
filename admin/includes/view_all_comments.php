<?php
    if (isset($_POST['checkBoxArray'])) {
        foreach ($_POST['checkBoxArray'] as $postIDValue) {
            $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {
                case 'Approved':
                    $query = "update comments set comment_status = '{$bulk_options}' where comment_id = $postIDValue";
                    $publish_post_bulk_query = mysqli_query($connection,$query);
                    queryCheker($publish_post_bulk_query);
                    break;
                case 'UNAPPROVED':
                    $query = "update comments set comment_status = '{$bulk_options}' where comment_id = $postIDValue";
                    $draft_post_bulk_query = mysqli_query($connection,$query);
                    queryCheker($draft_post_bulk_query);
                    break;
                case 'delete':
                    $query = "delete from comments where comment_id = $postIDValue";
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
                                <option value="Approved">Approve</option>
                                <option value="UNAPPROVED">Unapprove</option>
                                <option value="delete">Delete</option>
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <input type="submit" name="submit" class="btn btn-success" value="Apply">
                        </div>
                        <thead>
                            <tr>
                                <th colspan=11 class="text-center"><h4><strong>All Comments</strong></h4></th>
                            </tr>
                            <tr>
                                <th><input type="checkbox" name="" id="selectAllBoxes"></th>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>In Response To</th>
                                <th>Comment Text</th>
                                <th>Status</th>
                                <th colspan=3 class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    $query = "SELECT * FROM comments order by comment_date desc";
                                    $select_posts = mysqli_query($connection, $query);
                                    while($row = mysqli_fetch_assoc($select_posts)){
                                        $comment_id = $row['comment_id'];
                                        $comment_post_id = $row['comment_post_id'];
                                        $comment_email = $row['comment_email'];
                                        $comment_author = $row['comment_author'];
                                        $comment_date = $row['comment_date'];
                                        $comment_content = $row['comment_content'];
                                        $comment_status = $row['comment_status'];
                                        echo "<tr>";?>
                                        <td><input type='checkbox' name='checkBoxArray[]' value='<?php echo $comment_id;?>' class='checkBoxes'></td>
                                    <?php
                                        echo "<td>{$comment_id}</td>";
                                        echo "<td>{$comment_author}</td>";
                                        echo "<td>{$comment_email}</td>";
                                        echo "<td>{$comment_date}</td>";
                                        
                                        

                                        $query = "select * from posts where post_id = $comment_post_id ";
                                        $select_post_id_query = mysqli_query($connection, $query);
                                            while($row = mysqli_fetch_assoc($select_post_id_query)){
                                                $post_id = $row['post_id'];
                                                $post_title = $row['post_title'];
                                                echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                                            }
                                        
                                        
                                        
                                        //echo "<td>Some Title</td>";
                                        
                                        echo "<td>{$comment_content}</td>";
                                        echo "<td>{$comment_status}</td>";
                                        echo "<td><a class='btn btn-success' href='comments.php?approved={$comment_id}'>Approve</a></td>";
                                        echo "<td><a class='btn btn-warning' href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
                                        echo "<td><a class='btn btn-danger' href='comments.php?delete={$comment_id}'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                ?>
                            
                        </tbody>
                    </table>
</form>


<?php

    if (isset($_GET['unapprove'])) {
        $the_comment_id = $_GET['unapprove'];
        $query = "update comments set comment_status='UNAPPROVED' where comment_id={$the_comment_id}";
        $unapprove_comment_query = mysqli_query($connection,$query);
        header("Location: comments.php");
    }


    if (isset($_GET['approved'])) {
        $the_comment_id = $_GET['approved'];
        $query = "update comments set comment_status='Approved' where comment_id={$the_comment_id}";
        $approve_comment_query = mysqli_query($connection,$query);
        header("Location: comments.php");
    }





    if (isset($_GET['delete'])) {
        $the_comment_id = $_GET['delete'];
        $query = "delete from comments where comment_id={$the_comment_id}";
        $delete_query = mysqli_query($connection,$query);
        header("Location: comments.php");
    }
?>
