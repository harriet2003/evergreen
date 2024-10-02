/* SCROLL ANIMATION */
const observer = new IntersectionObserver((entries) => {
   entries.forEach((entry) => {
      console.log(entry);
      if (entry.isIntersecting) {
         entry.target.classList.add("show");
      }
   });
});
const hiddenElements = document.querySelectorAll(".hidden");
hiddenElements.forEach((el) => observer.observe(el));

/* FIXED NAVBAR ANIMATION */
let prevScrollpos = window.pageYOffset;
const navbar = document.querySelector(".fixedNav");

window.onscroll = function () {
   let currentScrollPos = window.pageYOffset;

   if (prevScrollpos > currentScrollPos) {
      navbar.style.top = "0";
   } else {
      navbar.style.top = "-70px";
   }

   prevScrollpos = currentScrollPos;
};

/* INTRO ARRAY */
const introSlides = [
   "New Zealand's environment is special. Having been isolated from the rest of the world for over 80 million years, unique nature and wildlife forms have evolved to create the Aotearoa we know today.",

   "These natural habitats foster biodiversity, improve water and soil quality and act as carbon sinks, absorbing carbon dioxide from the atmosphere.",

   "Since Europeans first settled here 200 years ago, we’ve seen terrifyingly rapid changes to our forests.  The consequences of long-overlooked climate destruction is starting to show.",

   "Our nature is important, not just in mitigating the impacts of climate change, but also for our physical and mental well-being. Our green spaces provide connection, memories and joy.",

   "Protecting and preserving Aotearoa’s the natural world has never been more crucial than now. We have the ability and responsibility to shape our future and create a better world, one seed at a time.",
];

// Initialize the current slide index
let currentSlideIndex = 0;

// Function to update the content displayed on the page
function updateContent() {
   const contentDiv = document.getElementById("content");
   contentDiv.textContent = introSlides[currentSlideIndex];
   updateProgressBar();

   // Handle visibility of final elements
   if (currentSlideIndex === introSlides.length - 1) {
      document.getElementById("nextArrow").style.display = "none";
      document.getElementById("skip").style.display = "none";
      document.getElementById("introButton").style.display = "block";
   } else {
      document.getElementById("nextArrow").style.display = "block";
      document.getElementById("skip").style.display = "block";
      document.getElementById("introButton").style.display = "none";
   }
}

// Function to update the progress bar
function updateProgressBar() {
   const circles = document.querySelectorAll("#progressBar1 i");
   circles.forEach((circle, index) => {
      if (index === currentSlideIndex) {
         circle.classList.add("active");
         circle.classList.remove("completed");
      } else if (index < currentSlideIndex) {
         circle.classList.add("completed");
         circle.classList.remove("active");
      } else {
         circle.classList.remove("completed", "active");
      }
   });
}

// Function to handle the button click event
function nextSlide() {
   if (currentSlideIndex < introSlides.length - 1) {
      // Increment the slide index and update content and progress bar
      currentSlideIndex++;
      updateContent();
   }
}

// Function to handle clicks on the progress bar circles
function handleCircleClick(event) {
   const clickedIndex = Array.from(event.currentTarget.parentElement.children).indexOf(event.target);
   if (clickedIndex !== -1 && clickedIndex !== currentSlideIndex) {
      currentSlideIndex = clickedIndex;
      updateContent();
   }
}

// Set up the initial content
updateContent();

// Add event listener to the button
const nextArrow = document.getElementById("nextArrow");
nextArrow.addEventListener("click", nextSlide);

// Add event listeners to each circle
const circles = document.querySelectorAll("#progressBar1 i");
circles.forEach((circle) => {
   circle.addEventListener("click", handleCircleClick);
});

/* CURTAIN MENU */
function openNav() {
   document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
   document.getElementById("myNav").style.width = "0%";
}
