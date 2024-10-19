function darkmode(){
    console.log("Dark mode activated");
    darkmenu()
    toggleBackground()
}

function darkmenu(){
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

function toggleEditForm(projectId){
    const editForm = document.getElementById("edit-form-" + projectId);
    if (editForm.style.display === "none" || editForm.style.display === ""){
        editForm.style.display = "block";
    } else {
        editForm.style.display = "none";
    }
}