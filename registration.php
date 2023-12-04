<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
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
    <title>Registration</title>
</head>

<body class="w-full h-screen flex justify-center items-center">
    <form class="flex flex-col justify-center items-center mt-5 bg-light p-10 rounded-lg shadow-md" action="validate.php?m=Register" method="post">
        <div class="text-start w-full py-4 text-3xl font-bold">Get Started</div>
        <div class="flex flex-col w-80 m-2 h-[70px]">
            <label class="w-[150px]">Name:</label>
            <input type="text" placeholder="Juan Delacruz" name="name" id="name" class="block box-border w-full rounded-md shadow-sm transition-all text-scale-1200 border focus:shadow-md outline-none focus:ring-current focus:ring-2 focus:border-scale-900 focus:ring-scale-400 placeholder-scale-800 text-sm px-4 py-2 mt-2" />
        </div>
        <div class="flex flex-col w-80 m-2 h-[70px]">
            <label class="w-[150px]">Email:</label>
            <input type="email" placeholder="Sample@gmail.com" name="email" id="name" class="block box-border w-full rounded-md shadow-sm transition-all text-scale-1200 border focus:shadow-md outline-none focus:ring-current focus:ring-2 focus:border-scale-900 focus:ring-scale-400 placeholder-scale-800 text-sm px-4 py-2 mt-2" />
        </div>
        <div class="flex flex-col w-80 m-2 h-[70px]">
            <label class="">Username:</label>
            <input type="text" name="username" id="username" class="block box-border w-full rounded-md shadow-sm transition-all text-scale-1200 border focus:shadow-md outline-none focus:ring-current focus:ring-2 focus:border-scale-900 focus:ring-scale-400 placeholder-scale-800 text-sm px-4 py-2 mt-2" placeholder="Username" />
        </div>
        <div class="flex flex-col w-80 m-2 h-[70px]">
            <label class="w-[150px]">Password:</label>
            <input type="password" name="password" id="password" class="block box-border w-full rounded-md shadow-sm transition-all text-scale-1200 border focus:shadow-md outline-none focus:ring-current focus:ring-2 focus:border-scale-900 focus:ring-scale-400 placeholder-scale-800 text-sm px-4 py-2 mt-2" placeholder="••••••••••" />
        </div>
        <div class="btnn flex justify-around items-center w-full">
            <button type="submit" class="bg-theme-color hover:bg-t-hover ease-in-out duration-300 text-center p-2 flex justify-center items-center w-80 rounded-lg text-[18px] mt-4 text-white font-[Roboto] ">
                Sign Up
            </button>
        </div>
        <div class="text-sm text-center w-full text-color mt-5">
            Have an Account? <a href="Login.php" class="hover:underline duration-500 ease-in-out">Sign In Now</a>
        </div>

    </form>
</body>

</html>