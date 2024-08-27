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

<body class="plantSeedlingPage questionLayout">
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
        <form>
            <fieldset>
                <label>
                    Now just a little but about you, what is your name and where do you live? Don't worry, these
                    questions are optional if you don't feel like sharing.
                </label>
                <input type="text" id="userName" name="userName" placeholder="What is your name? (optional)">
                <input type="text" id="userLocation" name="userLocation" placeholder="Where are you from? (optional)">
            </fieldset>
            <a href="plant4.php" class="button">Next</a>
        </form>


        <div class="progressBar">
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle currentCircle"></i>
            <i class="fa-solid fa-circle"></i>
        </div>

    </main>
</body>

</html>