<?php
include 'connection.php';

//For plant data modal
if (isset($_GET['plantId'])) {
   $plantId = $_GET['plantId'];

   // Prepare the SQL query to fetch the relevant data
   $sql = "SELECT userName, userLocation, userComment, chosenSeedling FROM user_seedling WHERE id = ?";
   $stmt = $mysqli->prepare($sql);
   $stmt->bind_param('i', $plantId);  // 'i' for integer type
   $stmt->execute();
   $result = $stmt->get_result();

   if ($result->num_rows > 0) {
      $data = $result->fetch_assoc();
      echo json_encode($data);  // Make sure chosenSeedling is included here
   } else {
      echo json_encode(['error' => 'No data found']);
   }

   $stmt->close();
   exit;
}


$sql = "SELECT id, chosenSeedling FROM user_seedling ORDER BY RAND() LIMIT 25";
$result = $mysqli->query($sql);

$plants = [];
if ($result->num_rows > 0) {
   while ($row = $result->fetch_assoc()) {
      $plants[] = $row;  // Store the entire row, including the id and chosenSeedling
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
   <meta http-equiv="refresh" content="60">
   <title>Evergreen - Our Forest</title>
   <link rel="stylesheet" href="css/styles.css" />
   <link rel="stylesheet" href="css/typography.css" />
   <link rel="stylesheet" href="css/navbar.css">
   <link rel="stylesheet" href="css/forestView.css">
   <script src="https://kit.fontawesome.com/2028364a6f.js" crossorigin="anonymous"></script>
   <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
   <link rel="icon" type="image/x-icon" href="images/illustrations/fern.svg">
</head>

<body class="forestPage forestViewPage">
   <header>
      <h1 id="forestTitle">Our Forest</h1>
   </header>

   <main>
      <div id="forestFrame">
         <?php foreach ($plants as $plant): ?>
            <?php
            $top = rand(10, 50);  // Adjust to ensure there's padding from the top and bottom
            $left = rand(10, 90); // Adjust to ensure there's padding from the left and right
            $size = rand(300, 600);     // Maintain random size between 100 and 250px
            ?>
            <div class="seedlingOutput" style="top: <?= $top ?>%; left: <?= $left ?>%; width: <?= $size ?>px;"
               onmouseover="playRustleAudio()" onmouseout="stopRustleAudio()" onclick="showDataModal(<?= $plant['id'] ?>)">
               <img src="images/illustrations/<?= strtolower($plant['chosenSeedling']) ?>.svg"
                  alt="<?= $plant['chosenSeedling'] ?>" style="width: 100%;" id="forestImage" class="jiggle">
            </div>
         <?php endforeach; ?>
         <audio id="rustleAudio" src="rustle.mp3" type="audio/mpeg"></audio>
      </div>

      <script>
         var showSuccessModal = <?php echo json_encode($showSuccessModal); ?>;
      </script>

      <footer>
         <div>
            <h4>Nature can mean so many different things to all of us.
               <br>
               Why do you love nature, what inspires you to protect our forest?
            </h4>

            <h3>Scan the QR code to plant a seeding of hope</h3>
         </div>
      </footer>
   </main>
</body>

</html>