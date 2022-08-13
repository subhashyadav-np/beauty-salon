<section class="pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="quick-contact" data-bg-img="{{asset('assets/img/bg/quick-contact-bg.png')}}">
                    <h3>Quick Contact</h3>
                    <p>Owning successful salon locations passion to the small town.</p>
                    <ul class="quick-contact-list pt-2">
                        <li><i class="fas fa-phone-alt"></i> <a href="tel:+9779803526195">(+977) 9803 526195
                        </a></li>
                        <li><i class="fas fa-envelope"></i> <a href="mailto:info@beautain.com">info@jimeebeautysalon.com</a>
                        </li>
                        <li><i class="fas fa-map-marker-alt"></i>44600 Talchikhel Lalitpur,<br>Kathmandu, Nepal.</li>
                        <li><i class="fas fa-clock"></i> Sun - Sat: 9 am to 6 pm <span>Sunday: Closed.</span></li>
                    </ul>
                    <div class="socials"><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i>
                        </a><a href="https://www.twitter.com/"><i class="fab fa-twitter"></i> </a><a
                            href="https://www.instagram.com/"><i class="fab fa-instagram"></i> </a><a
                            href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="appointment-form-wrap" data-bg-img="assets/img/bg/contact-form-bg.png">
                    <h3>Book Your Appointment</h3>
                    <form method="POST" action="{{ route('addAppoint') }}"
                        class="appointment-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="beautain-select">
                                    <div class="input-group style--two"><select name="aa_service"
                                            id="appointment-treatment" class="form-control">
                                            <option value="">Select Service</option>
                                            <option value="Haircut & Design">Haircut & Design</option>
                                            <option value="Hair Straight">Hair Straight</option>
                                            <option value="Hair Treatment">Hair Treatment</option>
                                            <option value="Makeup">Makeup &amp; Lookup</option>
                                            <option value="Facial">Facial</option>
                                            <option value="Waxing">Waxing</option>
                                            <option value="Threading & Blading">Threading & Micro Blading</option>
                                        </select></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="beautain-select">
                                    <div class="input-group style--two"><select name="aa_visited" id="visited"
                                            class="form-control">
                                            <option value="">Have You Visited Us Before*</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group"><input type="text" id="datetimepicker" name="aa_date" class="form-control"
                                        placeholder="Appointment Date*" required autocomplete="off"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group"><input type="text" name="aa_name" class="form-control"
                                        placeholder="Your Name*" required></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group"><input type="email" name="aa_email" class="form-control"
                                        placeholder="Email Address*" required></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group"><input type="text" name="aa_number" class="form-control"
                                        placeholder="Phone Number*" required></div>
                            </div>
                            <div class="col-lg-12"><textarea class="form-control" name="aa_message"
                                    placeholder="Your Messages" required></textarea></div>
                            <div class="col-lg-12 mt-2">
                                <div class="d-flex align-items-center flex-wrap"><button type="submit"
                                        class="btn"><span>Send Now</span> <img src="{{ asset('assets/img/icon/btn-arrow.svg') }}"
                                            alt="" class="svg"></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>