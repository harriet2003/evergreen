<?php
session_start();

include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if chosenSeedling is set and not empty
    if (isset($_POST['chosenSeedling']) && !empty($_POST['chosenSeedling'])) {
        // Store the chosen seedling in the session instead of the database
        $_SESSION['chosenSeedling'] = $_POST['chosenSeedling'];

        header("refresh:0;url=plant2.php");
        exit();
    } else {
        echo "No seedling was selected.";
    }
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
    <script src="../js/chooseSeedling.js" defer></script>
    <script src="https://kit.fontawesome.com/2028364a6f.js" crossorigin="anonymous"></script>
</head>

<body class="plantSeedlingPage chooseSeedling">
    <header>
        <nav class="desktopNav">
            <a href="../ourForest.php" class="navTitle">Evergreen</a>
            <div>
                <a href="../ourForest.php">Our Forest</a>
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
                <a href="../about.html">Our Purpose</a>
            </div>
        </div>
    </header>

    <main>
        <h5 class="capitalise">Select a Seedling</h5>

        <div class="carousel-container">
            <form id="plantSelectionForm" method="POST">

                <div class="carousel">
                    <!-- Navigation buttons -->
                    <div class="carousel-navigation">
                        <button type="button" id="prevSlide"><i class="fa-solid fa-arrow-left"></i></button>
                    </div>

                    <div class="carousel-slide" data-plant="Fern">
                        <img src="../images/illustrations/fern.svg" alt="image of fern seedling">
                        <p>Fern</p>
                    </div>

                    <div class="carousel-slide" data-plant="Pohutukawa">
                        <img src="../images/illustrations/pohutakawa.svg" alt="image of pohutukawa seedling">
                        <p>Pohutukawa</p>
                    </div>

                    <div class="carousel-slide" data-plant="Kowhai">
                        <img src="../images/illustrations/kowhai.svg" alt="image of kowhai seedling">
                        <p>Kowhai</p>
                    </div>

                    <div class="carousel-slide" data-plant="Manuka">
                        <img src="../images/illustrations/manuka.svg" alt="image of manuka seedling">
                        <p>Manuka</p>
                    </div>

                    <div class="carousel-slide" data-plant="Rata">
                        <img src="../images/illustrations/rata.svg" alt="image of rata seedling">
                        <p>Rata</p>
                    </div>

                    <div class="carousel-slide" data-plant="Koru">
                        <img src="../images/illustrations/koru.svg" alt="image of koru seedling">
                        <p>Koru</p>
                    </div>

                    <!-- Navigation buttons -->
                    <div class="carousel-navigation">
                        <button type="button" id="nextSlide"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>

                <!-- Hidden input to store the selected plant -->
                <input type="hidden" id="chosenSeedling" name="chosenSeedling" value="">

                <!-- Submit button -->
                <div class="carousel-submit">
                    <button type="submit" name="seedlingSubmit" class="button">Submit</button>
                    <!-- Validation message (hidden initially) -->
                    <p id="validationMessage" style="color:red; display:none;">Please select a plant before submitting.
                    </p>
                </div>
            </form>
        </div>

        <div class="progressBar desktopProgress">
            <i class="fa-solid fa-circle currentCircle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
        </div>
    </main>

    <footer>
        <div class="progressBar mobileProgress">
            <i class="fa-solid fa-circle currentCircle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
        </div>
    </footer>
</body>

</html>