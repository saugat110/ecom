// Get the current URL path
var path = window.location.pathname;
var fname = path.split('/').pop();

// Get all the anchor elements in the navbar
var navLinks = document.querySelectorAll("#navbar a");

// Loop through each anchor element
navLinks.forEach(function(link) {
    // Check if the href attribute matches the current path
    if (link.getAttribute("href") === fname) {
        // Add the 'bold-link' class to highlight the current link
        console.log(fname);
        link.classList.add("bold-link");
    }
});