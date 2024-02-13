// Script 1
let currentPage = 1;
const totalPages = 3;

function showPage(page) {
    currentPage = Math.max(1, Math.min(totalPages, page)); // Ensure page is within bounds
    for (let i = 1; i <= totalPages; i++) {
        document.getElementById('page' + i).style.display = (i === currentPage) ? 'inline-flex' : 'none';
    }
    updatePaginationButtons();
}

function updatePaginationButtons() {
    document.getElementById('prevBtn').disabled = currentPage === 1;
    document.getElementById('nextBtn').disabled = currentPage === totalPages;
}

showPage(1);

// Script 2
// function toggleDivs() {
//     debugger;
//     event.preventDefault();
//     var div1 = document.getElementById('Form1');
//     var div2 = document.getElementById('Form2');

//     if (div1.style.display !== 'none') {
//         div1.style.display = 'none';
//         div2.style.display = 'contents';
//     } else {
//         div1.style.display = 'contents';
//         div2.style.display = 'none';
//     }
// }

// You can include more scripts if needed

//Script 3 for Navbar
var currentNavPage = "<?php echo basename($_SERVER['PHP_SELF']); ?>";
var navLinks = document.querySelectorAll('.navbar-nav .nav-link');

for (var i = 0; i < navLinks.length; i++) {
    var link = navLinks[i];
    var linkHref = link.getAttribute('href');

    if (linkHref === currentNavPage) {
        link.classList.add('active');
        break; // Once found, no need to continue loop
    }
}