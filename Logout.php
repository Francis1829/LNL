<?php 
session_start();
if(isset($_SESSION['Login'])) {
    session_unset();
    header("Location: Login.php");
    
}

?>