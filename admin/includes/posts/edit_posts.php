<?php
    if (isset($_GET['p_id'])) {
        $the_post_id = $_GET['p_id'];
    }
         
     $query = "SELECT * FROM posts where post_id = $the_post_id";
     $select_posts_by_id = mysqli_query($connection, $query);
     while($row = mysqli_fetch_assoc($select_posts_by_id)){
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
     }
     if (isset($_POST['edit_post'])) {
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        move_uploaded_file($post_image_temp,"../images/$post_image");

        if (empty($post_image)) {
            $query = "select * from posts where post_id={$the_post_id}";
            $select_image = mysqli_query($connection,$query);
            queryCheker($select_image);
            while($row = mysqli_fetch_assoc($select_image)){
                $post_image = $row['post_image'];
            }
        }

        $query = "update posts set ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_category_id = '{$post_category_id}', ";
        $query .= "post_date = now(), ";
        $query .= "post_author = '{$post_author}', ";
        $query .= "post_status = '{$post_status}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_image = '{$post_image}' ";
        $query .= "where post_id = '{$the_post_id}'";
        
        
        $update_posts = mysqli_query($connection, $query);
        queryCheker($update_posts);
        echo "<h4 class='bg-success p-5'>Post Updated." . " " . "<a href='../post.php?p_id=$the_post_id'>View Post</a> or <a href='./admin_posts.php'>View All Posts</a></h4>";
     }

?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post-title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" name="post_title" class="form-control">
    </div>
    <div class="form-group">
        <label for="post-category">Categories</label>
        <select name="post_category" id="" class="form-control" style="width:20%; cursor: pointer;">
            <?php
                $query = "select * from categories";
                $select_categories = mysqli_query($connection, $query);
                queryCheker($select_categories);   
                while($row = mysqli_fetch_assoc($select_categories)){
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
                
                
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post-author">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" name="post_author" class="form-control">
    </div>
    <div class="form-group">
        <label for="post-status">Post Status</label>
        <select name="post_status" id="" class="form-control" style="width:20%; cursor: pointer;">
            <option><?php echo $post_status;?></option>
                <?php
                    if ($post_status == 'draft') {
                        echo "<option value='published'>Published</option>";
                    } else {
                        echo "<option value='draft'>Draft</option>";
                    }
                ?> 
                
                
            ?>
        </select>
    </div>
    <div class="form-group">
        <img src="../images/<?php echo $post_image;?>" alt="" width=100>
        <br><br>
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="post-tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" name="post_tags" class="form-control">
    </div>
    <div class="form-group">
        <label for="post-content">Post Content</label>
        <textarea name="post_content" class="form-control" id="body" cols="30" rows="10" style="resize:none;"><?php echo $post_content; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="edit_post" value="Publish Post" class="btn btn-primary">
    </div>
</form>