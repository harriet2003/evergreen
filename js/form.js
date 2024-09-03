/* FORM */
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

// Goes back to seedling selection page
document.getElementById("prevBtn1").addEventListener("click", function () {
   window.location.href = "../plant-a-seed/plant1.php";
});

function showTab(n) {
   // This function will display the specified tab of the form ...
   var x = document.getElementsByClassName("tab");
   x[n].style.display = "block";
   // ... and fix the Previous/Next buttons:
   if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
      document.getElementById("prevBtn1").style.display = "block";
      document.getElementById("seedQestion2").style.color = "#fe9a66";
      document.getElementById("seedQestion3").style.color = "#F7F7F7";
   } else {
      document.getElementById("prevBtn").style.display = "inline";
   }
   if (n == x.length - 1) {
      document.getElementById("nextBtn").innerHTML = "Submit";
      document.getElementById("prevBtn1").style.display = "none";
      document.getElementById("seedQestion2").style.color = "#F7F7F7";
      document.getElementById("seedQestion3").style.color = "#fe9a66";
   } else {
      document.getElementById("nextBtn").innerHTML = "Next";
   }
}

function nextPrev(n) {
   var x = document.getElementsByClassName("tab");

   if (n == 1 && !validateForm()) return false;

   x[currentTab].style.display = "none";

   currentTab += n;

   if (currentTab >= x.length) {
      // Store values in sessionStorage
      const userComment = document.getElementById("userComment").value;
      const userName = document.getElementById("userName").value;
      const userLocation = document.getElementById("city-select").value;

      sessionStorage.setItem("userComment", userComment);
      sessionStorage.setItem("userName", userName);
      sessionStorage.setItem("userLocation", userLocation);

      // Redirect to the other page
      window.location.href = "../plant-a-seed/plantResult.php";
      return false;
   }

   showTab(currentTab);
}

function validateForm() {
   // This function deals with validation of the form fields
   var x,
      y,
      i,
      valid = true;
   x = document.getElementsByClassName("tab");
   y = x[currentTab].getElementsByTagName("input");
   // A loop that checks every input field in the current tab:
   for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value == "") {
         // add an "invalid" class to the field:
         y[i].className += " invalid";
         // and set the current valid status to false:
         valid = false;
      }
   }
   return valid; // return the valid status
}
