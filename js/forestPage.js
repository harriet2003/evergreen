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
   document.getElementById("arrow").onclick = function () {
      window.location.href = "../plant-a-seed/plant1.php";
   };

   // Check if the button has been clicked in this session
   if (!sessionStorage.getItem("buttonClicked")) {
      // Show the arrow icon
      document.getElementById("arrow").style.opacity = "100%";
      document.getElementById("arrow").style.cursor = "pointer";
   }

   // Add event listener for button click
   document.getElementById("plantButton").addEventListener("click", function () {
      // Hide the arrow icon
      document.getElementById("arrow").style.opacity = "0%";

      // Set a flag in sessionStorage to indicate the button has been clicked
      sessionStorage.setItem("buttonClicked", "true");
   });
});
//HOVER RUSTLE SOUND
document.addEventListener("DOMContentLoaded", function () {
   const rustleAudio = document.getElementById("rustleAudio");

   // Play the rustling audio on hover
   window.playRustleAudio = function () {
      if (rustleAudio) {
         rustleAudio.play();
      }
   };

   // Stop the rustling audio on hover out
   window.stopRustleAudio = function () {
      if (rustleAudio) {
         rustleAudio.pause();
         rustleAudio.currentTime = 0; // Reset the audio to the start
      }
   };
});

//SUCCESS MODAL

document.addEventListener("DOMContentLoaded", function () {
   // Check if the modal should be shown
   if (showSuccessModal) {
      const modal = document.getElementById("successModal");
      modal.style.display = "block";

      // Close the modal when clicking the 'x' button
      document.getElementById("closeModal").onclick = function () {
         modal.style.display = "none";
      };

      // Close the modal when clicking anywhere outside of the modal content
      window.onclick = function (event) {
         if (event.target === modal) {
            modal.style.display = "none";
         }
      };
   }
});
