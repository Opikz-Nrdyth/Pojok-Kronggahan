const container_search = document.querySelector(".container-search");
const search = document.querySelector(".grup-input");
const searchInput = document.querySelector(".grup-input input");

const bars_menu = document.querySelector(".bars-menu");

document.addEventListener("DOMContentLoaded", function (event) {
    showSearch();
});

function showSearch() {
    if (container_search.style.display == "none") {
        container_search.style.display = "flex";
        search.setAttribute("style", "animation: search-show 0.3s both;");
        searchInput.focus();
    } else {
        search.setAttribute("style", "animation: search-hide 0.3s both;");
        setTimeout(() => {
            container_search.style.display = "none";
            search.setAttribute("style", "");
        }, 400);
    }
}

function showBars() {
    if (bars_menu.style.display == "none") {
        bars_menu.style.display = "flex";
    } else {
        bars_menu.style.display = "none";
    }
}
