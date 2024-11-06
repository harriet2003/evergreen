<?php
session_start();

if (isset($_POST['plantButton'])) {
    $_SESSION['plantSuccess'] = true;

    header("Location: ../ourForest.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Evergreen - Plant a Seedling</title>
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/typography.css" />
    <link rel="stylesheet" href="../css/navbar.css">
    <script src="../js/script.js" defer></script>
    <script src="https://kit.fontawesome.com/2028364a6f.js" crossorigin="anonymous"></script>
	<link rel="icon" type="image/x-icon" href="/images/illustrations/fern.svg">
</head>

<body class="seedlingResult">
    <header>
        <nav class="desktopNav">
            <a href="../ourForest.php" class="navTitle">Evergreen</a>
            <div>
                <a href="../ourForest.php">Our Forest</a>
                <a href="../ourData.php">Our Data</a>
                <a href="../about.html">Our Purpose</a>
            </div>
        </nav>

        <nav class="mobileNav">
            <a href="../ourForest.php">Evergreen</a>
            <i class="fa-solid fa-bars" onclick="openNav()"></i>
        </nav>

        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

            <div class="overlay-content">
                <a href="../ourForest.php">Our Forest</a>
                <a href="../ourData.php">Our Data</a>
                <a href="../about.html">Our Purpose</a>
            </div>
        </div>
    </header>

    <main>
        <h5 class="capitalise">Your Seedling</h5>

        <div class="result">
            <div>
                <?php
                include '../connection.php';

                // Check if the session contains the chosen seedling
                if (isset($_SESSION["chosenSeedling"])) {
                    $chosenSeedling = $_SESSION["chosenSeedling"];
                    echo "<p id='plantName'>" . $chosenSeedling . "</p>";

                    // Map plant names to their corresponding image paths
                    $plantImages = [
                        "Fern" => "../images/illustrations/fern.svg",
                        "Pohutukawa" => "../images/illustrations/pohutukawa.svg",
                        "Kowhai" => "../images/illustrations/kowhai.svg",
                        "Manuka" => "../images/illustrations/manuka.svg",
                        "Rata" => "../images/illustrations/rata.svg",
                        "Koru" => "../images/illustrations/koru.svg"
                    ];

                    // Check if the chosen seedling exists in the plantImages array and display the image
                    if (array_key_exists($chosenSeedling, $plantImages)) {
                        $plantImage = $plantImages[$chosenSeedling];
                        echo "<img src='" . $plantImage . "' alt='Image of " . $chosenSeedling . "'>";
                    } else {
                        echo "<p>No image available for this plant.</p>";
                    }
                } else {
                    // If the chosenSeedling is not in the session, display an error message
                    echo "<p>No plant selected.</p>";
                }

                $mysqli->close();
                ?>
                <p id="plantName" style="opacity: 0;">Filler</p>
            </div>
            <div>
                <p>What Nature Means To Me</p>

                <?php
                include '../connection.php';

                $sql = "SELECT userComment, userName, userLocation FROM user_seedling";
                $result = $mysqli->query($sql);


                if ($_SESSION == TRUE) {
                    echo "<h6 class='resultContent'>" . $_SESSION["userComment"] . "</h6>";
                    echo "<p class='resultContent'>" . $_SESSION["userName"] . "</p>";
                    echo "<p class='resultContent'>" . $_SESSION["userLocation"] . "</p>";
                }

                $_SESSION['lastPlantedSeedling'] = $_SESSION["chosenSeedling"];

                $mysqli->close();
                ?>
            </div>
        </div>

        <form method="POST">
            <button type="submit" name="plantButton" class="button" id="plantSeedlingButton">Plant Seedling</button>
        </form>
    </main>
</body>

</html>