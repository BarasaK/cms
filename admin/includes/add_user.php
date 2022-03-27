<?php
if(isset($_POST['add_user'])){
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_email = $_POST['user_email'];
    $user_creation_date = ('d-m-y');
    $user_role = $_POST['user_role'];
    $user_randSalt = $_POST['user_randSalt'];

    move_uploaded_file($user_image_temp,"../images/$user_image");

                $query = "INSERT INTO users(username,user_password,user_firstname,user_lastname,user_image,user_email,user_creation_date,user_role,user_randSalt) ";
                $query .=  "VALUES ('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_image}','{$user_email}',now(),'{$user_role}','{$user_randSalt}')";

                $create_user_query = mysqli_query($conn,$query);

                checkQuery($create_user_query);
}
?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control">
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

                            echo  "<option value='{$role_title}'>{$role_title}</option>";

                        }
                        ?>
                        

        </select>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" name="user_password" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" name="user_firstname" class="form-control">
    </div> 

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" name="user_lastname" class="form-control">
    </div> 

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" name="user_email" class="form-control">
    </div> 

    <div class="form-group">
        <label for="user_randSalt">Salt</label>
        <input type="text" name="user_randSalt" class="form-control">
    </div> 
    
    <div class="form-group">
        <label for="user_image">User Image</label>
        <input type="file" name="user_image">
    </div>
        
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_user"  value="Add User">
    </div>
</form>