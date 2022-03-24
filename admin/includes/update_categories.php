<form action="" method="post">
    <div class="form-group">
        <label for="cat_title_update">Edit</label>

    <?php 
    if(isset($_GET['edit'])){
        $get_cat_id = $_GET['edit'];
        $query = "SELECT * FROM categories WHERE cat_id = $get_cat_id";
        $select_categories = mysqli_query($conn,$query);

        while ($row = mysqli_fetch_assoc($select_categories)){
            $cat_id = $row['cat_id'];    
            $cat_title = $row['cat_title'];
    ?>
                                    <input type="text" name="cat_title_update" class="form-control" value="<?php if(isset($cat_title)){echo $cat_title;}?>">
    <?php }} ?>

    <?php 
    //updating categories --check for update and capture id
    if(isset($_POST['update_category'])){
        $get_cat_title = $_POST['cat_title_update'];
        $query = "UPDATE categories SET cat_title = '{$get_cat_title}' WHERE cat_id = {$cat_id}";
        $update_query = mysqli_query($conn,$query);
        header("Location:categories.php"); //refreshes

        checkQuery($update_query);

    }
    ?>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category"  value="Update Category">
                                </div>
                            </form>