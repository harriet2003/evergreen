const carousel = document.querySelector(".carousel");
const carouselItems = document.querySelectorAll(".carousel-item");
const prevBtn = document.querySelector(".prev-btn");
const nextBtn = document.querySelector(".next-btn");
const caption = document.querySelector(".carousel-caption");

const captions = ["Fern", "Pohutukawa", "Kōwhai", "Mānuka", "Rata", "Koru"]; // List of captions
let currentIndex = 0;

function updateCarousel() {
   const itemWidth = document.querySelector(".carousel-item").offsetWidth;
   carousel.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
   caption.textContent = captions[currentIndex]; // Update caption based on the current index
}

nextBtn.addEventListener("click", () => {
   if (currentIndex < carouselItems.length - 1) {
      currentIndex++;
   } else {
      currentIndex = 0;
   }
   updateCarousel();
});

prevBtn.addEventListener("click", () => {
   if (currentIndex > 0) {
      currentIndex--;
   } else {
      currentIndex = carouselItems.length - 1;
   }
   updateCarousel();
});

carouselItems.forEach((item, index) => {
   item.addEventListener("click", () => {
      document.getElementById("selectedImage").value = `image${index + 1}.jpg`;
      item.classList.add("selected");
      userSeedling = item.id;
      console.log(userSeedling);
      carouselItems.forEach((el, idx) => {
         if (idx !== index) el.classList.remove("selected");
      });
   });
});



