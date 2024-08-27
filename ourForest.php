<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Evergreen - Our Forest</title>
   <link rel="stylesheet" href="css/styles.css" />
   <link rel="stylesheet" href="css/typography.css" />
   <link rel="stylesheet" href="css/navbar.css">
   <script src="js/script.js"></script>
   <script src="https://kit.fontawesome.com/2028364a6f.js" crossorigin="anonymous"></script>
</head>

<body class="forestPage">
   <header>
      <nav class="desktopNav">
         <a href="ourForest.php" class="biggerTitle">Our Forest</a>
         <div>
            <a href="ourForest.php" class="currentPage">Our Forest</a>
            <a href="#">The Data</a>
            <a href="about.html">About</a>
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
            <a href="#">The Data</a>
            <a href="about.html">About</a>
         </div>
      </div>
   </header>

   <main>

      <div class="seedlings">
         <!--Seedlings here-->
      </div>

      <div id="helpPopup">
         <i class="fa-solid fa-xmark" onclick="closeHelpPopup()"></i>
         <article>
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
      <a href="plant-a-seed/plant1.php">Plant+</a>
      <h6 onclick="openHelpPopup()">Help</h6>
   </footer>
</body>

</html>