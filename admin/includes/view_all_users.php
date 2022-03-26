<table class="table table-bordered table-hover back">
    <thead class="background-color-1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>Image</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

<?php


$query = "SELECT * FROM users ORDER BY user_id DESC";
$get_all_users = mysqli_query($conn,$query);

        while ($row = mysqli_fetch_assoc($get_all_users)){
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
            echo "<td>{$user_password}</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>";
            echo "<td><img src = '../images/{$user_image}' width=100</td>";
            echo "<td>{$user_role}</td>";  
            echo "<td><a href='users.php?edit={$user_id}'>Edit</td></a>";
            echo "<td><a href='users.php?delete={$user_id}'>Delete</td></a>";
            // echo "<td><a href='comments.php?delete={$comment_id}'>Delete</td></a>";
            echo "</tr>";
        }


?>
                                </tbody>
                            </table>

<?php

// //approve
// if(isset($_GET['approve'])){
//     $comment_id = $_GET['approve'];
//     $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id=$comment_id ";
//     $update_comment = mysqli_query($conn,$query);
//     header("Location:comments.php"); //refreshes

// }
// //unapprove
// if(isset($_GET['unapprove'])){
//     $comment_id = $_GET['unapprove'];
//     $query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id=$comment_id ";
//     $update_comment = mysqli_query($conn,$query);
//     header("Location:comments.php"); //refreshes

// }

// if(isset($_GET['delete'])){
//     $del_id = $_GET['delete'];
//     $query = "DELETE FROM comments WHERE comment_id = {$del_id}";
//     $delete_comment = mysqli_query($conn,$query);
//     header("Location:comments.php"); //refreshes
// }
// ?>