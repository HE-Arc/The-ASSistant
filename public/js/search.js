let searchBar = null;

function clearSearch() {
    searchBar.value = "";
}

window.addEventListener("DOMContentLoaded", (event) => {
    searchBar = document.getElementsByName("search")[0];
    console.log(searchBar);
});
