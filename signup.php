<?php
    include "includes/header.php";
    include "admin/functions.php";
?>
 <!-- Navigation -->
    
<?php  include "includes/navigation.php"; ?>


<?php
    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($connection,$_POST['username']);
        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);
        $first_name = mysqli_real_escape_string($connection,$_POST['first_name']);
        $last_name = mysqli_real_escape_string($connection,$_POST['last_name']);

        $user_picture = $_FILES['user_image']['name'];
        $user_picture_temp = $_FILES['user_image']['tmp_name'];
        
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_temp,"images/users/{$user_image}");

        $query = "select randSalt from users";
        $select_rand_salt_query = mysqli_query($connection,$query);
        queryCheker($select_rand_salt_query);

        $row = mysqli_fetch_array($select_rand_salt_query);
        $salt = $row['randSalt'];
        $password = crypt($password, $salt);
        
        $query = "insert into users (username,user_password,user_firstname,user_lastname,user_email,user_image,user_role) ";
        $query .= "values('{$username}','{$password}','{$first_name}','{$last_name}','{$email}','{$user_image}','Subscriber')";
        $register_user_query = mysqli_query($connection,$query);
        queryCheker($register_user_query);
        echo "<h2 class='bg-success' style='padding: 20px 200px;'>Registration Successful.</h2>";
        //header("Location: includes/login.php");



    }
?>

    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                
                    <div class="form-wrap">
                        <h1>Signup</h1>
                        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group col-sm-12">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="first-name" class="sr-only">First Name</label>
                                <input type="text" name="first_name" id="key" class="form-control" placeholder="Firstname" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="last-name" class="sr-only">Last Name</label>
                                <input type="text" name="last_name" id="key" class="form-control" placeholder="Lastname" required>
                            </div>
                            <div class="form-group col-sm-12">
                                <input type="file" name="user_image" class="form-control">
                            </div>
                            <div class="form-group col-sm-12">
                                <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Register">
                            </div>
                        </form>
                    </div>
                
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
