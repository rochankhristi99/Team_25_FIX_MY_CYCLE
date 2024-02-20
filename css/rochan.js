// Script 1
// let currentPage = 1;
// const totalPages = 3;

// function showPage(page) {
//     currentPage = Math.max(1, Math.min(totalPages, page)); // Ensure page is within bounds
//     for (let i = 1; i <= totalPages; i++) {
//         document.getElementById('page' + i).style.display = (i === currentPage) ? 'inline-flex' : 'none';
//     }
//     updatePaginationButtons();
// }

// function updatePaginationButtons() {
//     document.getElementById('prevBtn').disabled = currentPage === 1;
//     document.getElementById('nextBtn').disabled = currentPage === totalPages;
// }

// showPage(1);

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

function myFunction() {
    debugger
    // Get the value of the input field with id="numb"
    let x = document.getElementsByClassName("valid").value;
    // If x is Not a Number or less than one or greater than 10
    let text;
    if (isNaN(x) || x < 1 || x > 10) {
      text = "Input not valid";
    } else {
      text = "Input OK";
    }
    document.getElementById("demo").innerHTML = text;
  }

  //Script 4 Toggle Eye Icon
  function togglePasswordVisibility() {
    var inputs = document.getElementsByClassName("password");
    var eyeIcons = document.getElementsByClassName("eyeIcon");

    // Loop through all input fields with the "password" class
    for (var i = 0; i < inputs.length; i++) {
        var input = inputs[i];
        var eyeIcon = eyeIcons[i];

        // Toggle password visibility for the current input field
        if (input.type === "password") {
            input.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }
}

function togglePasswordVisibility2() {
  var inputs = document.getElementsByClassName("password2");
  var eyeIcons = document.getElementsByClassName("eyeIcon");

  // Loop through all input fields with the "password" class
  for (var i = 0; i < inputs.length; i++) {
      var input = inputs[i];
      var eyeIcon = eyeIcons[i];

      // Toggle password visibility for the current input field
      if (input.type === "password") {
          input.type = "text";
          eyeIcon.classList.remove("fa-eye");
          eyeIcon.classList.add("fa-eye-slash");
      } else {
          input.type = "password";
          eyeIcon.classList.remove("fa-eye-slash");
          eyeIcon.classList.add("fa-eye");
      }
  }
}