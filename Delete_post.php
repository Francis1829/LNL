<?php 
include('mydb.php');

if(isset($_GET['pid'])){
    $pid = $_GET['pid'];

    $stmt = "DELETE FROM posts WHERE id = $pid";

    if($conn->query($stmt) == true){
        header("Location: Index.php");
    }else{
        echo "There Was An Error!";
    }
}


?>