<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fix My Cycle</title>
    <link rel="icon" href="img/logo_fav.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.1-web/css/all.min.css">
    <link href="css/general.css" rel="stylesheet">
    <link href="css/rochan.css" rel="stylesheet">
    <link href="css/keya.css" rel="stylesheet">
    <link href="css/neeru.css" rel="stylesheet">
    <link href="css/mudathir.css" rel="stylesheet">
    <style>
.hidden{
    display: none;
}
    </style>
</head>

<body>

    <!--Navigation and Header Section Start-->
    <nav class="navbar navbar-expand-lg bg_light_blue">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/Logo.png" class="nav-logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">SERVICES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service_booking.php">SERVICE BOOKING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tutorials.php">TUTORIALS</a>
                    </li>
                    <li class="nav-item">
                        <button class="buttonOrg">LOGIN</button>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!--Header Images-->
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/carousel_img_1.jpg" class="d-block w-100 caro_img" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/carousel_img_2.jpg" class="d-block w-100 caro_img" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/carousel_img_3.jpg" class="d-block w-100 caro_img" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/carousel_img_4.jpg" class="d-block w-100 caro_img" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

        <!-- Overlay Content -->
        <div class="d-block overlay">
            <h6 class="font-size-xsmal">YOU AND YOUR CYCLE DESERVE BETTER</h3>
                <h1 class="text_title font-size-large">Byscle <span class="text_org">Service</span> At<span
                        class="text_org">
                        Home</span></h1>

                <button class="buttonOrg2 font-size-xsmall-unset">IF YOU NEED, WE HERE</button>
        </div>
        <a href="service_booking.html"><button class="ovrl_btn custom-position">Book Service</button></a>
    </div>

    <!--Navigation and Header Section 1 End-->

    <!-- Bootstrap Javascript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="css/rochan.js"></script>
</body>

</html>