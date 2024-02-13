<!--Footer Section Start-->
<div class="bg_dark px-5 py-5 text-white">

    <h3 class="fw-bolder mb-5"> CONTACT US</h3>
    <table class="table text-white">
        <tr>
            <td>
                Reach Us At
            </td>
            <td>
                <h6 class="text_org">support@fixmycycle.com</h6>
            </td>
        </tr>
        <tr>
            <td>
                Contact Number
            </td>
            <td>
                <h6 class="text_org">+358 XX XX XXX</h6>
            </td>
        </tr>
        <tr>
            <td>
                Connect With Us
            </td>
            <td>
                <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-2x fa-facebook"></i></a>
                <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-2x fa-twitter"></i></a>
                <a href="https://www.youtube.com/" target="_blank"><i class="fa-brands fa-2x fa-youtube"></i></a>
                <a href="https://www.instagram.com/" target="_blank"> <i class="fa-brands fa-2x fa-instagram"></i></a>
            </td>
        </tr>
    </table>
    <center>
        <hr>

        <span class="text-white"><em>@2024 FixMyCycle. All Rights Reserved.</em></span>
    </center>

</div>
<!-- Bootstrap Javascript -->
<script src="bootstrap/js/bootstrap.min.js"></script>
     <script src="css/rochan.js"></script> 


     <script>
        function validateForm() {
            debugger
            var email = document.getElementById("txtEmail").value;
            var password = document.getElementById("txtPassword").value;


            if (!email.includes("@")) {
                document.getElementById("emailError").innerHTML = "Please enter a valid email address.";
                return false;
            }
            else if (password.length > 12 || password.length < 6) {
                document.getElementById("passwordError").innerHTML = "Password must be between 6-12 characters only.";

                
                return false;
            } else {
                document.loginForm.submit();
                return true;
            }
        }

</script>
<script>
    var currentPage = "<?php echo basename($_SERVER['PHP_SELF']); ?>";
    var navLinks = document.querySelectorAll('.navbar-nav .nav-link');

    for (var i = 0; i < navLinks.length; i++) {
        var link = navLinks[i];
        var linkHref = link.getAttribute('href');

        if (linkHref === currentPage) {
            link.classList.add('active');
            break; // Once found, no need to continue loop
        }
    }
</script>
</body>
</html>