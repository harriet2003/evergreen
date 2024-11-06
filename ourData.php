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
    <title>Evergreen - Our Data</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/typography.css" />
    <link rel="stylesheet" href="css/navbar.css" />
    <script src="js/script.js" defer></script>
    <script src="https://kit.fontawesome.com/2028364a6f.js" crossorigin="anonymous"></script>
	<link rel="icon" type="image/x-icon" href="images/illustrations/fern.svg">
</head>

<body class="dataPage">
    <header>
        <nav class="desktopNav fixedNav">
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
        <section id="totalSeedlings" class="hidden">
            <h5>Number of seedlings of hope planted</h5>
            <h1><?php echo $totalSeedlings; ?></h1>
            <button id="toPlantButton">Plant your seedling now</button>
        </section>
		
		<section id="blurb" class="hidden">
			<p>For every seedling of hope you plant on this website, we will plant a real life seedling to regenerate the beautiful nature found in Aotearoa. So, every small thing you do will make a difference.</p>
		</section>
    </main>
	
	<footer>
         <h2>You can make a difference</h2>
         <h6 style="text-align: center">Plant the seed for a better future.<br />And we'll plant one for real.</h6>
         <a href="plant-a-seed/plant1.php" class="button">Plant a Seedling</a>
    </footer>

    <script>
        const button = document.getElementById("toPlantButton");

        button.addEventListener("click", () => {
            window.location.href = "plant-a-seed/plant1.php";
        });
    </script>
</body>

</html>