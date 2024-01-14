document.addEventListener("DOMContentLoaded", function () {
    var SearchInput = document.getElementById("search");
    var categorieSearch = document.getElementById("categorieSearch");
    var searchResultContainer = document.getElementById("search_result");

    if (SearchInput) {
        SearchInput.addEventListener("keyup", function () {
            var input = SearchInput.value.trim();
            if (input !== "") {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "http://localhost:8000/wiki/searchWikisByTitle", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Clear previous results
                        searchResultContainer.innerHTML = "";
                        // Append the new search results
                        searchResultContainer.innerHTML += xhr.responseText;
                        searchResultContainer.style.display = "flex";
                    }
                };
                xhr.send("input=" + input);
            }
        });
    }

    if (categorieSearch) {
        categorieSearch.addEventListener("keyup", function () {
            var input = categorieSearch.value.trim();
            if (input !== "") {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "http://localhost:8000/wiki/searchWikisByCategorie", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Clear previous results
                        searchResultContainer.innerHTML = "";
                        // Append the new search results
                        searchResultContainer.innerHTML += xhr.responseText;
                        searchResultContainer.style.display = "flex";
                    }
                };
                xhr.send("input=" + input);
            }
        });
    }
});
