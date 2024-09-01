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
        <form>
            <fieldset>
                <h6 class="question">
                    Nature can mean so many different things to all of us.
                    Why do you love nature, what inspires you to protect our forest?
                </h6>
                <input type="text" id="userComment" name="userComment" placeholder="type here" required>
            </fieldset>
        </form>

        <div class="progressBar desktopProgress">
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle currentCircle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
        </div>
    </main>

    <footer>
        <a href="plant3.php" class="button">Next</a>
        <div class="progressBar mobileProgress">
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle currentCircle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
        </div>
    </footer>
</body>

</html>