<?php 
session_start();

if(isset($_SESSION['Login'])) {
    if($_SESSION['Login'] === true) {
        header("Location: Home.php");
    }
}

?>
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
    <title>Dasboard Login</title>
</head>

<body class="w-full h-screen flex justify-center items-center">
    <form class="flex flex-col justify-center items-center mt-5 bg-light p-10 rounded-lg shadow-md" action="validate.php?m=Login" method="post">
        <div class="text-start w-full py-4 text-3xl font-bold">Welcome Back</div>
        <div class="inputs flex flex-col w-80 m-2 h-[70px]">
                <label htmlFor="#">Username:</label>
                <input
                  name="username"
                  id="username"
                  placeholder="sample@gmail.com"
                  class="block box-border w-full rounded-md shadow-sm transition-all text-scale-1200 border focus:shadow-md outline-none focus:ring-current focus:ring-2 focus:border-scale-900 focus:ring-scale-400 placeholder-scale-800 text-sm px-4 py-2 mt-2"
                />
              </div>

              <div class="inputs flex flex-col w-80 m-2 h-[70px]">
                <label htmlFor="#">Password:</label>
                <input
                  type="password"
                  name="password"
                  id="password"
                  placeholder="••••••••••"
                  class="mt-2 block box-border w-full rounded-md shadow-sm transition-all text-scale-1200 border focus:shadow-md outline-none focus:ring-current focus:ring-2 focus:border-scale-900 focus:ring-scale-400 placeholder-scale-800 text-sm px-4 py-2"
                />
              </div>

              <div class="text-start w-full my-5">
                <div class="remembertext-center">
                  <input
                    type="checkbox"
                    name="remember"
                    id="remember"
                    class="mx-2"
                  />
                  <label htmlFor="#"> Remember me.</label>
                </div>
              </div>
              <button
                type="submit"
                class="bg-theme-color hover:bg-t-hover ease-in-out duration-300 text-white font-[Roboto] text-center p-2 flex justify-center items-center w-80 rounded-lg text-[18px]"
                id="login"
              >
                Sign In
              </button>
              <div class="mx-8 text-sm text-color mt-5">
                Don't have an Account?
                <a href="Registration.php" class="hover:underline duration-500 ease-in-out md:cursor-pointer">
                  Sign Up Now
                </a>
              </div>
    </form>
</body>

</html>