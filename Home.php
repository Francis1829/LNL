<?php 
date_default_timezone_set('Asia/Manila');
session_start();

if(!isset($_SESSION['Login'])) {
    header("Location: Login.php");
}

?>

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
    <title>Home</title>

</head>
<body>
<header class="bg-light border-b">
    <nav class="flex justify-between px-10 p-1 items-center">
        <div class="Logo font-bold text-3xl">
            <div class="text-center bg-black text-white px-4 py-1 rounded-lg cursor-pointer">FECEBOOK</div>
        </div>

        <div class="flex justify-end items-center">
   <a href="Logout.php"><button class="bg-theme-color hover:bg-t-hover ease-in-out duration-300 text-center px-4 py-1 flex justify-center items-center rounded-lg text-[18px] text-white font-[Roboto] ">Logout</button></a></div>
    </nav>
</header>
<div class="w-full flex justify-center items-center py-1 shadow-md">
     <ul class="flex">
                <li class="mx-5 font-semibold">Admin</li>
                <li class="mx-5 font-semibold"><a href="Post.php">Post</a></li>
            </ul>
        </div>
        <div class="flex w-full justify-center items-center p-4">
        <div class="px-4 py-1 w-[30%] bg-light rounded-full shadow-lg">
            <form action="Home.php" method="GET" class="flex items-center justify-center" > 
            <input
                  type="text"
                  name="Search"
                  id="Seacrh"
                  placeholder="Search users"
                  class="block box-border w-full rounded-full shadow-sm transition-all text-black-1200 border focus:shadow-md focus:outline-none focus:border-pink-900 placeholder-black-800 active:outline-none text-sm px-4 py-2"
                />
                  <button class="flex items-center justify-center px-2 py-1 opacity-60 hover:opacity-100 duration-300 ease-in-out text-white border rounded-full"><box-icon name='search'></box-icon></button>
            </form>
        </div>
        </div>

<?php 
include('mydb.php');

if (isset($_GET['Search'])) {
    
    $Search = $_GET['Search'];

    $stmt = $conn->prepare("SELECT id, name, user_name, email FROM users WHERE id LIKE ? OR name LIKE ? OR user_name LIKE ? OR email LIKE ?");
    $stmt->bind_param("ssss", $searchParam, $searchParam, $searchParam, $searchParam);

    $searchParam = "%$Search%";

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<div class='flex flex-row bg-light justify-between font-bold uppercase text-base lg:text-lg'>";
        echo "<div class='p-4 w-auto lg:w-[20%] border-r-2 text-center'>ID</div>";
        echo "<div class='p-4 w-auto lg:w-[20%] border-r-2 text-center'>Name</div>";
        echo "<div class='p-4 w-auto lg:w-[20%] border-r-2 text-center'>User Name</div>";
        echo "<div class='p-4 w-auto lg:w-[40%] border-r-2 text-center'>Email</div>";
        echo "</div>";
     
        while ($row = $result->fetch_assoc()) {
            echo "<div class='flex justify-between font-semibold text-sm lg:text-base'>";
            echo "<div class=' border-b-2 border-black p-3 w-auto lg:w-[20%] bg-t-hover text-center flex flex-wrap'>" . $row['id'] . "</div>";
            echo "<div class=' border-b-2 border-black p-3 w-auto lg:w-[20%] text-center flex flex-wrap'>" . $row['name'] . "</div>";
            echo "<div class=' border-b-2 border-black p-3 w-auto lg:w-[20%] bg-t-hover text-center flex flex-wrap'>" . $row['user_name'] . "</div>";
            echo "<div class=' border-b-2 border-black p-3 w-auto lg:w-[40%] text-center flex flex-wrap'>" . $row['email'] . "</div>";
            echo "</div>";
        }
      
       
    } else {
        echo "No Result Found";
    }

    $stmt->close();
}

$conn->close();
?>

<div class="flex justify-center items-center flex-col w-full">
        <?php
        include('mydb.php');

        if (isset($_POST['post'])) {

            $_POST['post'] = strip_tags($_POST['post']);
            $post = mysqli_real_escape_string($conn, $_POST['post']);

            $stmt = $conn->prepare("INSERT INTO posts (posts, user_id) VALUES (? , 1)");
            $stmt->bind_param("s", $post);

            if ($stmt->execute()) {
                header("Location: Home.php");
            } else {
                echo "There was an error in your post";
            }
        }
        $stmt = "SELECT * FROM posts";
        $result = $conn->query($stmt);

        echo "<div class='flex flex-col-reverse justify-center items-center rounded-md m-1 w-full'>";
       

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='py-10 rounded-md flex flex-col flex-wrap m-2 relative w-[90%] h-auto bg-[#242526]'>" .
                     "<div class=' p-7 border-t text-white text-lg capitalize'>" . 
                     $row['posts'] . "<div class='text-sm mt-5 opacity-70'>" . $row['Time'] ."</div>" . "</div>" .
                     "<a href='Delete_post.php?pid=" . $row['id'] . "' class='absolute right-3 top-2' ><box-icon name='x-circle' color='white'></box-icon></a>" .
                     "<div class='flex justify-end items-center w-full border-t'>" .
                     "<a href='Edit_post.php?pid=" . $row['id'] . "' class='hover:underline text-white opacity-80 hover:opacity-100 duration-300 ease-in-out text-base font-semibold absolute bottom-2 right-4' >Edit Post</a></div>" .
                     "</div>";
            }
        }
        echo "</div>";
        ?>
    
    </div>


</body>
</html>