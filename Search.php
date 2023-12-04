<?php 
include('mydb.php');


$Search = $_GET['Search'];
$stmt = "SELECT id, name, user_name, email FROM users WHERE id LIKE '%$Search%' OR name LIKE '%$Search%' OR user_name LIKE '%$Search%' OR email LIKE '%$Search%'";
$result = $conn->query($stmt); 


if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>ID: ".$row['id']." | Name: ".$row['name']." | User Name: ".$row['user_name']." | Email: ".$row['email']."</li>";
    }
    echo "</ul>";
}else {
    echo "No Result Found";
}

$conn->close();
?>