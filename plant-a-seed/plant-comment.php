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
        <h6>Nature can mean so many different things to all of us.
            Why do you love nature, what inspires you to protect our forest?</h6>

        <form>
            <input type="text" id="userComment" name="userComment" placeholder="type here" required>
        </form>

        <button class="button">Next</button>

        <div class="progressBar2">
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle currentCircle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
        </div>

    </main>
</body>

</html>