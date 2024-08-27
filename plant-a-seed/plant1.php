<?php
session_start();
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
    <script src="../js/script.js"></script>
    <script src="https://kit.fontawesome.com/2028364a6f.js" crossorigin="anonymous"></script>
</head>

<body class="plantSeedlingPage">
    <header>
        <nav class="desktopNav">
            <a href="ourForest.php" class="navTitle">Evergreen</a>
            <div>
                <a href="ourForest.php">Our Forest</a>
                <a href="#">The Data</a>
                <a href="about.html" class="currentPage">About</a>
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
                <a href="#">The Data</a>
                <a href="about.html">About</a>
            </div>
        </div>
    </header>

    <main>
        <h5 class="capitalise">Select a Seedling</h5>

        <div class="mobileSeedlingSelection">
            <i class="fa-solid fa-arrow-left"></i>
            <div class="seedling">
                <div>
                    <img src="">
                </div>
                <h6>Mānuka</h6>
            </div>
            <i class="fa-solid fa-arrow-right"></i>
        </div>

        <div class="desktopSeedlingSelection">
            <i class="fa-solid fa-arrow-left"></i>
            <div>
                <img src="">
                <h6>Pohutukawa</h6>
            </div>
            <div>
                <img src="">
                <h6>Mānuka</h6>
            </div>
            <div>
                <img src="">
                <h6>Fern</h6>
            </div>
            <i class="fa-solid fa-arrow-right"></i>
        </div>

        <a href="plant2.php" class="button">Next</a>

        <div class="progressBar">
            <i class="fa-solid fa-circle currentCircle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
        </div>

    </main>
</body>

</html>