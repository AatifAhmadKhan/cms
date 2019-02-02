<?php
    if (isset($_POST['create_user'])) {

        
        $username = $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_role = $_POST['user_role'];

        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];

        move_uploaded_file($user_image_temp,"../images/users/$user_image");

        $query = "insert into users(username,user_password,user_firstname,user_lastname,user_email,user_image,user_role) ";
        $query .= "values('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_image}','{$user_role}')";
        $create_user = mysqli_query($connection, $query);
        
        queryCheker($create_user);
        echo "<h4 class='bg-success p-5'>Congratulations! User Created" . " | " . "<a href='users.php'>View All Users</a></h4>";
        
    }
?>
<h3>Add A New User</h3>
<hr>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group col-sm-6">
        <label for="first-name">First Name</label>
        <input type="text" name="user_firstname" class="form-control">
    </div>
    <div class="form-group col-sm-6">
        <label for="last-name">Last Name</label>
        <input type="text" name="user_lastname" class="form-control">
    </div>
    <div class="form-group col-sm-6">
        <label for="post-email">Email</label>
        <input type="text" name="user_email" class="form-control">
    </div>
    <div class="form-group col-sm-6">
        <label for="post-password">Password</label>
        <input type="text" name="user_password" class="form-control">
    </div>
    <div class="form-group col-sm-6">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group col-sm-6">
        <label for="user-role">Role</label>
        <select name="user_role" id="" class="form-control" style="cursor: pointer;">
        <option value="Subscriber">Select Options</option>
            <option value="Admin">Admin</option>
            <option value="Subscriber">Subscriber</option>
        </select>
    </div>
    <div class="form-group col-sm-6">
        <label for="user-image">User Image</label>
        <input type="file" name="user_image">
    </div>
    
    <div class="form-group col-sm-6">
        <input type="submit" name="create_user" value="Add User" class="btn btn-primary" style="width:100%;">
    </div>
</form>