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
        <form method="POST" id="plantSeedling2">

            <div class="formInput">
                <h6 class="question">
                    Nature can mean so many different things to all of us.
                    Why do you love nature, what inspires you to protect our forest?
                </h6>
                <p class="exampleText">Taking your dog for walks around the park, annual tramps with your best mates,
                    summer picnics under the shade of trees</p>
                <input type="text" id="userComment" name="userComment" placeholder="type here" required>
            </div>


            <div class="formButtons">
                <button type="button" id="prevBtn1" class="button secondaryButton">Back</button>
                <button type="submit" name="submitComment" id="nextBtn1" class="button">Next</button>
            </div>

            <p id="validationMessage2" style="color:#ff5c00; display:none; padding-bottom: 2rem;">Please fill out the
                comment</p>

            <?php
            include '../connection.php';

            if (isset($_POST['submitComment'])) {
                $userComment = $_POST['userComment'];

                //$sql = "INSERT INTO user_seedling (userComment, userName, userLocation) VALUES ('$userComment', '', '')";
                //$result = $mysqli->query($sql);
            
                //if ($result == TRUE) {
                $_SESSION['userComment'] = $userComment;
                header("refresh:0;url=plant3.php");
                //} else {
                //  echo "Error!<br>";
                // echo $mysqli->error;
                // }
            }
            ?>
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

    <script>
        document.getElementById("nextBtn1").addEventListener("click", function (event) {
            var userComment = document.getElementById("userComment").value;
            if (userComment.trim() === "") {
                document.getElementById("validationMessage2").style.display = "block";
                event.preventDefault();  // Prevent form submission
            }
        });

        document.getElementById("prevBtn1").addEventListener("click", function () {
            window.location.href = "../plant-a-seed/plant1.php";
        });
    </script>
</body>

</html>