<?php
include 'connection.php';

// Fetch the most recently added seedling ID
$latestSeedlingQuery = "SELECT id FROM user_seedling ORDER BY id DESC LIMIT 1";
$latestSeedlingResult = $mysqli->query($latestSeedlingQuery);
$latestSeedlingId = $latestSeedlingResult->fetch_assoc()['id'] ?? null;

// Fetch a random selection of seedlings
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
            $top = rand(10, 50);
            $left = rand(10, 90);
            $size = rand(150, 300);

            // Add the 'latest-seedling' class if this is the most recent seedling
            $isLatest = ($plant['id'] == $latestSeedlingId);
            ?>
            <div class="seedlingOutput <?= $isLatest ? 'latest-seedling' : '' ?>"
               style="top: <?= $top ?>%; left: <?= $left ?>%; width: <?= $size ?>px;" onmouseover="playRustleAudio()"
               onmouseout="stopRustleAudio()" onclick="showDataModal(<?= $plant['id'] ?>)">
               <img src="images/illustrations/<?= strtolower($plant['chosenSeedling']) ?>.svg"
                  alt="<?= $plant['chosenSeedling'] ?>" style="width: 100%;" id="forestImage" class="jiggle">
            </div>
         <?php endforeach; ?>
         <audio id="rustleAudio" src="rustle.mp3" type="audio/mpeg"></audio>
      </div>

      <script>
         const latestSeedlingId = <?php echo json_encode($latestSeedlingId); ?>;

         let lastSeedlingId = null;

         function checkForNewSeedling() {
            fetch('checkLatestSeedling.php')
               .then(response => response.json())
               .then(data => {
                  if (!lastSeedlingId) {
                     lastSeedlingId = data.latestSeedlingId;
                  } else if (data.latestSeedlingId > lastSeedlingId) {
                     location.reload();
                     console.log("Page reloaded due to new seedling");
                  }
               })
               .catch(error => console.error('Error checking for new seedlings:', error));
         }

         setInterval(checkForNewSeedling, 10000);
      </script>

      <footer>
         <div>
            <h5>Nature can mean so many different things to all of us.
               <br>
               Why do you love nature, what inspires you to protect our forest?
            </h5>

            <h4 class="capitalise">Scan the QR code to plant a seeding of hope</h4>
         </div>

         <img id="qr-code" src="images/qr-code.png">
      </footer>
   </main>
</body>

</html>