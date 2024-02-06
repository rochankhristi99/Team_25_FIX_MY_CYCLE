<?php
include 'header.php';
?>

<!--Main Content Section Start-->
<div class="body_sec text-center">
    <h1 class="text_title">Why<span class="text_org"> Choose</span> Us</h1>

    <div class="row">
        <div class="col-lg-6 col-md-12 pt-5">
            <img src="img/cycle_repair.png" class="img-fluid w-75" />
        </div>
        <div class="col-lg-6 col-md-12">
            <p class="pt-5 text-start lh-lg pick_your_color">
                Our online cycle repair platform is here to make life simpler for bicycle owners, especially
                those living in colder places like Finland. Instead of dealing with harsh weather to get to a
                repair shop, You can easily book repair services from the comfort of their homes. The platform
                comes with a helping users find nearby repair centers. In extreme weather conditions, our users
                also have the option to have a service person come directly to their homes.
            </p>
        </div>
    </div>

    <img src="img/22728.jpg" class="w-75 img_bld" />
</div>
<!--Main Content Section End-->


<!--Our Services Section Start-->
<div class="bg_dark pt-3 px-3 pb-3 py-3 text-center ">
    <h1 class="text-white fw-bolder mt-4">Our Services</h1>

    <div class="row mb-4">
        <div class="col-lg-4 col-4">
            <img src="img/doorstep_icon.png" class="w-50" /><br><br>
            <span class="text-white mt-4 pick_your_color">Door Step Service @ Home</span>
        </div>
        <div class="col-lg-4 col-4 pt-md-3">
            <img src="img/ServiceSt_icon.png" class="w-50" /><br><br>
            <span class="text-white mt-4 pick_your_color">Advanced service @ our Station</span>
        </div>
        <div class="col-lg-4 col-4">
            <img src="img/pickdrop.png" class="w-75 pt-md-4" /><br><br>
            <span class="text-white mt-4 pick_your_color">Pick Up and Drop Service</span>
        </div>
    </div>
</div>
<!--Our Services Section End-->

<!--Testimonials  Section Start-->
<div class="body_sec2">
    <span class="text-center">
        <h1 class="text_title">What<span class="text_org"> Our</span> Clients <span class="text_org">Says</span>
        </h1>
    </span>
    <div class="row justify-content-center mt-5">
        <div id="clientCarousel" class="col-lg-12 pt-5 pb-5 px-5 rounded-pill bg-white w-75 carousel slide"
            data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <h4 class="text_org">Samantha Smith</h4><br>
                    <p>
                        Fix My Cycle absolutely loved the ease with which cycles got serviced. On time arrival
                        and they ensured that our cycles are brand new again! Will recommend:)
                    </p>
                </div>
                <div class="carousel-item">
                    <h4 class="text_org">Emma Johnson</h4><br>
                    <p>
                        Great service! My bike was fixed promptly, and the team at Fix My Cycle did an excellent
                        job. Highly satisfied with their professionalism.
                    </p>
                </div>
                <div class="carousel-item">
                    <h4 class="text_org">John Doe</h4><br>
                    <p>
                        Fast and reliable bike repair service. The technicians were skilled, and my bike feels
                        as good as new. I'll definitely use their services again.
                    </p>
                </div>

            </div>

            <span class="w-100">
                <div class="d-flex justify-content-between">
                    <button class="carousel-control-prev_1" type="button" data-bs-target="#clientCarousel"
                        data-bs-slide="prev">
                        <i class="fa-solid fa-arrow-left text_org"></i>
                    </button>
                    <button class="carousel-control-next_1" type="button" data-bs-target="#clientCarousel"
                        data-bs-slide="next">
                        <i class="fa-solid fa-arrow-right text_org"></i>
                    </button>
                </div>
            </span>
        </div>
    </div>
    <!--Testimonials Section End-->

    <!--FAQ Section End-->
    <div class="container mt-5 w-75 ">
        <span class="text-center">
            <h1 class="text_title">FAQ<span class="text_org"> ?</span></h1>
        </span>

        <div class="accordion" id="faqAccordion">

            <!-- Question 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <span class="fw-bold">What are the visiting charges?</span>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        The visiting charge is 10 euros.
                    </div>
                </div>
            </div>

            <!-- Question 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <span class="fw-bold">Can I book a service?</span>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, you can book our services. Please follow the booking process on our website or
                        contact our customer service.
                    </div>
                </div>
            </div>

            <!-- Question 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <span class="fw-bold">How can I login?</span>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        You can log in by visiting our website and clicking on the "Login" button. Enter your
                        credentials to access your account.
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--FAQ Section End-->
</div>
<?php
include 'footer.php';
?>