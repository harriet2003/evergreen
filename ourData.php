<?php
include 'connection.php'; // Make sure the database connection is included

// SQL query to count the number of rows
$sql = "SELECT COUNT(*) AS total FROM user_seedling";
$result = $mysqli->query($sql);

// Fetch the result
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalSeedlings = $row['total']; // Get the total count
} else {
    $totalSeedlings = 0; // If no rows, set to 0
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Evergreen - Your Data</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/typography.css" />
    <link rel="stylesheet" href="css/navbar.css" />
    <script src="js/script.js" defer></script>
    <script src="https://kit.fontawesome.com/2028364a6f.js" crossorigin="anonymous"></script>
</head>

<body class="dataPage">
    <header>
        <nav class="desktopNav">
            <a href="ourForest.php" class="navTitle">Evergreen</a>
            <div>
                <a href="ourForest.php">Our Forest</a>
                <a href="ourData.php" class="currentPage">Our Data</a>
                <a href="about.html">Our Purpose</a>
            </div>
        </nav>

        <nav class="mobileNav">
            <a href="ourForest.php">Evergreen</a>
            <i class="fa-solid fa-bars" onclick="openNav()"></i>
        </nav>

        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

            <div class="overlay-content">
                <a href="ourForest.php">Our Forest</a>
                <a href="ourData.php" class="currentPage">Our Data</a>
                <a href="about.html">Our Purpose</a>
            </div>
        </div>
    </header>

    <main>
        <section id="totalSeedlings">
            <h5>Number of seedlings of hope planted</h5>
            <h1><?php echo $totalSeedlings; ?></h1>
            <button id="toPlantButton">Plant a seedling now</button>
        </section>

        <section id="moreToCome">
            <h5>More data about your seedlings to come</h5>
        </section>

    </main>

    <footer>
        <h3>Plant the seed for a better future</h3>
    </footer>

    <script>
        const button = document.getElementById("toPlantButton");

        button.addEventListener("click", () => {
            window.location.href = "plant-a-seed/plant1.php";
        });
    </script>
</body>

</html>