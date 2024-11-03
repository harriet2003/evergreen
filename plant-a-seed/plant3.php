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
    <script src="../js/locations.js" defer></script>
    <script src="https://kit.fontawesome.com/2028364a6f.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="/images/illustrations/fern/svg">
</head>

<body class="plantSeedlingPage questionLayout">
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
        <form method="POST" id="plantSeedling3">

            <div>
                <h6 class="question">
                    Now just a little but about you, what is your name and where do you live? Don't worry, these
                    questions are optional if you don't feel like sharing.
                </h6>
                <input type="text" id="userName" name="userName" placeholder="What is your name? (optional)">

                <input list="cities" id="city-select" name="userLocation" placeholder="Where are you from? (optional)">

                <datalist id="cities">
                    <!-- Options will be populated here -->
                </datalist>
            </div>

            <div class="formButtons">
                <button type="button" id="prevBtn2" class="button">Back</button>
                <button type="submit" name="submitRest" class="button">Next</button>
            </div>

            <?php
            session_start();
            include '../connection.php';

            if (isset($_POST['submitRest'])) {

                // Check if userName or userLocation are empty and assign default values
                $userName = !empty($_POST['userName']) ? $_POST['userName'] : 'Anonymous';
                $userLocation = !empty($_POST['userLocation']) ? $_POST['userLocation'] : 'New Zealand';
                $userComment = $_SESSION['userComment'];
                $chosenSeedling = $_SESSION['chosenSeedling'];

                // Insert into the database
                $sql = "INSERT INTO user_seedling (chosenSeedling, userComment, userName, userLocation) VALUES ('$chosenSeedling', '$userComment', '$userName', '$userLocation')";
                $result = $mysqli->query($sql);

                if ($result == TRUE) {
                    // Store the values in session variables
                    $_SESSION['userName'] = $userName;
                    $_SESSION['userLocation'] = $userLocation;

                    // Redirect to the result page
                    header("refresh:0;url=plantResult.php");
                } else {
                    echo "Error!<br>";
                    echo $mysqli->error;
                }
            }
            ?>
        </form>

        <div class="progressBar desktopProgress">
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle currentCircle"></i>
            <i class="fa-solid fa-circle"></i>
        </div>
    </main>

    <footer>
        <div class="progressBar mobileProgress">
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle currentCircle"></i>
            <i class="fa-solid fa-circle"></i>
        </div>
    </footer>

    <script>
        document.getElementById("prevBtn2").addEventListener("click", function () {
            window.location.href = "../plant-a-seed/plant2.php";
        });
    </script>
</body>

</html>