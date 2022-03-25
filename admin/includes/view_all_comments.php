<table class="table table-bordered table-hover back">
    <thead class="background-color-1">
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>Date</th>
            <th>In response to</th>
            <th>Approve</th>
            <th>Unapproved</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

<?php


$query = "SELECT * FROM comments ORDER BY comment_id DESC";
$get_all_comments = mysqli_query($conn,$query);

        while ($row = mysqli_fetch_assoc($get_all_comments)){
            $comment_id = $row['comment_id'];    
            $comment_post_id = $row['comment_post_id'];
            $comment_email = $row['comment_email'];
            $comment_date = $row['comment_date'];
            $comment_author = $row['comment_author'];
            $comment_status = $row['comment_status'];
            $comment_content = $row['comment_content'];
            $comment_date = $row['comment_date'];
            echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td>{$comment_content}</td>";
            echo "<td>{$comment_email}</td>";
            echo "<td>{$comment_status}</td>";
            echo "<td>{$comment_date}</td>";

            $qry = "SELECT * FROM posts WHERE post_id =$comment_post_id";
            $get_all_posts = mysqli_query($conn,$qry);
                while ($row = mysqli_fetch_assoc($get_all_posts)){
                $post_id = $row['post_id'];   
                $post_title = $row['post_title'];    
                
                echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</td>";

                }

            echo "<td><a href='comments.php?approve={$comment_id}'>Approve</td></a>";
            echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</td></a>";
            echo "<td><a href='comments.php?delete={$comment_id}'>Delete</td></a>";
            echo "</tr>";
        }


?>
                                </tbody>
                            </table>

<?php

//approve
if(isset($_GET['approve'])){
    $comment_id = $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id=$comment_id ";
    $update_comment = mysqli_query($conn,$query);
    header("Location:comments.php"); //refreshes

}
//unapprove
if(isset($_GET['unapprove'])){
    $comment_id = $_GET['unapprove'];
    $query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id=$comment_id ";
    $update_comment = mysqli_query($conn,$query);
    header("Location:comments.php"); //refreshes

}

if(isset($_GET['delete'])){
    $del_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$del_id}";
    $delete_comment = mysqli_query($conn,$query);
    header("Location:comments.php"); //refreshes
}
?>