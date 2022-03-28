<?php include "includes/admin_header.php";?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $_SESSION['username'];?></small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
           
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                        $query = "SELECT * FROM posts";
                        $get_all_posts = mysqli_query($conn,$query);
                        $posts_count = mysqli_num_rows($get_all_posts);
                        ?>
                  <div class='huge'><?php echo $posts_count ;?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                        $query = "SELECT * FROM comments";
                        $get_all_comments = mysqli_query($conn,$query);
                        $comments_count = mysqli_num_rows($get_all_comments);
                        ?>
                     <div class='huge'><?php echo $comments_count ;?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                        $query = "SELECT * FROM users";
                        $get_all_users = mysqli_query($conn,$query);
                        $users_count = mysqli_num_rows($get_all_users);
                        ?>
                    <div class='huge'><?php echo $users_count;?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                        $query = "SELECT * FROM categories";
                        $get_all_categories = mysqli_query($conn,$query);
                        $categories_count = mysqli_num_rows($get_all_categories);
                        ?>
                        <div class='huge'><?php echo $categories_count ;?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>


                <!-- /.row -->
                <div class="row">
        <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],

          <?php
          $query = "SELECT * FROM posts WHERE post_status ='draft'";
          $get_all_drafts = mysqli_query($conn,$query);
          $draft_count = mysqli_num_rows($get_all_drafts);

          $query = "SELECT * FROM comments WHERE comment_status ='unapproved'";
          $get_all_unap_comments = mysqli_query($conn,$query);
          $unapp_comment_count = mysqli_num_rows($get_all_unap_comments);

          $query = "SELECT * FROM users WHERE user_role ='subscriber'";
          $get_all_subscribers = mysqli_query($conn,$query);
          $subscriber_count = mysqli_num_rows($get_all_subscribers);

          ?>

          <?php 
            $element_text = ['Posts','Drafts','Comments','Pending Comments','Users','Subscribers','Categories'];
            $element_count = [$posts_count,$draft_count,$comments_count,$unapp_comment_count,$users_count,$subscriber_count,$categories_count];

            for($i=0; $i<7;$i++){

                echo "['{$element_text[$i]}'".","."{$element_count[$i]}],";

            }
          ?>
        ]);

        var options = {
          chart: {
            title: 'Title',
            subtitle: 'subtitle',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
      

    </script>

        <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
            </div>
            <!-- /.container-fluid -->



        </div>
        <!-- /#page-wrapper -->




        </div>

        <?php include "includes/admin_footer.php";?>