
<?php include "includes/admin_header.php";?>
<?php include "functions.php";?>
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
                            <small>UserName</small>
                        </h1>
                            <div class="col-xs-12">


    
<?php 
if(isset($_GET['source'])){
    $source = $_GET['source'];

}else{
    $source='';
}

switch($source) {

    case 'add_user';
    include "includes/add_user.php";
    break;
    case 'edit_post';
    include "includes/edit_post.php";
    break;
    default:
    include "includes/view_all_users.php";
    break;
}
?>


                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php";?>

        
