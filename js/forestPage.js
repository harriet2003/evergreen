/* Modal Popup Check */
document.addEventListener("DOMContentLoaded", function () {
   // Check if the modal has been shown before
   if (!sessionStorage.getItem("modalShown")) {
      // Show the modal
      document.getElementById("helpPopup").style.opacity = "100%";

      // Set a flag in sessionStorage to indicate the modal has been shown
      sessionStorage.setItem("modalShown", "true");
   }
});

function openHelpPopup() {
   document.getElementById("helpPopup").style.opacity = "100%";
}

function closeHelpPopup() {
   document.getElementById("helpPopup").style.opacity = "0%";
   document.getElementById("arrow").style.opacity = "100%";
}

/* Plant+ Click Check */
document.addEventListener("DOMContentLoaded", function () {
   // Check if the button has been clicked in this session
   if (!sessionStorage.getItem("buttonClicked")) {
      // Show the arrow icon
      document.getElementById("arrow").style.opacity = "100%";
   }

   // Add event listener for button click
   document.getElementById("plantButton").addEventListener("click", function () {
      // Hide the arrow icon
      document.getElementById("arrow").style.opacity = "0%";

      // Set a flag in sessionStorage to indicate the button has been clicked
      sessionStorage.setItem("buttonClicked", "true");
   });
});

/* RANDOM FOREST
const svgFiles = [
   "./images/Illustrations/fern.svg",
   "./images/Illustrations/koru.svg",
   "./images/Illustrations/kowhai.svg",
   "./images/Illustrations/manuka.svg",
   "./images/Illustrations/pohutakawa.svg",
   "./images/Illustrations/rata.svg",
];

const container = document.getElementById("forest");
const numImages = 20; // Number of images to place on the background

function getRandomSize() {
   return Math.random() * 100 + 50; // Random size between 50px and 150px
}

function getRandomPosition(max) {
   return Math.random() * max; // Random position within the container
}

function createBackgroundElement(src) {
   const div = document.createElement("div");
   div.classList.add("background-image");
   div.style.backgroundImage = `url(${src})`;
   div.style.width = `${getRandomSize()}px`;
   div.style.height = `${getRandomSize()}px`;
   div.style.position = "absolute";
   div.style.top = `${getRandomPosition(window.innerHeight)}px`;
   div.style.left = `${getRandomPosition(window.innerWidth)}px`;
   return div;
}

function populateBackground() {
   for (let i = 0; i < numImages; i++) {
      const randomIndex = Math.floor(Math.random() * svgFiles.length);
      const bgElement = createBackgroundElement(svgFiles[randomIndex]);
      container.appendChild(bgElement);
   }
}

window.onload = populateBackground;*/
