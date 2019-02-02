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

        $query = "select randSalt from users";
        $select_rand_salt_query = mysqli_query($connection,$query);
        queryCheker($select_rand_salt_query);

        $row = mysqli_fetch_array($select_rand_salt_query);
        $salt = $row['randSalt'];
        $password = crypt($password, $salt);
        
        $query = "insert into users (username,user_password,user_email,user_role) ";
        $query .= "values('{$username}','{$password}','{$email}','Subscriber')";
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
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
