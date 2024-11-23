let links = document.querySelectorAll("nav li");
const hiddenLinks = document.getElementById("hidden-links");

function showLinks() {
    if (hiddenLinks.style.display == "block") {
        hiddenLinks.classList.remove("show");
        hiddenLinks.classList.add("remove");
        setTimeout(() => {
            hiddenLinks.style.display = "none";
        }, 900);
    } else {
        hiddenLinks.style.display = "block";
        hiddenLinks.classList.add("show");
        hiddenLinks.classList.remove("remove");
    }
}
