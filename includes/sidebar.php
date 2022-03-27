<div class="col-md-4">

<!-- Blog Search Well -->


<div class="well">
    <h4>Search here</h4>
    <form action="search.php" method="post">
        <div class="input-group">
            <input type="text" class="form-control" name="search">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="submit">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
    </form>
    <!-- /.input-group -->
</div>

<div class="well">
    <h4>Login</h4>
    <form action="includes/login.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Enter Username">
        </div>
        <div class="input-group">
            <input type="text" class="form-control" name="password" placeholder="Enter Password">
            <span class="input-group-btn">
                <button class="btn btn-primary" type="submit" name="submit">Submit
            </button>
            </span>
        </div>
    </form>
    <!-- /.input-group -->
</div>




<!-- Blog Categories Well -->


<div class="well">
    <h4>Blog Categories</h4>

            <?php 
                $query = "SELECT * FROM categories";
                $get_all_categories_sidebar = mysqli_query($conn,$query);
                
            ?>
    <div class="row">
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <ul class="list-unstyled">
                    <?php
                        while ($row = mysqli_fetch_assoc($get_all_categories_sidebar)){
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                echo "<li><a href='categories.php?source=view_posts_by_cat&cat={$cat_id}'>{$cat_title}</a></li>";
                            }
                    ?>
                </li>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<?php include "widget.php";?>