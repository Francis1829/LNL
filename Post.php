<?php
session_start();



if (!isset($_SESSION['Login'])) {
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
    <title>Post</title>

</head>

<body>
    <header class="bg-light border-b">
        <nav class="flex justify-between px-10 p-1 items-center">
            <div class="Logo font-bold text-3xl">
                <div class="text-center bg-black text-white px-4 py-1 rounded-lg cursor-pointer">FECEBOOK</div>
            </div>
            <div class="flex justify-end items-center">
                <a href="Logout.php"><button class="bg-theme-color hover:bg-t-hover ease-in-out duration-300 text-center px-4 py-1 flex justify-center items-center rounded-lg text-[18px] text-white font-[Roboto] ">Logout</button></a>
            </div>
        </nav>
    </header>
    <div class="w-full flex justify-center items-center py-1 shadow-md">
        <ul class="flex">
            <li class="mx-5 font-semibold"><a href="Home.php">Admin</a></li>
            <li class="mx-5 font-semibold"><a href="Post.php">Post</a></li>
        </ul>
    </div>
    <div class="flex w-full justify-center items-center p-5 ">
        <div class="w-[80%] bg-[#242526] rounded-lg shadow-lg py-4">
            <form action="Index.php" method="POST" class="flex flex-col">
                <div class="text-2xl text-white font-bold text-center pb-4 border-b">
                    Creat Post
                </div>
                <textarea name="post" id="post" cols="90" rows="10" class="resize-none  p-4 text-lg font-simebold outline-none bg-[#242526]" placeholder="What's on your mind," ></textarea>
                <div class="flex w-full justify-center border-t pt-4">
                    <button type="submit" class="w-full m-2 p-2 duration-300 ease-in-out font-bold shadow-xl rounded-xl text-white bg-black hover:text-black hover:bg-white">Post</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>