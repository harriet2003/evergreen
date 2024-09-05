document.addEventListener("DOMContentLoaded", () => {
   const carousel = document.querySelector(".carousel");
   const carouselItems = document.querySelectorAll(".carousel-item");
   const prevBtn = document.querySelector(".prev-btn");
   const nextBtn = document.querySelector(".next-btn");
   const caption = document.querySelector(".carousel-caption");

   const captions = ["Fern", "Pohutukawa", "Kōwhai", "Mānuka", "Rata", "Koru"];
   let currentIndex = 0;

   // Only run carousel controls if the buttons exist
   if (prevBtn && nextBtn) {
      prevBtn.addEventListener("click", () => {
         if (currentIndex > 0) {
            currentIndex--;
         } else {
            currentIndex = carouselItems.length - 1;
         }
         updateCarousel();
      });

      nextBtn.addEventListener("click", () => {
         if (currentIndex < carouselItems.length - 1) {
            currentIndex++;
         } else {
            currentIndex = 0;
         }
         updateCarousel();
      });
   }

   // Update carousel function
   function updateCarousel() {
      const itemWidth = document.querySelector(".carousel-item").offsetWidth;
      carousel.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
      if (caption) {
         caption.textContent = captions[currentIndex];
      }
   }

   // Store selected image and caption
   carouselItems.forEach((item, index) => {
      item.addEventListener("click", () => {
         const selectedImageSrc = item.querySelector("img").src;
         sessionStorage.setItem("selectedImage", selectedImageSrc);
         sessionStorage.setItem("selectedCaption", captions[index]);

         item.classList.add("selected");
         carouselItems.forEach((el, idx) => {
            if (idx !== index) el.classList.remove("selected");
         });

         console.log("Selected Image:", selectedImageSrc);
         console.log("Selected Caption:", captions[index]);
      });
   });

   // Load selected image and caption on the new page
   const selectedImageSrc = sessionStorage.getItem("selectedImage");
   const selectedCaption = sessionStorage.getItem("selectedCaption");

   if (selectedImageSrc) {
      const imgElement = document.querySelector(".selected-image");
      const captionElement = document.querySelector(".selected-caption");

      if (imgElement) {
         imgElement.src = selectedImageSrc;
      }
      if (captionElement) {
         captionElement.textContent = selectedCaption;
      }

      console.log("Selected Image:", selectedImageSrc);
      console.log("Selected Caption:", selectedCaption);
   }
});



