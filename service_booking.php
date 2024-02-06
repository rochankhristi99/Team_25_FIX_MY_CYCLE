<?php
include 'header.php';
?>
<!--Main Content Section Start-->
<div class="body_sec">

    <h1 class="text_title mb-5 text-center">Service<span class="text_org"> Booking</span></h1>

    <div class="row">
        <div class="col-lg-3">

        </div>
        <div class="col-lg-6">
            <form class="row g-3">
                <div id="Form1">
                    <div class="col-12">
                        <label for="inputAddress" class="f-label">Date*</label>
                        <input type="date" class="f-input" id="inputAddress" placeholder="DD/MM/YYYY">
                    </div>


                    <div class="col-md-12">
                        <label for="inputState" class="f-label">Time*</label>
                        <select id="inputState" class="f-input">
                            <option selected>Choose...</option>
                            <option>10:00 - 12:00</option>
                            <option>12:00 - 14:00</option>
                            <option>14:00 - 16:00</option>
                            <option>16:00 - 18:00</option>
                        </select>
                    </div>

                    <div class="col-12 mb-5">
                        <center>
                            <button type="submit" onclick="toggleDivs()"
                                class="btn btn-primary btn-lg w-50 ">Continue</button>
                        </center>
                    </div>
                </div>

                <div id="Form2" class="hidden">
                    <div class="col-md-12">
                        <label for="inputEmail4" class="f-label">SERVICE TYPE*</label>
                        <fieldset class="row mb-3">

                            <div class="col-sm-12">
                                <div class="form-check f-input">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                        value="option1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        Door Step Service
                                    </label>
                                </div>
                                <div class="form-check f-input">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2"
                                        value="option2">
                                    <label class="form-check-label" for="gridRadios2">
                                        Advanced Service
                                    </label>
                                </div>
                                <div class="form-check f-input">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3"
                                        value="option3">
                                    <label class="form-check-label" for="gridRadios3">
                                        Pick and Drop
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                    </div>


                    <div class="col-md-6">
                        <label for="inputEmail4" class="f-label">FULL NAME*</label>
                        <input type="text" class="f-input" placeholder="First Name" id="inputEmail4">
                    </div>

                    <div class="col-md-6">
                        <label for="inputEmail4" class="f-label"><br></label>
                        <input type="text" class="f-input" placeholder="Last Name" id="inputPassword4">
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="f-label">ADDRESS*</label>
                        <input type="text" class="f-input" id="inputAddress" placeholder="1234 Main St">
                    </div>

                    <div class="col-md-4">
                        <label for="inputCity" class="f-label">CITY*</label>
                        <input type="text" class="f-input" placeholder="CITY" id="inputCity">
                    </div>

                    <div class="col-md-4">
                        <label for="inputState" class="f-label">STATE*</label>
                        <select id="inputState" class="f-input">
                            <option selected>Choose...</option>
                            <option>BANGLADESH</option>
                            <option>FINLAND</option>
                            <option>INDIA</option>
                            <option>NIGERIA</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="inputZip" class="f-label">ZIP*</label>
                        <input type="text" class="f-input" placeholder="Zip" id="inputZip">
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="f-label">CONTACT*</label>
                        <input type="text" class="f-input" id="inputAddress" placeholder="Contact">
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="f-label">EMAIL*</label>
                        <input type="email" class="f-input" id="inputAddress" placeholder="Email">
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="f-label">ANY SPECIFIC ISSUE ?*</label>
                        <textarea type="text" class="f-input" id="inputAddress"
                            placeholder="Any Specific Issue ?"></textarea>
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="f-label text_org">PAYMENT*</label>
                        <h6 class="my-3"><em>Visiting Charge : 10 €</em></h5>

                            <h5 class="text_org mb-3">Payment Amount: 10 €</h4>
                                <a href="https://codepen.io/tarun-sai/full/yLNBoed" target="_blank"> <img class="w-25"
                                        src="https://forms.app/static/img/paypal/card.png"></a>
                    </div>


                    <div class="col-12 mb-5">
                        <center>
                            <button type="submit" class="btn btn-primary btn-lg w-50 mt-5">Book</button>
                        </center>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3">

        </div>
    </div>

</div>
<!--Main Content Section End-->

<?php
include 'footer.php';
?>