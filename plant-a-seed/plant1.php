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
    <script src="../js/seedling.js" defer></script>
    <script src="https://kit.fontawesome.com/2028364a6f.js" crossorigin="anonymous"></script>
</head>

<body class="plantSeedlingPage chooseSeedling">
    <header>
        <nav class="desktopNav">
            <a href="../ourForest.php" class="navTitle">Evergreen</a>
            <div>
                <a href="../ourForest.php">Our Forest</a>
                <a href="../about.html" class="currentPage">About</a>
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
                <a href="../about.html">About</a>
            </div>
        </div>
    </header>

    <main>
        <h5 class="capitalise">Select a Seedling</h5>

        <div class="seedlingSelection">

            <i class="prev-btn fa-solid fa-arrow-left"></i>

            <div class="carousel-container">
                <div class="carousel">
                    <div class="carousel-item" id="fern">
                        <img src="../images/illustrations/fern.svg" alt="image of fern seedling">
                    </div>
                    <div class="carousel-item" id="pohutukawa">
                        <img src="../images/illustrations/pohutakawa.svg" alt="image of pohutukawa seedling">
                    </div>
                    <div class="carousel-item" id="kowhai">
                        <img src="../images/illustrations/kowhai.svg" alt="image of kowhai seedling">
                    </div>
                    <div class="carousel-item" id="manuka">
                        <img src="../images/illustrations/manuka.svg" alt="image of manuka seedling">
                    </div>
                    <div class="carousel-item" id="rata">
                        <img src="../images/illustrations/rata.svg" alt="image of rata seedling">
                    </div>
                    <div class="carousel-item" id="koru">
                        <img src="../images/illustrations/koru.svg" alt="image of koru seedling">
                    </div>
                </div>
            </div>

            <i class="next-btn fa-solid fa-arrow-right"></i>
        </div>

        <div class="progressBar desktopProgress">
            <i class="fa-solid fa-circle currentCircle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
        </div>

        <p class="carousel-caption">Fern</p> <!-- Caption below the carousel -->
    </main>

    <footer>
        <form action="plant2.php">
            <input type="hidden" name="selectedImage" id="selectedImage">
            <button type="submit" class="button submitSeedling">Next</button>
        </form>

        <div class="progressBar mobileProgress">
            <i class="fa-solid fa-circle currentCircle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
        </div>
    </footer>
</body>

</html>