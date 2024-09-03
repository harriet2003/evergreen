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

<body class="seedlingResult">
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
        <h5 class="capitalise">Your Seedling</h5>

        <div class="result">
            <div>
                <p class="selected-caption" id="plantName"></p>
                <img class="selected-image" alt="image of your seedling">
                <p id="plantName" style="opacity: 0;">Manuka</p>
            </div>
            <div>
                <p>What Nature Means To Me</p>
                <h6 id="outputUserComment"></h6>
                <p id="outputUserName"></p>
                <p id="outputUserLocation"></p>
            </div>
        </div>

        <div class="buttonOptions">
            <a href="../ourForest.php" class="button">Plant</a>
        </div>

    </main>

    <script>
        // Retrieve values from sessionStorage
        const userComment = sessionStorage.getItem("userComment");
        const userName = sessionStorage.getItem("userName");
        const userLocation = sessionStorage.getItem("userLocation");

        // Display the values
        document.getElementById("outputUserComment").textContent = userComment || 'Not provided';
        document.getElementById("outputUserName").textContent = userName || 'Not provided';
        document.getElementById("outputUserLocation").textContent = userLocation || 'Not provided';
    </script>
</body>

</html>