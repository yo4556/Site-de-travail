const hamburger = document.getElementById("hamburger");
const navMenu = document.getElementById("nav-menu");
const navContainer = document.querySelector(".nav-container");
hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
    navContainer.classList.toggle("menu-open");
});
document.querySelectorAll(".nav-link").forEach(link => {
    link.addEventListener("click", () => {
        hamburger.classList.remove("active");
        navMenu.classList.remove("active");
        navContainer.classList.remove("menu-open");
    });
});