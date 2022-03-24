<table class="table table-bordered table-hover back">
    <thead class="background-color-1">
        <tr>
            <th>ID</th>
            <th>Post Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Date</th>
            <th>Image</th>
            <th>Content</th>
            <th>Status</th>
            <th>Comments</th>
        </tr>
    </thead>
    <tbody>

<?php


$query = "SELECT * FROM posts";
$get_all_posts = mysqli_query($conn,$query);

        while ($row = mysqli_fetch_assoc($get_all_posts)){
            $post_id = $row['post_id'];    
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_status = $row['post_status'];
            $post_comment_count = $row['post_comment_count'];
            echo "<tr>";
            echo "<td>{$post_id}</td>";
            echo "<td>{$post_title}</td>";

            $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
            $select_categories = mysqli_query($conn,$query);
    
            while ($row = mysqli_fetch_assoc($select_categories)){
                $cat_id = $row['cat_id'];    
                $cat_title = $row['cat_title'];

            echo "<td>{$cat_title}</td>"; 

            }



            echo "<td>{$post_author}</td>";
            echo "<td>{$post_date}</td>";
            echo "<td><img src ='../images/{$post_image}' class='img-thumbnail'</td>";
            echo "<td>{$post_content}</td>";
            echo "<td>{$post_status}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</td></a>";
            echo "<td><a href='posts.php?delete={$post_id}'>Delete</td></a>";
            echo "</tr>";
        }


?>
                                </tbody>
                            </table>

<?php
if(isset($_GET['delete'])){
    $del_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$del_id}";
    $delete_post = mysqli_query($conn,$query);
    header("Location:categories.php"); //refreshes
}
?>