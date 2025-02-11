function searchBook() {
    var searchTerm = document.getElementById("search-input").value;
    // Make an AJAX request to book_search.php
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "book_search.php?q=" + searchTerm, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response from the server
            document.getElementById("results").innerHTML = xhr.responseText; 
        }
    };
    xhr.send();
}
