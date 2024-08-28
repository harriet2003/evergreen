/* document.addEventListener("DOMContentLoaded", function() {
    alert("JavaScript is running!"); // This should show an alert when the page loads
    console.log("JavaScript is working!"); // This should appear in the browser's console
 
    const container = document.getElementById('forest');
    
    const testImage = document.createElement('img');
    testImage.src = './images/illustrations/fern.svg'; // Adjust the path if necessary
    testImage.style.position = 'absolute';
    testImage.style.width = '100px';
    testImage.style.height = 'auto';
    testImage.style.top = '50px';
    testImage.style.left = '50px';
 
    container.appendChild(testImage);
 }); */

 /* RANDOM FOREST */
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

window.onload = populateBackground;