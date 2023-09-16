<?php
session_start();
include "db_conn.php";
include_once "config.php";

// Check if the user is logged in
if (isset($_SESSION['customer_id'])) {
  // User is logged in
  $navbarLinks = array(
    'Home' => './index.php',
    'Prices' => './prices.php',
    'My Account' => './myprofile.php',
    'Logout' => './logout.php' // Add a logout link
  );
} else {
  // User is not logged in
  $navbarLinks = array(
    'Home' => './index.php',
    'Prices' => './prices.php',
    'Register' => './register.php',
    'Login' => './login.php'
  );
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="output.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Home</title>
  <style>
    body {
      overflow: hidden;
      /* Prevent scrolling on the main page */
    }
  </style>
</head>

<body class="bg-white">

  <div class="fixed w-full h-auto">
    <img class="w-screen h-screen" src="images/stacked-peaks-haikei-_3_-min.jpeg" alt="" />
  </div>
  <nav class="z-50 backdrop-blur-lg lg:backdrop-blur-none py-4 px-8 absolute w-full top-0 from-white/20">
    <div class="container mx-auto p-4 flex flex-wrap items-center md:flex-no-wrap">
      <div class="mr-4 md:mr-8"></div>
      <div class="ml-auto md:hidden">
        <button onclick="menuToggle()" class="flex items-center px-2 py-2" type="button">
          <svg class="h-10 w-10 text-black" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path fill="currentColor" d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </svg>
        </button>
      </div>
      <div id="menu" class="overflow-hidden md:overflow-visible lg:overflow-visible w-full h-0 transition-all ease-out duration-500 md:transition-none md:w-auto md:flex-grow md:flex md:items-center">
        <ul id="ulMenu" class="flex flex-col duration-300 ease-out sm:transition-none mt-5 mx-4 md:flex-row md:items-center md:mx-0 md:ml-auto md:mt-0 md:pt-0 md:border-0">
          <?php
          // Loop through the $navbarLinks array to generate navbar links
          foreach ($navbarLinks as $text => $link) {
            echo '<li><a class="hover:bg-white hover:shadow-md rounded-full md:p-2 lg:px-4 font-semibold block text-black px-4 py-1 hover:text-black transition duration-100" href="' . $link . '">' . $text . '</a></li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <script>
    // Getting hamburguer menu in small screens
    const menu = document.getElementById("menu");
    const ulMenu = document.getElementById("ulMenu");

    function menuToggle() {
      menu.classList.toggle("h-auto"); // Toggle the height property
      menu.classList.toggle("max-h-screen"); //
    }

    // Browser resize listener
    window.addEventListener("resize", menuResize);

    // Resize menu if user changing the width with responsive menu opened
    function menuResize() {
      // First get the size from the window
      const window_size = window.innerWidth || document.body.clientWidth;
      if (window_size > 640) {
        menu.classList.remove("h-32");
      }
    }
  </script>

  <div class="flex flex-col-reverse md:flex-row relative justify-center">
    <!-- Left Side (Text) -->
    <div class="md:w-1/2 h-screen flex flex-col justify-center items-center p-8">
      <!-- Text -->
      <div class="opacity-0 z-30 text-center md:text-left lg:text-left -skew-y-12 block duration-1000 relative transform transition-all -translate-x-24 ease-out" data-replace='{ "-translate-x-24": "translate-x-0", "opacity-0": "opacity-100"}'>
        <!-- Large Title -->
        <h1 class="text-white text-8xl md:text-7xl lg:text-9xl font-bold">
          ZUMBA
        </h1>
        <h1 class="text-white text-5xl md:text-6xl lg:text-8xl font-bold">
          WITH DAVEY
        </h1>
        <!-- Additional text or content can go here -->
        <div class="p-3">
          <div class="pt-2 pb-2 pl-1 pr-1 border-2 border-black">
            <h2 class="text-4xl">
              Tuesday's at 5:45pm & Saturdays at 7:30am at Westside Presbyte
            </h2>
          </div>
        </div>
        <div class="flex justify-between">
          <img class="w-1/2 h-auto" src="images/Zumba_Fitness_logo_PNG1.png" alt="" />
          <div class="right-0">
            <a class="px-4" href="https://www.facebook.com/zumbawithdavey">
              <svg class="fill-lavender-800 hover:fill-lavender-300 hover:scale-110 duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="100px" height="100px">
                <path d="M25,3C12.85,3,3,12.85,3,25c0,11.03,8.125,20.137,18.712,21.728V30.831h-5.443v-5.783h5.443v-3.848 c0-6.371,3.104-9.168,8.399-9.168c2.536,0,3.877,0.188,4.512,0.274v5.048h-3.612c-2.248,0-3.033,2.131-3.033,4.533v3.161h6.588 l-0.894,5.783h-5.694v15.944C38.716,45.318,47,36.137,47,25C47,12.85,37.15,3,25,3z" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
    <img class="opacity-0 duration-1000 relative transform transition-all translate-x-80 ease-out hidden lg:block" data-replace='{ "translate-x-80": "translate-x-0", "opacity-0": "opacity-100"}' src="images/pngwing.com.png" alt="" />
  </div>

  <style>
    h1 {
      text-shadow: 10px 10px #ca1a7e;
    }
  </style>

  <!-- Footer (scrollable) -->
  <footer class="bg-gray-900 text-white py-4 px-8 w-full">
    <!-- Add your footer content here -->
  </footer>
</body>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var replacers = document.querySelectorAll("[data-replace]");
    for (var i = 0; i < replacers.length; i++) {
      let replaceClasses = JSON.parse(
        replacers[i].dataset.replace.replace(/'/g, '"')
      );
      Object.keys(replaceClasses).forEach(function(key) {
        replacers[i].classList.remove(key);
        replacers[i].classList.add(replaceClasses[key]);
      });
    }
  });
</script>

</html>