<?php
session_start();

include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if chosenSeedling is set and not empty
    if (isset($_POST['chosenSeedling']) && !empty($_POST['chosenSeedling'])) {
        // Store the chosen seedling in the session instead of the database
        $_SESSION['chosenSeedling'] = $_POST['chosenSeedling'];

        header("refresh:0;url=plant2.php");
        exit();
    } else {
        echo "No seedling was selected.";
    }
}
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
    <script src="../js/script.js" defer></script>
    <script src="../js/chooseSeedling.js" defer></script>
    <script src="https://kit.fontawesome.com/2028364a6f.js" crossorigin="anonymous"></script>
</head>

<body class="plantSeedlingPage chooseSeedling">
    <header>
        <nav class="desktopNav">
            <a href="../ourForest.php" class="navTitle">Evergreen</a>
            <div>
                <a href="../ourForest.php">Our Forest</a>
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
                <a href="../about.html">Our Purpose</a>
            </div>
        </div>
    </header>

    <main>
        <h5 class="capitalise">Select a Seedling</h5>

        <div class="carousel-container">
            <form id="plantSelectionForm" method="POST">
                <div class="carousel">
                    <!-- Navigation buttons -->
                    <div class="carousel-navigation">
                        <button type="button" id="prevSlide"><i class="fa-solid fa-arrow-left"></i></button>
                    </div>

                    <div class="carousel-slide" data-plant="Fern">
                        <img src="../images/illustrations/fern.svg" alt="image of fern seedling">
                        <p>Fern</p>
                    </div>

                    <div class="carousel-slide" data-plant="Pohutukawa">
                        <img src="../images/illustrations/pohutakawa.svg" alt="image of pohutukawa seedling">
                        <p>Pohutukawa</p>
                    </div>

                    <div class="carousel-slide" data-plant="Kōwhai">
                        <img src="../images/illustrations/kowhai.svg" alt="image of kowhai seedling">
                        <p>Kōwhai</p>
                    </div>

                    <div class="carousel-slide" data-plant="Mānuka">
                        <img src="../images/illustrations/manuka.svg" alt="image of manuka seedling">
                        <p>Mānuka</p>
                    </div>

                    <div class="carousel-slide" data-plant="Rata">
                        <img src="../images/illustrations/rata.svg" alt="image of rata seedling">
                        <p>Rata</p>
                    </div>

                    <div class="carousel-slide" data-plant="Koru">
                        <img src="../images/illustrations/koru.svg" alt="image of koru seedling">
                        <p>Koru</p>
                    </div>

                    <!-- Navigation buttons -->
                    <div class="carousel-navigation">
                        <button type="button" id="nextSlide"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>

                <!--Fact Popup Button -->
                <p id="learnMoreBtn">Learn More</p>


                <!-- Hidden input to store the selected plant -->
                <input type="hidden" id="chosenSeedling" name="chosenSeedling" value="">

                <!-- Submit button -->
                <div class="carousel-submit">
                    <button type="submit" name="seedlingSubmit" class="button">Submit</button>
                    <!-- Validation message (hidden initially) -->
                    <p id="validationMessage" style="color:red; display:none;">Please select a plant before submitting.
                    </p>
                </div>
            </form>

            <!-- Plant info modal -->
            <div id="plantModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h4 id="modalPlantName"></h4>
                    <p id="modalPlantFacts"></p>
                </div>
            </div>

            <!--Plant info modal script-->
            <script>
                // Plant facts (you can expand this with more facts)
                const plantFacts = {
                    "Fern": "A well known symbol of New Zealand, ferns are essential for preventing soil erosion with their strong root systems. Their lush fronds enhance the landscape and help stabilise the ground.",
                    "Pohutukawa": 'Known as the "New Zealand Christmas tree," the Pohutukawa bursts into vibrant red flowers each December. It’s not only visually striking but also provides important nectar for native birds, supporting the ecosystem.',
                    "Kōwhai": "The Kōwhai tree, with its eye-catching yellow flowers, plays a key role in the environment by attracting bees and birds. This helps pollinate other plants and keeps the ecosystem healthy.",
                    "Mānuka": "Famous for its medicinal honey, the Mānuka also benefits the environment by helping prevent soil erosion. Its hardy roots contribute to soil stability and overall land health.",
                    "Rata": "The Rata tree, with its brilliant red blooms, is a vital part of New Zealand’s forests. It offers habitats for native wildlife and adds to the country’s rich natural beauty.",
                    "Koru": "The Koru, the unfurling frond of the silver fern, symbolizes new beginnings and growth. Its spiral shape is a traditional Māori design, reflecting the continuous cycle of life and the environment."
                };

                // Function to show the modal
                function showModal(plantName) {
                    const modal = document.getElementById('plantModal');
                    const modalPlantName = document.getElementById('modalPlantName');
                    const modalPlantFacts = document.getElementById('modalPlantFacts');

                    // Update modal content with the current plant name and facts
                    modalPlantName.textContent = plantName;
                    modalPlantFacts.textContent = plantFacts[plantName];

                    // Display the modal
                    modal.style.display = "block";
                }

                // Close the modal when the user clicks the "X"
                document.querySelector('.close').onclick = function () {
                    document.getElementById('plantModal').style.display = "none";
                };

                // Close the modal when the user clicks outside of the modal
                window.onclick = function (event) {
                    const modal = document.getElementById('plantModal');
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                };

                // Function to show the modal when the user clicks the "Learn More" button
                document.getElementById('learnMoreBtn').onclick = function () {
                    const currentSlide = document.querySelector('.carousel-slide.active'); // Assuming "active" class marks the current slide
                    const plantName = currentSlide.getAttribute('data-plant'); // Get plant name from data-plant attribute
                    showModal(plantName);
                };
            </script>
        </div>

        <div class="progressBar desktopProgress">
            <i class="fa-solid fa-circle currentCircle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
        </div>
    </main>

    <footer>
        <div class="progressBar mobileProgress">
            <i class="fa-solid fa-circle currentCircle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
            <i class="fa-solid fa-circle"></i>
        </div>
    </footer>
</body>

</html>