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


$query = "SELECT * FROM comments";
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

            echo "<td>{$comment_post_id}</td>";
            

           
            
            echo "<td><a href = #'>Approve</td>";
            echo "<td><a href = #'>Unapprove</td>";
            echo "<td><a href='comments.php?delete={$comment_id}'>Delete</td></a>";
            echo "</tr>";
        }


?>
                                </tbody>
                            </table>

<?php
if(isset($_GET['delete'])){
    $del_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$del_id}";
    $delete_comment = mysqli_query($conn,$query);
    header("Location:includes/view_all_comments.php"); //refreshes
}
?>