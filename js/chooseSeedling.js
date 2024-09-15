let currentSlide = 0; // Current slide index
let isPlantSelected = false; // Boolean to track if a plant has been selected
const slides = document.querySelectorAll(".carousel-slide");
const prevBtn = document.getElementById("prevSlide");
const nextBtn = document.getElementById("nextSlide");
const chosenSeedlingInput = document.getElementById("chosenSeedling");
const form = document.getElementById("plantSelectionForm");
const validationMessage = document.getElementById("validationMessage"); // Validation message element


// Function to show the slide and reset selection on navigation
function showSlide(index) {
   slides.forEach((slide, i) => {
      slide.classList.remove("active");
      if (i === index) {
         slide.classList.add("active");
      }
   });

   // When navigating, remove selected class and clear hidden input value
   slides.forEach((slide) => slide.classList.remove("selected")); // Remove selected from all slides
   chosenSeedlingInput.value = ""; // Clear the selected plant value on navigation
   isPlantSelected = false; // Reset the plant selection state
}

// Event listeners for the carousel navigation buttons
prevBtn.addEventListener("click", () => {
   if (currentSlide > 0) {
      currentSlide--;
      showSlide(currentSlide);
   }
});

nextBtn.addEventListener("click", () => {
   if (currentSlide < slides.length - 1) {
      currentSlide++;
      showSlide(currentSlide);
   }
});

// Function to handle plant selection
function selectPlant() {
   isPlantSelected = true; // Mark that a plant has been selected
   const plantName = slides[currentSlide].getAttribute("data-plant");
   chosenSeedlingInput.value = plantName; // Set hidden input value
   slides.forEach((slide) => slide.classList.remove("selected")); // Remove selected class from all slides
   slides[currentSlide].classList.add("selected"); // Add selected class to the current slide
   console.log(plantName);
}

// Allow selecting a plant by clicking on the image
slides.forEach((slide, index) => {
   slide.addEventListener("click", () => {
      currentSlide = index; // Update current slide index when clicked
      selectPlant(); // Call selectPlant to visually mark it
   });
});

// Initialize the first slide without selecting it automatically
showSlide(currentSlide);


// Handle form submission with validation
form.addEventListener("submit", function (event) {
   event.preventDefault(); // Prevent form submission for validation

   // Validate if a plant has been selected
   if (chosenSeedlingInput.value === "") {
      validationMessage.style.display = "block"; // Show the validation message
   } else {
      validationMessage.style.display = "none"; // Hide validation message
      console.log("Selected Plant:", chosenSeedlingInput.value);

      // If valid, allow the form to submit (or handle AJAX submission here)
      form.submit();
   }
});
