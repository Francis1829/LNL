<?php
include('mydb.php');


if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

    $stmt = "SELECT * FROM posts WHERE id = $pid";
    $result = $conn->query($stmt);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentPost = $row['posts'];
    }
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
    <title>Edit Post</title>
</head>

<body>
    <div class="flex h-screen w-full justify-center items-center">
        <form method="POST" class="p-4 border-2 flex flex-col justify-center items-center rounded-md w-[400px] h-[200px] bg-[#242526] shadow-lg" action="Editor_post.php?pid=<?php echo $row['id'] ?>">

            <input name="post" id="post" class="w-full shadow-lg text-white capitalize p-2 rounded-xl focus:ring outline-none bg-[#242526] " value='<?php echo $currentPost; ?>' ></input>
            <div class="mt-4 flex w-full justify-end">
            <button type="submit" class="w-full py-2 duration-300 ease-in-out font-bold shadow-xl rounded-lg text-white bg-black hover:text-black hover:bg-white">Edit</button>
            </div>
        </form>
    </div>



</body>

</html>