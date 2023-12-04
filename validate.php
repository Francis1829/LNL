<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'white': '#fff',
                        'light': '#f5f3f2',
                        'black': '#000000',
                        'theme-color': '#d96f97',
                        't-hover': '#9e3f63',
                    },
                }
            }
        }
    </script>
    <title>Error</title>
</head>
<body>
    


<?php
session_start();
include('mydb.php');

if(isset($_GET['m'])) {
    switch($_GET['m']) {
        case "Login":
            if(!empty($_POST['username']) && !empty($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $stmt = "SELECT * FROM users WHERE user_name = '$username' AND password = '$password'";
                $result = $conn->query($stmt);

                if($result->num_rows > 0) {
                    $_SESSION['Login'] = true;
                    header("Location: Home.php");
                } else {
                    echo "<div class='flex h-screen justify-center items-center font-semibold text-xl'>";
                echo "<div class='w-[600px] h-[400px] border-2 bg-red-200 rounded-lg flex justify-center items-center'> Invalid username or Password! </div>";
                echo "</div>";
                }
            } else {
                echo "<div class='flex h-screen justify-center items-center font-semibold text-xl'>";
                echo "<div class='w-[600px] h-[400px] border-2 bg-red-200 rounded-lg flex justify-center items-center'>  Please fill in both username and password! </div>";
                echo "</div>";
            }
            break;

        case "Register":
            if(!empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
                $name = $_POST['name'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
            
                $stmt = "INSERT INTO users (name, email, user_name, password) VALUES ('$name', '$email', '$username', '$password')";
                if ($conn->query($stmt)) {
                    echo "Register Complete";
                    header("Location: Registration.php");
                } else {
                    echo "Error: ". $conn->error;
                }
            } else {
                echo "Please fill in all fields";
            }
            break;

        default:
            echo "Invalid Action";
    }
}
?>
</body>
</html>
