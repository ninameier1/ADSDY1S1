// Function to toggle the visibility of the edit form for a specific project
function toggleEditForm(projectId){
    console.log(projectId); // Log the projectId to the console
    // Get the edit form element based on the projectId
    const editForm = document.getElementById("edit-form-" + projectId);
    // Check if the edit form is currently not displayed (either 'none' or an empty string)
    if (editForm.style.display === "none" || editForm.style.display === ""){
        editForm.style.display = "block"; // Set the display style to 'block' to show the form
    } else {
        editForm.style.display = "none"; // Set the display style to 'none' to hide the form
    }
}

// Initialize isDarkMode based on localStorage
let isDarkMode = localStorage.getItem('isDarkMode') === 'true';

// Function to activate dark mode and update the localStorage
function darkmode() {
    console.log("Dark mode activated");
    darkmenu();             // Apply dark mode styles
    toggleBackground();     // Set background
    toggleButtonImage();    // Set button image
    // Store the current dark mode state in localStorage
    localStorage.setItem('isDarkMode', isDarkMode);
}

// Function to toggle dark mode styles on menu items
function darkmenu() {
    const elementsToFilter = document.querySelectorAll(".menulinks, .navlinks, .title, .contacttitle, .ptitle, .pdesc, .text");
    elementsToFilter.forEach(element => {
        element.classList.toggle("darkmode", isDarkMode); // Apply class based on current state
    });
}

// Function to toggle background based on dark mode state
function toggleBackground() {
    const backgroundElement = document.getElementById("background");
    backgroundElement.style.backgroundImage = isDarkMode
        ? 'url("/views/css/assets/bgbl.png")'
        : 'url("/views/css/assets/bgwh.png")';
}

// Function to toggle button image based on dark mode state
function toggleButtonImage() {
    const buttonImage = document.querySelector("#darkbutton .bimg");
    buttonImage.src = isDarkMode
        ? "/views/css/assets/darkmode.png"
        : "/views/css/assets/lightmode.png";
}

// Function to apply dark mode on page load
function applyDarkModeOnLoad() {
    // Apply the initial state based on localStorage
    darkmode(); // Call darkmode to set styles based on stored preference
}

// Call darkmode function on page load
document.addEventListener("DOMContentLoaded", applyDarkModeOnLoad);

// Add an event listener to the button to toggle dark mode
document.querySelector("#darkbutton").addEventListener("click", () => {
    isDarkMode = !isDarkMode; // Toggle the dark mode state
    darkmode(); // Call darkmode to apply the changes
})
