<?php
include 'connection.php';

//For plant data modal
if (isset($_GET['plantName'])) {
   $plantName = $_GET['plantName'];

   // Prepare the SQL query to fetch the relevant data
   $sql = "SELECT userName, userLocation, userComment FROM user_seedling WHERE chosenSeedling = ?";
   $stmt = $mysqli->prepare($sql);
   $stmt->bind_param('s', $plantName);
   $stmt->execute();
   $result = $stmt->get_result();

   if ($result->num_rows > 0) {
      $data = $result->fetch_assoc();
      echo json_encode($data);
   } else {
      echo json_encode(['error' => 'No data found']);
   }

   $stmt->close();
   exit;
}

$sql = "SELECT chosenSeedling FROM user_seedling ORDER BY RAND() LIMIT 20";
$result = $mysqli->query($sql);

$plants = [];
if ($result->num_rows > 0) {
   while ($row = $result->fetch_assoc()) {
      $plants[] = $row['chosenSeedling'];
   }
} else {
   echo "No plants found";
}

//For success modal
session_start();
// Check if the user was redirected after planting a seedling
$showSuccessModal = false;
if (isset($_SESSION['plantSuccess']) && $_SESSION['plantSuccess']) {
   $showSuccessModal = true;
   unset($_SESSION['plantSuccess']); // Unset the session variable so the modal doesn't show again on page refresh
}
?>

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
            <a href="ourData.php">Our Data</a>
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
            <a href="ourData.php">Our Data</a>
            <a href="about.html">Our Purpose</a>
         </div>
      </div>
   </header>

   <main>
      <div id="forestFrame">
         <?php foreach ($plants as $plant): ?>
            <?php
            $top = rand(0, 60);
            $left = rand(0, 85);
            $size = rand(100, 250);
            ?>
            <div class="seedlingOutput" style="top: <?= $top ?>%; left: <?= $left ?>%; width: <?= $size ?>px;"
               onmouseover="playRustleAudio()" onmouseout="stopRustleAudio()"
               onclick="showDataModal('<?= strtolower($plant) ?>')">
               <img src="images/illustrations/<?= strtolower($plant) ?>.svg" alt="<?= $plant ?>" style="width: 100%;"
                  id="forestImage">
            </div>
         <?php endforeach; ?>
         <audio id="rustleAudio" src="rustle.mp3" type="audio/mpeg"></audio>
      </div>


      <!-- SEEDLING DATA MODAL -->
      <div id="plantDataModal" class="modal">
         <span class="close">&times;</span>
         <div class="modal-content">
            <!-- This image will be updated dynamically -->
            <img id="modalPlantImage" src="images/illustrations/koru.svg" alt="plant illustration">
            <div class="modal-text">
               <p>What Nature Means To Me</p>
               <h5 id="userComment"></h5>
               <p id="userName"></p>
               <p id="userLocation"></p>
            </div>
         </div>
      </div>

      <!-- HELP POPUP -->
      <div id="helpPopup" class="modal">
         <span class="close" onclick="closeHelpPopup()">&times;</span>
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

      <!-- SUCCESS MODAL -->
      <div id="successModal" class="modal">
         <div class="modal-content">
            <article>
               <h5>Planted!</h5>
               <p>Thank you for planting your seed of hope. Remember, every action, no matter how small, makes an
                  impact.
                  Now, get out there and start planting seeds of change wherever you go!</p>
            </article>
            <button class="button closeSuccessButton" id="closeModal"
               style="font-size: 1rem; margin-top: 2rem; background-color: transparent;">Back to Forest</button>
         </div>
      </div>

      <script>
         var showSuccessModal = <?php echo json_encode($showSuccessModal); ?>;
      </script>

      <?php
      unset($_SESSION['lastPlantedSeedling']);
      ?>
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

   <script>
      document.addEventListener('DOMContentLoaded', function () {
         // Close the modal when the user clicks the "X"
         var closeButton = document.querySelector('.close');
         closeButton.onclick = function () {
            document.getElementById('plantDataModal').style.display = "none";
         };

         // Close the modal when the user clicks outside of the modal content
         window.onclick = function (event) {
            var modal = document.getElementById('plantDataModal');
            if (event.target == modal) {
               modal.style.display = "none";
            }
         };
      });

      function showDataModal(plantName) {
         var modal = document.getElementById("plantDataModal");

         // Fetch plant data from the same PHP file using plantName
         fetch('ourForest.php?plantName=' + plantName)
            .then(response => response.json())
            .then(data => {
               if (data.error) {
                  console.error('No data found for this plant');
                  return;
               }

               // Populate modal with the data
               document.getElementById("userComment").textContent = data.userComment;
               document.getElementById("userName").textContent = data.userName;
               document.getElementById("userLocation").textContent = data.userLocation;

               // Update the modal image to match the clicked plant
               var modalImage = document.getElementById("modalPlantImage");
               modalImage.src = 'images/illustrations/' + plantName + '.svg'; // Dynamically set image based on plant name
               modalImage.alt = plantName; // Update alt text too

               // Display the modal
               modal.style.display = "block";
            })
            .catch(error => console.error('Error fetching plant data:', error));
      }
   </script>
</body>

</html>