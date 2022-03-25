<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "admin/functions.php"; ?>

<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column //substituted with php query fn and a loop through all posts-->
            <div class="col-md-8">

        
        

            <?php 

            if(isset($_GET['p_id'])){
                $received_post_id = $_GET['p_id'];

            }
                $query = "SELECT * FROM posts where post_id=$received_post_id";
                $get_all_posts = mysqli_query($conn,$query);

                while ($row = mysqli_fetch_assoc($get_all_posts)){
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                
                ?> <!--break out of php to include the loop to go through all posts -->


                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="#"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

                <hr>

            <?php   }       ?> <!--close the loop-->
            
                <!-- Blog Comments -->

                <!-- Comments Form -->

                <?php
                if (isset($_POST['add_comment'])){   
                    $comment_post_id = $received_post_id;
                    $comment_email = $_POST['comment_email'];
                    $comment_date = ('d-m-y');
                    $comment_author = $_POST['comment_author'];
                    $comment_status = 'Pending';
                    $comment_content = $_POST['comment_content'];

                $query = "INSERT INTO comments(comment_post_id,comment_email,comment_date,comment_author,comment_status,comment_content) ";
                $query .="VALUES ({$comment_post_id},'{$comment_email}', now(),'{$comment_author}','{$comment_status}','{$comment_content}')";
                
                $add_comment_query = mysqli_query($conn,$query);

                checkQuery($add_comment_query);

                $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id =$received_post_id";
                $update_comment_count = mysqli_query($conn,$query);
            

                }
                ?>

                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">

                    <div class="form-group">
                    <label for="comment_author">Name</label>
                        <input type="text" class="form-control" rows="3" name="comment_author"></input>
                    </div>

                    <div class="form-group">
                        <label for="comment_email">Email</label>
                            <input type="email" class="form-control" rows="3" name="comment_email"></input>
                        </div>
                        
                        <div class="form-group">
                        <label for="comment_content">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php
                    $query = "SELECT * FROM comments WHERE comment_post_id=$received_post_id "; 
                    $query .= "AND comment_status='Approved' ORDER BY comment_id DESC";
                    $get_all_comments = mysqli_query($conn,$query);
                    $query_count = mysqli_num_rows( $get_all_comments);

                    if($query_count == 0){
                        echo "No comments"  ;
                    }else{

                   
                    
                            while ($row = mysqli_fetch_assoc($get_all_comments)){
                                $comment_id = $row['comment_id'];    
                                $comment_post_id = $row['comment_post_id'];
                                $comment_email = $row['comment_email'];
                                $comment_date = $row['comment_date'];
                                $comment_author = $row['comment_author'];
                                $comment_status = $row['comment_status'];
                                $comment_content = $row['comment_content'];
                                $comment_date = $row['comment_date'];

                            

                       
                ?>



                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>
        <?php }?>
<?php  }?> 
                
                <!-- Comment -->
            
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include "includes/footer.php";?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
