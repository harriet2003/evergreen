// Seedling info popup
function openSeedlingInfo() {
   document.getElementById("seedlingInfo").style.display = "unset";
}

function closeSeedlingInfo() {
   document.getElementById("seedlingInfo").style.display = "none";
}

document.addEventListener("DOMContentLoaded", () => {
   const carousel = document.querySelector(".carousel");
   const carouselItems = document.querySelectorAll(".carousel-item");
   const prevBtn = document.querySelector(".prev-btn");
   const nextBtn = document.querySelector(".next-btn");
   const caption = document.querySelector(".carousel-caption");

   const captions = ["Fern", "Pohutukawa", "Kōwhai", "Mānuka", "Rata", "Koru"];

   // Plant information to be displayed in the modal
   const plantInfo = [
      {
         title: "Fern",
         description:
            "A well known symbol of New Zealand, ferns are essential for preventing soil erosion with their strong root systems. Their lush fronds enhance the landscape and help stabilise the ground.",
      },
      {
         title: "Pohutukawa",
         description:
            'Known as the "New Zealand Christmas tree," the Pohutukawa bursts into vibrant red flowers each December. It’s not only visually striking but also provides important nectar for native birds, supporting the ecosystem.',
      },
      {
         title: "Kōwhai",
         description:
            "The Kōwhai tree, with its eye-catching yellow flowers, plays a key role in the environment by attracting bees and birds. This helps pollinate other plants and keeps the ecosystem healthy.",
      },
      {
         title: "Mānuka",
         description:
            "Famous for its medicinal honey, the Mānuka also benefits the environment by helping prevent soil erosion. Its hardy roots contribute to soil stability and overall land health.",
      },
      {
         title: "Rata",
         description:
            "The Rata tree, with its brilliant red blooms, is a vital part of New Zealand’s forests. It offers habitats for native wildlife and adds to the country’s rich natural beauty.",
      },
      {
         title: "Koru",
         description:
            "The Koru, the unfurling frond of the silver fern, symbolizes new beginnings and growth. Its spiral shape is a traditional Māori design, reflecting the continuous cycle of life and the environment.",
      },
   ];

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

   // Function to update modal content based on the current plant
   document.getElementById("openSeedling").addEventListener("click", () => {
      const plantTitle = document.getElementById("plantTitle");
      const plantDescription = document.getElementById("plantDescription");

      // Update the title and description in the modal based on the current plant
      plantTitle.textContent = plantInfo[currentIndex].title;
      plantDescription.textContent = plantInfo[currentIndex].description;
   });

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
