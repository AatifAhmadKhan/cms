<table class="table table-responsive-lg table-bordered table-hover">
                        <thead>
                            <tr>
                                <th colspan=10 class="text-center"><h4><strong>All Users</strong></h4></th>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>User Image</th>
                                <th>Role</th>
                                <th colspan=3 class="text-center">Actions</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    $query = "SELECT * FROM users";
                                    $select_users = mysqli_query($connection, $query);
                                    while($row = mysqli_fetch_assoc($select_users)){
                                        $user_id = $row['user_id'];
                                        $username = $row['username'];
                                        $user_password = $row['user_password'];
                                        $user_firstname = $row['user_firstname'];
                                        $user_lastname = $row['user_lastname'];
                                        $user_email = $row['user_email'];
                                        $user_image = $row['user_image'];
                                        $user_role = $row['user_role'];
                                        echo "<tr>";
                                        echo "<td>{$user_id}</td>";
                                        echo "<td>{$username}</td>";
                                        echo "<td>{$user_firstname}</td>";
                                        echo "<td>{$user_lastname}</td>";
                                        echo "<td>{$user_email}</td>";
                                        echo "<td><img src='../images/users/{$user_image}' alt='user image' width='100' class='img-responsive'></td>";
                                        echo "<td>{$user_role}</td>";
                                        
                                        
                                        

                                        // $query = "select * from posts where post_id = $comment_post_id ";
                                        // $select_post_id_query = mysqli_query($connection, $query);
                                        //     while($row = mysqli_fetch_assoc($select_post_id_query)){
                                        //         $post_id = $row['post_id'];
                                        //         $post_title = $row['post_title'];
                                        //         echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                                        //     }
                                        
                                        
                                        
                                        //echo "<td>Some Title</td>";
                                        
                                        // echo "<td>{$comment_content}</td>";
                                        // echo "<td>{$comment_status}</td>";
                                        
                                        echo "<td>
                                                <a class='btn text-success' href='users.php?change_to_admin={$user_id}'>Admin</a>
                                                <br><br>
                                                <a class='btn text-success' href='users.php?change_to_subscriber={$user_id}'>Subscriber</a>
                                            </td>";
                                        // echo "<td><a class='btn btn-success' href='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
                                        echo "<td><a class='btn btn-warning' href='users.php?source=edituser&edit_user={$user_id}'>Edit</a></td>";
                                        echo "<td><a class='btn btn-danger' href='users.php?delete={$user_id}'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                ?>
                            
                        </tbody>
                    </table>


<?php

    if (isset($_GET['change_to_admin'])) {
        $the_user_id = $_GET['change_to_admin'];
        $query = "update users set user_role='Admin' where user_id=$the_user_id";
        $user_role_query = mysqli_query($connection,$query);
        queryCheker($user_role_query);
        header("Location: users.php");
    }


    if (isset($_GET['change_to_subscriber'])) {
        $the_user_id = $_GET['change_to_subscriber'];
        $query = "update users set user_role='Subscriber' where user_id=$the_user_id";
        $user_role_query = mysqli_query($connection,$query);
        queryCheker($user_role_query);
        header("Location: users.php");
    }





    if (isset($_GET['delete'])) {
        $the_user_id = $_GET['delete'];
        $query = "delete from users where user_id={$the_user_id}";
        $delete_user_query = mysqli_query($connection,$query);
        queryCheker($delete_user_query);
        header("Location: users.php");
    }
?>
