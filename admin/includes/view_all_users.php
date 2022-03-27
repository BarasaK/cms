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
            echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'>Edit</td></a>";
            echo "<td><a href='users.php?delete={$user_id}'>Delete</td></a>";
            echo "</tr>";
        }


?>
                                </tbody>
                            </table>

<?php

if(isset($_GET['delete'])){
    $del_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$del_id}";
    $delete_comment = mysqli_query($conn,$query);
    header("Location:users.php"); //refreshes
}
// ?>