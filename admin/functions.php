<?php

function checkQuery($result){
    global $conn; 
    if(!$result){
        die('Query Failed' .mysqli_error($conn));
    }
}


function insertCategories(){
global $conn;
    if(isset($_POST['submit'])){
        $cat_title =  $_POST['cat_title'];

        if($cat_title==""|| empty($cat_title)){
            echo "Field cannot be empty";
        }else{
            $query = "INSERT INTO categories(cat_title) ";
            $query .=  "VALUE ('{$cat_title}')";

            $create_category_query = mysqli_query($conn,$query);

            if(!$create_category_query){
                die('Query Failed' .mysqli_error($conn));
            }
        }
     }

}

function findAllCategories(){
    global $conn;
    $query = "SELECT * FROM categories";
    $get_all_categories_admin = mysqli_query($conn,$query);

        while ($row = mysqli_fetch_assoc($get_all_categories_admin)){
            $cat_id = $row['cat_id'];    
            $cat_title = $row['cat_title'];
            echo "<tr>";
            echo "<td>{$cat_id}</td>";
            echo "<td>{$cat_title}</td>";
            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</td></a>";
            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</td></a>";
            echo "</tr>";;
        }

}

function deleteCategories(){
    global $conn;   
    if(isset($_GET['delete'])){
        $get_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$get_cat_id}";
        $delete_query = mysqli_query($conn,$query);
        header("Location:categories.php"); //refreshes
    }
}


?>