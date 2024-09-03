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
    <script src="../js/form.js" defer></script>
    <script src="../js/locations.js" defer></script>
    <script src="https://kit.fontawesome.com/2028364a6f.js" crossorigin="anonymous"></script>
</head>

<body class="plantSeedlingPage questionLayout">
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
        <form id="plantSeedling" action="">

            <div class="tab">
                <h6 class="question">
                    Nature can mean so many different things to all of us.
                    Why do you love nature, what inspires you to protect our forest?
                </h6>
                <input type="text" id="userComment" name="userComment" placeholder="type here"
                    oninput="this.className = ''">
            </div>

            <div class="tab">
                <h6 class="question">
                    Now just a little but about you, what is your name and where do you live? Don't worry, these
                    questions are optional if you don't feel like sharing.
                </h6>
                <input type="text" id="userName" name="userName" placeholder="What is your name? (optional)"
                    oninput="this.className = ''">

                <input list="cities" id="city-select" name="userLocation" placeholder="Where are you from? (optional)"
                    oninput="this.className = ''">

                <datalist id="cities">
                    <!-- Options will be populated here -->
                </datalist>
            </div>

            <div class="formButtons">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="button">Back</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)" class="button">Next</button>
            </div>
        </form>

        <div class="progressBar desktopProgress">
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle currentCircle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
        </div>
    </main>

    <footer>
        <div class="progressBar mobileProgress">
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle currentCircle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
        </div>
    </footer>
</body>

</html>