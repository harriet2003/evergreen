<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Evergreen - Our Forest</title>
   <link rel="stylesheet" href="css/styles.css" />
   <link rel="stylesheet" href="css/typography.css" />
   <link rel="stylesheet" href="css/navbar.css">
   <script src="js/script.js" defer></script>
   <script src="js/forestPage.js" defer></script>
   <script src="https://kit.fontawesome.com/2028364a6f.js" crossorigin="anonymous"></script>
   <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
</head>

<body class="forestPage">
   <header>
      <nav class="desktopNav">
         <a href="ourForest.php" class="biggerTitle">Our Forest</a>
         <div>
            <a href="ourForest.php" class="currentPage">Our Forest</a>
            <a href="about.html">Our Purpose</a>
         </div>
      </nav>

      <nav class="mobileNav">
         <a href="ourForest.php" class="biggerTitle">Our Forest</a>
         <i class="fa-solid fa-bars" onclick="openNav()"></i>
      </nav>

      <div id="myNav" class="overlay">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

         <div class="overlay-content">
            <a href="ourForest.php" class="currentPage">Our Forest</a>

            <a href="about.html">Our Purpose</a>
         </div>
      </div>
   </header>

   <main>

      <div id="forest">
         <!--Seedlings here-->
      </div>

      <div id="helpPopup" class="modal">
         <i class="fa-solid fa-xmark" onclick="closeHelpPopup()"></i>
         <article class="modal-content">
            <h6>How to explore</h6>
            <p>Welcome to Our Forest, Our Ngāherehere.
            </p>
            <p>
               Wonder and explore through native flora and fauna and uncover what nature means to our country - their
               unique hopes, memories and loves.
            </p>
            <p>
               Drag and click to expand on the seedlings and plant your own seed of hope in the digital forest by
               clicking PLANT+.</p>
         </article>
      </div>
   </main>

   <footer>
      <div>
         <dotlottie-player id="arrow" src="https://lottie.host/05f54aa3-04dd-4239-9298-87fdff775ee2/HW4ndqeLyr.json"
            background="transparent" speed="1" style="width: 4rem; height: 4rem; transform: rotate(180deg)" loop
            autoplay></dotlottie-player>

         <a href="plant-a-seed/plant1.php" id="plantButton">Plant+</a>
      </div>

      <h6 onclick="openHelpPopup()" class="popup">Help</h6>
   </footer>
</body>

</html>