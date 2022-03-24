<?php
if(isset($_GET['p_id'])){
    $post_id_url =  $_GET['p_id'];

}

$query = "SELECT * FROM posts WHERE post_id = $post_id_url";
$get_post_by_id = mysqli_query($conn,$query);

        while ($row = mysqli_fetch_assoc($get_post_by_id)){
            $post_id = $row['post_id'];    
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_status = $row['post_status'];
            $post_comment_count = $row['post_comment_count'];
            $post_tag = $row['post_tag'];

        }

?>

<?php //update 

if(isset($_POST['edit_post'])){
   
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_author = $_POST['post_author'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_status = $_POST['post_status'];
    $post_tag = $_POST['post_tag'];
    

    move_uploaded_file($post_image_temp,"../images/$post_image");
        //ensure img is displayed with/without update
    if(empty($post_image)){
        $query = "SELECT * FROM posts WHERE post_id = $post_id_url ";
        $get_posts = mysqli_query($conn,$query);
        while ($row = mysqli_fetch_assoc($get_posts)){
            $post_image = $row['post_image'];    
        }

    }

    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_date = now(), ";
    $query .= "post_image = '{$post_image}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tag = '{$post_tag}' ";
    $query .= "WHERE post_id = '{$post_id_url}' ";


    $update_post = mysqli_query($conn,$query);
    checkQuery($update_post);

}


?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Title</label>
        <input type="text" name="post_title" class="form-control" value="<?php echo $post_title ;?>">
    </div>

    <div class="form-group">
            <select name="post_category" id="">
                <?php
                        $query = "SELECT * FROM categories";
                        $select_categories = mysqli_query($conn,$query);

                        checkQuery($select_categories);

                        while ($row = mysqli_fetch_assoc($select_categories)){
                            $cat_id = $row['cat_id'];    
                            $category_title = $row['cat_title'];

                            echo  "<option value='{$cat_id}'>{$category_title}</option>";

                        }

                ?>
                     
            </select>
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" name="post_author" class="form-control"value="<?php echo $post_author ;?>">
    </div>

    <div class="form-group">
        <label for="post_tag">Post Tags</label>
        <input type="text" name="post_tag" class="form-control"value="<?php echo $post_tag ;?>">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" name="post_status" class="form-control"value="<?php echo $post_status ;?>">
    </div>  

    <div class="form-group">
        <img src ="../images/<?php echo $post_image;?>" width="100" alt="">
        <input type="file" name="post_image">
    </div>  

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea id="" name="post_content" class="form-control" cols ="30" rows="10"><?php echo $post_content ;?>
        </textarea>
    </div>
        
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_post"  value="Update Post">
    </div>
</form>


