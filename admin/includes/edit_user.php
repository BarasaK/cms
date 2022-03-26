<?php
if(isset($_GET['u_id'])){
    $user_id_url =  $_GET['u_id'];

}

$query = "SELECT * FROM users WHERE user_id=$user_id_url";
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
            $user_randSalt = $row['user_randSalt'];

        }

?>

<?php //update 

if(isset($_POST['edit_user'])){
   
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_role = $_POST['user_role'];
    $user_randSalt = $_POST['user_randSalt'];

    move_uploaded_file($user_image_temp,"../images/$user_image");
        //ensure img is displayed with/without update
    if(empty($user_image)){
        $query = "SELECT * FROM users WHERE user_id=$user_id_url";
        $get_users = mysqli_query($conn,$query);
        while ($row = mysqli_fetch_assoc($get_users)){
            $user_image = $row['user_image'];    
        }

    }

    $query = "UPDATE users SET ";
    $query .= "username = '{$username}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "user_firstname = '{$user_firstname}', ";
    // $query .= "user_creation_date = now(), ";
    $query .= "user_image = '{$user_image}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_role = '{$user_role}', ";
    $query .= "user_randSalt = '{$user_randSalt}' ";
    $query .= "WHERE user_id ={$user_id_url}";

    $update_user = mysqli_query($conn,$query);
    checkQuery($update_user);

}


?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username;?>">
    </div>

    <div class="form-group">

        <label for="user_role">User Role</label><br>
        <select name="user_role" id="">
        
        <?php
                        $query = "SELECT * FROM user_roles";
                        $select_roles = mysqli_query($conn,$query);

                        checkQuery($select_roles);

                        while ($row = mysqli_fetch_assoc($select_roles)){
                            $role_id = $row['role_id'];    
                            $role_title = $row['role_title'];

                            echo  "<option value='{$role_id}'>{$role_title}</option>";

                        }
                        ?>
                        

        </select>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" name="user_password" class="form-control" value="<?php echo $user_password;?>">
    </div>

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname;?>">
    </div> 

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" name="user_lastname" class="form-control"value="<?php echo $user_lastname;?>">
    </div> 

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" name="user_email" class="form-control" value="<?php echo $user_email;?>">
    </div> 

    <div class="form-group">
        <label for="user_randSalt">Salt</label>
        <input type="text" name="user_randSalt" class="form-control" value="<?php echo $user_randSalt;?>">
    </div> 
    
    <div class="form-group">
        <img src ="../images/<?php echo $user_image;?>" width="100" alt="">
        <input type="file" name="user_image">
    </div>
        
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user"  value="Update User">
    </div>
</form>