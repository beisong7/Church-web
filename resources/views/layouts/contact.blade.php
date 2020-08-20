<!--=================================
        = CONTACT SECTION
        ==================================-->
<div id="contact" class="popup-section contact-section typo-light">

    <!-- CLOSE BUTTON -->
    <div class="close-section">
        <a href="#" class="button button-icon color-button-white fs-30 border-op-light-2 radius-full"><i class="pe-7s-close"></i></a>
    </div>

    <div class="inner-section animated" data-anim-in="fadeIn" data-anim-out="fadeOut">
        <div class="container">

            <div class="row gt60 align-items-center">
                <div class="col-lg-6">
                    <div class="map-wrapper height-px-300 margin-b-40 animated" data-anim-in="fadeInUp">
                        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25173.549759506815!2d144.97705325499777!3d-37.79137058602538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642cb954b1ce9%3A0xf187674ba9830e78!2sState+Library+Victoria!5e0!3m2!1sen!2sin!4v1560509152021!5m2!1sen!2sin" allowfullscreen></iframe>-->
                        <iframe class="width-100 height-100 border-none radius-10"  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15762.000615174173!2d7.4719444!3d9.0180556!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3930ce52fb7c83e9!2sLiving%20Faith%20Church%20Durumi%20A.K.A%20Winners&#39;%20Chapel!5e0!3m2!1sen!2sng!4v1597961633582!5m2!1sen!2sng"  allowfullscreen ></iframe>
                    </div>

                    <div class="info-obj margin-b-0 info-box-01 img-l gap-20 mini animated" data-anim-in="fadeInUp|0.1" data-ckav-smd="margin-b-30 align-left">
                        <div class="img"><span class="iconwrp"><i class="pe-7s-mail"></i></span></div>
                        <div class="info">
                            <h3 class="heading-content tiny bold-600 margin-b-5">Email</h3>
                            <p class="margin-b-0">{{ $site->email }}</p>
                        </div>
                    </div>

                    <hr class="border-op-light-2 margin-tb-20">

                    <div class="info-obj margin-b-0 info-box-01 img-l gap-20 mini animated" data-anim-in="fadeInUp|0.2" data-ckav-smd="margin-b-30 align-left">
                        <div class="img"><span class="iconwrp"><i class="pe-7s-headphones"></i></span></div>
                        <div class="info">
                            <h3 class="heading-content tiny bold-600 margin-b-5">Phone</h3>
                            <p class="margin-b-0">{{ $site->phone }}</p>
                        </div>
                    </div>

                    <hr class="border-op-light-2 margin-tb-20">

                    <div class="info-obj margin-b-0 info-box-01 img-l gap-20 mini animated" data-anim-in="fadeInUp|0.3" data-ckav-smd="margin-b-30 align-left">
                        <div class="img"><span class="iconwrp"><i class="pe-7s-map-2"></i></span></div>
                        <div class="info">
                            <h3 class="heading-content tiny bold-600 margin-b-5">Address</h3>
                            <p class="margin-b-0">{{ $site->address }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="section-heading-wrapper" data-ckav-smd="align-center margin-t-30">
                        <h4 class="heading-section text-upper default bold-900 animated" data-anim-in="fadeInRight|0.1" data-ckav-smd="medium margin-b-0">Reach us directly</h4>
                    </div>
                    <hr class="color-border-default margin-tb-30 width-px-50 margin-l-0 border-t-2 animated" data-anim-in="fadeInRight|0.2" data-ckav-smd="margin-auto">
                    <form action="{{ route('contact.us') }}" class="form-widget form-control-op-light-02 animated" data-anim-in="fadeInRight|0.2" data-ckav-smd="align-center" method="post">
                        <div class="field-wrp">
                            <div class="row gt10">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control radius-10" data-label="Name" required="" data-msg="Please enter name." type="text" name="name" placeholder="Enter your name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control radius-10" data-label="Email" required="" data-msg="Please enter email." type="email" name="email" placeholder="Enter your email">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input class="form-control radius-10" required="" data-label="Phone" data-msg="Please phone number." type="text" name="phone" placeholder="Enter your phone number">
                            </div>

                            <div class="form-group">
                                <input class="form-control radius-10" data-label="Subject" type="text" name="subject" placeholder="Enter subject">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control radius-10" data-label="Message" required="" data-msg="Please enter your message." name="message" placeholder="Add your message" cols="30" rows="6"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="button radius-10 solid color-button-default margin-0"><i class="fa fa-envelope-o"></i> SUBMIT</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ======= END : CONTACT SECTION =======  -->