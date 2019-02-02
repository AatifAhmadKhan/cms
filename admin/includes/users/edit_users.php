<?php

    if (isset($_GET['edit_user'])) {
        $the_user_id = $_GET['edit_user'];

        $query = "select * from users where user_id=$the_user_id";
        $user_select_query = mysqli_query($connection, $query);
        queryCheker($user_select_query);
        while($row = mysqli_fetch_assoc($user_select_query)){
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_password = $row['user_password'];
            $user_role = $row['user_role'];
            $user_image = $row['user_image'];
        }
        
    }

    if (isset($_POST['edit_user'])) {
        $username = $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_temp,"../images/users/$user_image");

        if (empty($user_image)) {
            $query = "select * from users where user_id = {$the_user_id}";
            $select_image = mysqli_query($connection,$query);
            queryCheker($select_image);
            while($row = mysqli_fetch_assoc($select_image)){
                $user_image = $row['user_image'];
            }
        }

        $query = "update users set ";
        $query .= "username = '{$username}', ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_image = '{$user_image}', ";
        $query .= "user_role = '{$user_role}' ";
        $query .= "where user_id = {$the_user_id}";

        $update_user = mysqli_query($connection, $query);
        
        queryCheker($update_user);
        echo "<h4 class='bg-success p-5'>User Updated" . " | " . "<a href='users.php'>View All Users</a></h4>";
        
    }
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group col-sm-6">
        <label for="first-name">First Name</label>
        <input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname;?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="last-name">Last Name</label>
        <input type="text" name="user_lastname" class="form-control" value="<?php echo $user_lastname;?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="post-email">Email</label>
        <input type="text" name="user_email" class="form-control" value="<?php echo $user_email;?>">
    </div>
    
    <div class="form-group col-sm-6">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username;?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="user-image">User Image</label>
        <img src="../images/users/<?php echo $user_image;?>" alt="The image is not available" class="img-responsive" style="height: 200px; width: 200px; border: 4px solid #cfcfcf; border-radius: 50%;">
        <input type="file" name="user_image" class="form-control">
    </div>
    <div class="form-group col-sm-6">
        <label for="user-role">Role</label>
        <select name="user_role" id="" class="form-control" style="cursor: pointer;">
            <option><?php echo $user_role;?></option>
            <?php
                if ($user_role == 'Admin') {
                    echo "<option value='Subscriber'>Subscriber</option>";
                } else {
                    echo "<option value='Admin'>Admin</option>";
                }
            ?> 
        </select>
    </div>
    <div class="form-group col-sm-6">
        <input type="submit" name="edit_user" value="Update" class="btn btn-primary" style="width:100%;">
    </div>
    <div class="form-group col-sm-6">
        <a class="btn btn-warning" style="width:100%;" href="./profile.php">Cancel</a>
    </div>
</form>