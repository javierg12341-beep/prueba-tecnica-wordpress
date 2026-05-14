
document.addEventListener("DOMContentLoaded", function () {

    const btn = document.getElementById("button-menu");
    const menu = document.querySelector(".menu-container");

    if (!btn || !menu) return;

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });

});