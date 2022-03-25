<?php
if(isset($_POST['add_post'])){
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_tag = $_POST['post_tag'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_date = ('d-m-y');
    // $post_comment_count = 4;
    $post_category_id = $_POST['post_category_id'];

    move_uploaded_file($post_image_temp,"../images/$post_image");

    // if($post_title==""|| empty($post_title) || $post_author==""|| empty($post_author)
    // || $post_tags==""|| empty($post_tags)|| $post_status==""|| empty($post_status)
    // || $post_content==""|| empty($post_content)){
    //     echo "Field(s) cannot be empty";
    // }else{
                $query = "INSERT INTO posts(post_title, post_author,post_tag,post_status,post_image,post_content,post_date,post_category_id) ";
                $query .=  "VALUES ('{$post_title}','{$post_author}','{$post_tag}','{$post_status}','{$post_image}','{$post_content}',now(),{$post_category_id})";

                $create_post_query = mysqli_query($conn,$query);

                checkQuery($create_post_query);
    // }
}
?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Title</label>
        <input type="text" name="post_title" class="form-control">
    </div>





    <div class="form-group">

        <label for="post_category">Post Category</label><br>
        <select name="post_category_id" id="">
        
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
        <input type="text" name="post_author" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_tag">Post Tags</label>
        <input type="text" name="post_tag" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" name="post_status" class="form-control">
    </div>  
    
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea id="" name="post_content" class="form-control" cols ="30" rows="10">
        </textarea>
    </div>
        
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_post"  value="Add Post">
    </div>
</form>