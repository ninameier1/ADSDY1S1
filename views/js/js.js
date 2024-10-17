function darkmode(){
    console.log("Dark mode activated");
    darkmenu()
    toggleBackground()
}

function darkmenu() {
    const elementsToFilter = document.querySelectorAll(".menulinks, .navlinks, .title");
    elementsToFilter.forEach(element => {
        element.classList.toggle("darkmode");
    });
}

let isDarkMode = false;
function toggleBackground(){
    const backgroundElement = document.getElementById("background");
    if (isDarkMode){
        backgroundElement.style.backgroundImage = 'url("./views/css/assets/bgwh.png")';
    } else {
        backgroundElement.style.backgroundImage = 'url("./views/css/assets/bgbl.png")';
    }
    isDarkMode = !isDarkMode;
}