<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Evergreen - Plant a Seedling</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/typography.css" />
    <script src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/2028364a6f.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav>
            <h5>Evergreen</h5>
            <i class="fa-solid fa-bars"></i>
        </nav>
    </header>

    <main>
        <h5>Select a Seedling</h5>

        <div class="mobileSeedlingSelection">
            <i class="fa-solid fa-arrow-left"></i>
            <div>
                <img src="">
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

        <button class="button">Next</button>

        <div class="progressBar2">
            <i class="fa-solid fa-circle currentCircle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
        </div>

    </main>
</body>

</html>