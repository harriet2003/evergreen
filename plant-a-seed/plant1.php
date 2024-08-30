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
                <a href="#">The Data</a>
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
                <a href="#">The Data</a>
                <a href="../about.html">About</a>
            </div>
        </div>
    </header>

    <main>
        <h5 class="capitalise">Select a Seedling</h5>

        <!--MOBILE-->
        <div class="mobileSeedlingSelection">

            <i class="fa-solid fa-arrow-left prev-btn"></i>

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

            <i class="fa-solid fa-arrow-right next-btn"></i>
        </div>

        <p class="carousel-caption">Fern</p> <!-- Caption below the carousel -->

        <!--DESKTOP-->
        <div class="desktopSeedlingSelection">

            <div class="seedlings">
                <div class="seedling">
                    <div>
                        <img src="">
                    </div>
                    <h6>Pohutukawa</h6>
                </div>
                <div class="seedling">
                    <div>
                        <img src="">
                    </div>
                    <h6>Mānuka</h6>
                </div>
                <div class="seedling">
                    <div>
                        <img src="">
                    </div>
                    <h6>Fern</h6>
                </div>
            </div>

        </div>
    </main>

    <footer>
        <form action="plant2.php">
            <input type="hidden" name="selectedImage" id="selectedImage">
            <button type="submit" class="button submitSeedling">Next</button>
        </form>

        <!--<a href="plant2.php" class="button">Next</a>-->
        <div class="progressBar">
            <i class="fa-solid fa-circle currentCircle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
        </div>
    </footer>
</body>

</html>