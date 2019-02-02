<?php
    if (isset($_POST['create_post'])) {

        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        // $post_comment_count = 5;

        move_uploaded_file($post_image_temp,"../images/posts/$post_image");

        $query = "insert into posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status) ";
        $query .= "values('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
        $create_posts = mysqli_query($connection, $query);
        
        queryCheker($create_posts);
        echo "<h4 class='bg-success p-5'>Post Added." . " " . "<a href='./admin_posts.php'>View All Posts</a></h4>";
        
    }
?>
<h3>Add A New Post</h3>
<hr>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post-title">Post Title</label>
        <input type="text" name="post_title" class="form-control">
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
        <input type="text" name="post_author" class="form-control">
    </div>
    <div class="form-group">
        <label for="post-status">Post Status</label>
        <select name="post_status" id="" class="form-control" style="width:20%; cursor: pointer;">
            <option value="draft">Select an option</option>
            <option value="draft">Draft</option>
            <option value="published">Published</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post-image">Post Image</label>
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="post-tags">Post Tags</label>
        <input type="text" name="post_tags" class="form-control">
    </div>
    <div class="form-group">
        <label for="post-content">Post Content</label>
        <textarea name="post_content" class="form-control" id="body" cols="30" rows="10" style="resize:none;"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="create_post" value="Publish Post" class="btn btn-primary">
    </div>
</form>